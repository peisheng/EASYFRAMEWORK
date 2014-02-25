using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Serialization;
using System.Reflection;
using System.ComponentModel;

namespace Codeplex.SimpleCSV
{

    /// <summary>
    /// A serializer class, that handles serialization of a specified class. 
    /// The class attributes must have SimpleCSVAttribute
    /// </summary>
    /// <typeparam name="T">Class that should be serialized</typeparam>
    public class SimpleCSVSerializer<T> : IDisposable where T : class
    {
        /// <summary>
        /// Remember column position and it's property info
        /// </summary>
        private SortedDictionary<int, PropertyInfo> _properties = new SortedDictionary<int, PropertyInfo>();

        /// <summary>
        /// Remember column position and it's header
        /// </summary>
        private SortedDictionary<int, string> _header = new SortedDictionary<int, string>();

        /// <summary>
        /// Remember column position and it's CSVAttribute
        /// </summary>
        private SortedDictionary<int, SimpleCSVAttribute> _attributes = new SortedDictionary<int, SimpleCSVAttribute>();

        /// <summary>
        /// Column counter
        /// </summary>
        private int _writeColumns = 0;

        /// <summary>
        /// User defined _handler object used in serialization callbacks. Defined in constructor
        /// </summary>
        private object _handler = null;

        /// <summary>
        /// Delegate used in Serialization callback - used in Serializer events
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="args"></param>
        /// <returns></returns>
        public delegate bool SimpleCSVSerializationCallbackDelegate(object sender, SimpleCSVSerializationEventArgs args);

        /// <summary>
        /// Delegate used in Deserialization callback - used in Deserializer events
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="args"></param>
        /// <returns></returns>
        public delegate bool SimpleCSVDeserializationCallbackDelegate(object sender, SimpleCSVDeserializationEventArgs args);

        /// <summary>
        /// Event raised in serialization
        /// </summary>
        public event SimpleCSVSerializationCallbackDelegate OnSerialization = null;

        /// <summary>
        /// Event raised in deserialization
        /// </summary>
        public event SimpleCSVDeserializationCallbackDelegate OnDeserialization = null;

        private SimpleCSVSerializationEventArgs _serializationEventArgs = new SimpleCSVSerializationEventArgs()
        {
            Handler = null
        };

        private SimpleCSVDeserializationEventArgs _deserializationEventArgs = new SimpleCSVDeserializationEventArgs()
        {
            Handler = null
        };

        /// <summary>
        /// Default constructor for CSV serializer
        /// </summary>
        public SimpleCSVSerializer()
        {
            int column = 0;
            foreach (var property in typeof(T).GetProperties())
            {
                foreach (var attr in property.GetCustomAttributes(typeof(SimpleCSVAttribute), true))
                {
                    int i = ++column;

                    SimpleCSVAttribute sca = attr as SimpleCSVAttribute;
                    if (sca.Index > 0) i = sca.Index;

                    if (_writeColumns < i) _writeColumns = i;

                    if (!_properties.ContainsKey(i))
                    {
                        _properties.Add(i, property);
                        _header.Add(i, sca.Label ?? property.Name);
                        _attributes.Add(i, sca);
                    }
                    else
                    {
                        throw new SimpleCSVSerializationException("There already is defined a " + _header[i] + " column on position " + i + ".");
                    }
                }
            }
        }

        /// <summary>
        /// 
        /// </summary>
        /// <param name="handler">Remember an additional (user defined) object named handler and pass it in callbacks</param>
        public SimpleCSVSerializer(object handler)
            : this()
        {
            _handler = handler;
            _serializationEventArgs.Handler = handler;
            _deserializationEventArgs.Handler = handler;
        }


        /// <summary>
        /// Serialize object to CSV line
        /// </summary>
        /// <param name="csvWriter"></param>
        /// <param name="o"></param>
        public void Serialize(SimpleCSVWriter csvWriter, T o)
        {
            Serialize(csvWriter, o, _handler);
        }

        /// <summary>
        /// Serialize object to CSV
        /// </summary>
        /// <param name="csvWriter"></param>
        /// <param name="o"></param>
        /// <param name="handler"></param>
        public void Serialize(SimpleCSVWriter csvWriter, T o, object handler)
        {
            int last = _header.Keys.Last();

            try
            {
                #region Header
                if (csvWriter.HasHeader && !csvWriter.SomethingWasWritten)
                {
                    string[] header = new string[_writeColumns];



                    for (int i = 1; i <= last; i++)
                    {
                        if (_header.ContainsKey(i))
                        {
                            header[i - 1] = _header[i];
                        }
                        else
                        {
                            header[i - 1] = String.Empty;
                        }
                    }

                    csvWriter.WriteHeader(header);
                }
                #endregion

                csvWriter.ClearBuffer();

                if (OnSerialization != null)
                {
                    _serializationEventArgs.State = SimpleCSVSerializationState.BeforeSerialization;
                    _serializationEventArgs.SerializedObject = o;
                    _serializationEventArgs.CSVStream = csvWriter;
                    if (!OnSerialization(this, _serializationEventArgs)) return;
                }

                // Callback before serialization
                if (o is ISimpleCSVSerializationCallback)
                {
                    if (!((ISimpleCSVSerializationCallback)o).SimpleCSVSerialization(csvWriter, SimpleCSVSerializationState.BeforeSerialization, handler)) return;
                }

                for (int i = 1; i <= last; i++)
                {
                    if (_properties.ContainsKey(i))
                    {
                        var sca = _attributes[i];
                        object v = _properties[i].GetValue(o, null);

                        if (v == null)
                        {
                            csvWriter.Write(null);
                        }
                        else
                        {
                            if (!sca.ManualSerialization)
                            {
                                if (v.GetType() == typeof(DateTime) && !String.IsNullOrEmpty(_attributes[i].Format))
                                {
                                    csvWriter.Write(((DateTime)v).ToString(_attributes[i].Format));
                                }
                                else
                                {
                                    if (v.GetType().IsEnum)
                                    {
                                        FieldInfo fieldInfo = v.GetType().GetField(v.ToString());
                                        SimpleCSVEnumAttribute[] customAttrs = fieldInfo.GetCustomAttributes(typeof(SimpleCSVEnumAttribute), false) as SimpleCSVEnumAttribute[];

                                        if (customAttrs != null && customAttrs.Length > 0 && !String.IsNullOrEmpty(customAttrs[0].Label))
                                        {
                                            csvWriter.Write(customAttrs[0].Label);
                                        }
                                        else
                                        {
                                            csvWriter.Write(v.ToString());
                                        }

                                    }
                                    else
                                    {
                                        csvWriter.Write(v.ToString());
                                    }
                                }
                            }
                            else
                            {
                                // this field will be serialized manually
                                csvWriter.Write(null);
                            }
                        }
                    }
                    else
                    {
                        csvWriter.Write(null);
                    }
                }

                // Callback after serialization
                if (o is ISimpleCSVSerializationCallback)
                {
                    if (!((ISimpleCSVSerializationCallback)o).SimpleCSVSerialization(csvWriter, SimpleCSVSerializationState.AfterSerialization, handler))
                    {
                        return;
                    }
                }

                if (OnSerialization != null)
                {
                    _serializationEventArgs.State = SimpleCSVSerializationState.AfterSerialization;
                    _serializationEventArgs.SerializedObject = o;
                    _serializationEventArgs.CSVStream = csvWriter;
                    if (!OnSerialization(this, _serializationEventArgs))
                    {
                        return;
                    }
                }

                csvWriter.WriteLine();
            }
            catch (Exception ex)
            {
                throw new SimpleCSVSerializationException("Exception during serialization.", ex);
            }
        }

        /// <summary>
        /// Read line from CSV and deserialize to a new object
        /// </summary>
        /// <param name="csvReader"></param>
        /// <param name="result">Deserialized instance of an object</param>
        /// <returns>false when there is no line with data</returns>
        public bool DeserializeLine<V>(SimpleCSVReader csvReader, out V result) where V : T, new()
        {
            return DeserializeLine<V>(csvReader, out result, _handler);
        }

        /// <summary>
        /// Deserialize a line from CSV reader with an custom data handler object
        /// </summary>
        /// <typeparam name="V">Result</typeparam>
        /// <param name="csvReader">CSV Reader</param>
        /// <param name="result">Deserialized object</param>
        /// <param name="handler">Custom data handler</param>
        /// <returns>True when something deserialized</returns>
        public bool DeserializeLine<V>(SimpleCSVReader csvReader, out V result, object handler) where V : T, new()
        {
            try
            {
                result = new V();

                while (true)
                {
                    // create a default when no data on stream
                    if (!csvReader.ReadLine())
                    {
                        result = default(V);
                        return false;
                    }

                    // Deserialize
                    int i = 0;

                    if (OnDeserialization != null)
                    {
                        _deserializationEventArgs.State = SimpleCSVSerializationState.BeforeDeserialization;
                        _deserializationEventArgs.CSVStream = csvReader;
                        _deserializationEventArgs.Handler = _handler;

                        if (!OnDeserialization(this, _deserializationEventArgs)) continue;
                    }

                    // Callback before serialization
                    if (result is ISimpleCSVSerializationCallback)
                    {
                        // untill SimpleCSVDeserialization returns false, read another line from CSV stream
                        if (!((ISimpleCSVSerializationCallback)result).SimpleCSVDeserialization(csvReader, SimpleCSVSerializationState.BeforeDeserialization, handler)) continue;
                    }

                    foreach (var key in _properties.Keys)
                    {
                        var member = _properties[key];
                        var sca = _attributes[key];

                        // The user will manually deserialize this field
                        if (!sca.ManualSerialization)
                        {
                            object o = null;

                            Type memberType = member.PropertyType;

                            // if this is a nullable type - get it's underlying type
                            if (memberType.IsGenericType && memberType.GetGenericTypeDefinition().Equals(typeof(Nullable<>)))
                            {
                                NullableConverter nullableConverter = new NullableConverter(memberType);
                                memberType = nullableConverter.UnderlyingType;
                            }

                            // if the value i set
                            if (!String.IsNullOrEmpty(csvReader[key]))
                            {
                                if ((member.PropertyType == typeof(DateTime)) && (!String.IsNullOrEmpty(sca.Format)))
                                {
                                    o = DateTime.ParseExact(csvReader[key], sca.Format, null);
                                }
                                else
                                {
                                    if (memberType.IsEnum)
                                    {
                                        string enumValue = csvReader[key];
                                        foreach (Enum e in Enum.GetValues(memberType))
                                        {
                                            FieldInfo enumFieldInfo = memberType.GetField(e.ToString());
                                            SimpleCSVEnumAttribute[] customAttrs = enumFieldInfo.GetCustomAttributes(typeof(SimpleCSVEnumAttribute), false) as SimpleCSVEnumAttribute[];

                                            if (customAttrs.Length == 1)
                                            {
                                                if (customAttrs[0].Label == csvReader[key])
                                                {
                                                    enumValue = e.ToString(); break;
                                                }
                                            }
                                            else
                                            {
                                                if (e.ToString() == enumValue) break;
                                            }
                                        }

                                        o = Enum.Parse(memberType, enumValue);
                                    }
                                    else
                                    {
                                        o = Convert.ChangeType(csvReader[key], memberType);
                                    }
                                }
                            }

                            member.SetValue(result, o, BindingFlags.SetProperty, null, null, null);
                        }

                        i++;
                    }

                    // Callback after serialization
                    if (result is ISimpleCSVSerializationCallback)
                    {
                        if (!((ISimpleCSVSerializationCallback)result).SimpleCSVDeserialization(csvReader, SimpleCSVSerializationState.AfterDeserialization, handler)) continue;
                    }

                    if (OnDeserialization != null)
                    {
                        _deserializationEventArgs.State = SimpleCSVSerializationState.AfterDeserialization;
                        _deserializationEventArgs.CSVStream = csvReader;
                        _deserializationEventArgs.SerializedObject = result;
                        if (!OnDeserialization(this, _deserializationEventArgs)) continue;
                    }

                    return true;
                }
            }
            catch (Exception ex)
            {
                throw new SimpleCSVSerializationException("Exception during deserialization.", ex);
            }
        }

        /// <summary>
        /// Read data from CSV reader deserializing it to IEnumerable 
        /// </summary>
        /// <typeparam name="V"></typeparam>
        /// <param name="csvReader"></param>
        /// <returns></returns>
        public IEnumerable<V> Deserialize<V>(SimpleCSVReader csvReader) where V : T, new()
        {
            V result;

            while (DeserializeLine<V>(csvReader, out result))
            {
                yield return result;
            }

            yield break;
        }

        #region IDisposable Members

        /// <summary>
        /// Dispose the serializer
        /// </summary>
        public void Dispose()
        {
            _attributes.Clear();
            _header.Clear();
            _properties.Clear();
        }

        #endregion
    }

    /// <summary>
    /// CSV Attribute to label properties, that should be serialized/deserialized to CSV data 
    /// </summary>
    [AttributeUsage(AttributeTargets.Property)]
    public class SimpleCSVAttribute : Attribute
    {

        /// <summary>
        /// Default constructor for CSV Attribute
        /// </summary>
        public SimpleCSVAttribute()
        {
            Index = 0;
            Format = null;
            ManualSerialization = false;
        }

        /// <summary>
        /// The column order in CSV. 0 and below - the column position is determined by a property position in class
        /// </summary>
        public int Index { get; set; }

        /// <summary>
        /// The header label
        /// </summary>
        public string Label { get; set; }

        /// <summary>
        /// Serialization format (For DateTime field type, for other fields it's ignored in this release)
        /// </summary>
        public string Format { get; set; }

        /// <summary>
        /// Serialization and deserialization will be handled by user
        /// </summary>
        public bool ManualSerialization { get; set; }

    }

    /// <summary>
    /// CSV Attribute to label enum values, to set the custom values
    /// </summary>
    [AttributeUsage(AttributeTargets.Field)]
    public class SimpleCSVEnumAttribute : Attribute
    {
        /// <summary>
        /// Default constructor for CSV Enum Attribute
        /// </summary>
        public SimpleCSVEnumAttribute()
        {
            Label = null;
        }

        /// <summary>
        /// How should be the enum value represented in CSV
        /// </summary>
        public string Label { get; set; }
    }

    /// <summary>
    /// CSV Serialization Exception
    /// </summary>
    public class SimpleCSVSerializationException : Exception
    {
        /// <summary>
        /// Default constructor for Serialization Exception
        /// </summary>
        public SimpleCSVSerializationException() : base() { }

        /// <summary>
        /// Serialization Exception constructor with additional message 
        /// </summary>
        /// <param name="message"></param>
        public SimpleCSVSerializationException(string message) : base(message) { }

        /// <summary>
        /// Serialization Exception constructor with additional message and innerException
        /// </summary>
        /// <param name="message"></param>
        /// <param name="innerException"></param>
        public SimpleCSVSerializationException(string message, Exception innerException) : base(message, innerException) { }
    }

    /// <summary>
    /// Implementing this interface on an CSV serializable method causes, when serializing or deserializing an object, then apropriate method will be called
    /// </summary>
    public interface ISimpleCSVSerializationCallback
    {
        /// <summary>
        /// This method will be executed when deserialization occurs
        /// </summary>
        /// <param name="reader">Actual reader, thah is used for deserialization</param>
        /// <param name="state"></param>
        /// <param name="handler"></param>
        /// <returns>True in BeforeDeserialization when You accept the deserialization otherwise false</returns>
        bool SimpleCSVDeserialization(SimpleCSVReader reader, SimpleCSVSerializationState state, object handler);

        /// <summary>
        /// This method will be executed when serialization occurs
        /// </summary>
        /// <param name="writer"></param>
        /// <param name="state"></param>
        /// <param name="handler"></param>
        /// <returns></returns>
        bool SimpleCSVSerialization(SimpleCSVWriter writer, SimpleCSVSerializationState state, object handler);
    }

    /// <summary>
    /// Represents serialization state when using ISimpleCSVSerializationCallback in callback methods or in Serialization events
    /// </summary>
    /// <seealso cref="ISimpleCSVSerializationCallback"/>
    public enum SimpleCSVSerializationState
    {
        /// <summary>
        /// Occurs before deserialization CSV line to an object (after when CSV line from stream was read)
        /// </summary>
        BeforeDeserialization,

        /// <summary>
        /// Occurs after a line from CSV stream was deserialized
        /// </summary>
        AfterDeserialization,

        /// <summary>
        /// Occurs before an object was serialized to an CSV line 
        /// </summary>
        BeforeSerialization,

        /// <summary>
        /// Occurs after an object was serialized do CSV line (but before write to stream)
        /// </summary>
        AfterSerialization,
    }

    /// <summary>
    /// Arguments passed in OnSerialization event in SimpleCSVSerializer
    /// </summary>
    public class SimpleCSVSerializationEventArgs : EventArgs
    {
        /// <summary>
        /// State of deserialization
        /// </summary>
        public SimpleCSVSerializationState State { internal set; get; }

        /// <summary>
        /// User defined object passed in SimpleCSVSerializer constructor
        /// </summary>
        public object Handler { internal set; get; }

        /// <summary>
        /// CSV writer used in serialization
        /// </summary>
        public SimpleCSVWriter CSVStream { internal set; get; }

        /// <summary>
        /// Instance of an object that is serialized
        /// </summary>
        public object SerializedObject { internal set; get; }
    }

    /// <summary>
    /// Arguments passed to OnDeserialization event in SimpleCSVSerializer
    /// </summary>
    public class SimpleCSVDeserializationEventArgs : EventArgs
    {
        /// <summary>
        /// State of deserialization
        /// </summary>
        public SimpleCSVSerializationState State { internal set; get; }

        /// <summary>
        /// User defined object passed in SimpleCSVSerializer constructor
        /// </summary>
        public object Handler { internal set; get; }

        /// <summary>
        /// CSV reader stream used in deserialization
        /// </summary>
        public SimpleCSVReader CSVStream { internal set; get; }

        /// <summary>
        /// Instance of an deserialized object
        /// </summary>
        public object SerializedObject { internal set; get; }
    }
}
