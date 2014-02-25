using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace Codeplex.SimpleCSV.Examples
{
    class Program
    {
        static void Main(string[] args)
        {

            #region Simple example

            using (SimpleCSVWriter writer = new SimpleCSVWriter(@".\simple.csv"))
            {
                writer.MaxColumns = 10;
                writer.QuoteAll = true;
                writer.Splitter = ',';
                writer.WriteHeader(new string[] { "A", "B", "C", "D" });
                writer.WriteLine(new string[] { "1", "2", "3", "4" });

                for (int i = 1; i < 5; i++)
                {
                    for (int j = 0; j < 20; j++)
                    {
                        writer.Write(i + ":" + j);
                    }
                    writer.WriteLine();
                }
            }

            using (SimpleCSVWriter writer = new SimpleCSVWriter(@".\simple2.csv"))
            {
                writer.MaxColumns = 10;
                writer.QuoteAll = true;
                writer.Splitter = ',';
                writer.WriteHeader(new string[] { "A", "B", "C", "D" });
                writer.WriteLine(new string[] { "1", "2", "3", "4" });

                for (int i = 1; i < 5; i++)
                {
                    for (int j = 20; j >= 0; j--)
                    {
                        writer[j] = i + ":" + j;
                    }
                    writer["A"] = "String indexer";
                    writer.WriteLine();
                }
            }

            using (SimpleCSVReader reader = new SimpleCSVReader(@".\test.txt"))
            {
                reader.Splitter = '\t';
                reader.ReadHeader();

                Dictionary<string, int> i = reader.HeaderMap;
                foreach (var item in i)
                {
                    string columnName = item.Key.ToString();
                    string intS = item.Value.ToString();
                    
                }
                while (reader.ReadLine())
                {
                    Console.WriteLine("{0} - {1}", reader["A"], reader[5]);
                }
            }

            #endregion

            #region Serialization Example

            using (SimpleCSVSerializer<MyObject> serializer = new SimpleCSVSerializer<MyObject>())
            {
                using (SimpleCSVWriter writer = new SimpleCSVWriter(@".\serialized.csv"))
                {
                    writer.HasHeader = true;
                    writer.QuoteAll = true;
                    // writer.Splitter = ',';
                    serializer.Serialize(writer, new MyObject
                    {
                        ID = 1,
                        Title = @"The title is ""The title""",
                        Data = "This is an example;wow!",
                        Date = DateTime.Now,
                        NotForExport = "My specified data"
                    });
                    serializer.Serialize(writer, new MyObject
                    {
                        ID = 2,
                        Date = DateTime.Now,
                        NotForExport = "No more!"
                    });
                }

                Console.WriteLine("--- CSV DESERIALIZATION RESULTS --");

                using (SimpleCSVReader reader = new SimpleCSVReader(@".\serialized.csv"))
                {
                    reader.HasHeader = true;
                    // reader.Splitter = ',';
                    MyObject record;

                    while (serializer.DeserializeLine(reader, out record))
                    {
                        Console.WriteLine("{0}-{1}-{2}-{3}", record.ID, record.Title, record.Date, record.Data);
                    }
                }

                Console.WriteLine("--- CSV DESERIALIZATION RESULTS with IEnumerable --");

                using (SimpleCSVReader reader = new SimpleCSVReader(@".\serialized.csv"))
                {
                    reader.HasHeader = true;
                    //reader.Splitter = ',';

                    foreach (var record in serializer.Deserialize<MyObject>(reader))
                    {
                        Console.WriteLine("{0}-{1}-{2}-{3}", record.ID, record.Title, record.Date, record.Data);
                    }
                }
            }

            #endregion

            #region Advanced Serialization Example

            var dataSource = new CartoonDataHandler();

            using (SimpleCSVSerializer<CartoonItem> serializer = new SimpleCSVSerializer<CartoonItem>(dataSource))
            {
                using (SimpleCSVReader reader = new SimpleCSVReader("cartoon.csv"))
                {
                    reader.HasHeader = true;
                    using (SimpleCSVWriter writer = new SimpleCSVWriter("new_cartoon.csv"))
                    {
                        writer.HasHeader = true;

                        foreach (var cartoon in serializer.Deserialize<CartoonItem>(reader))
                        {
                            Console.WriteLine("{0} {1} {2} {3} {4}", cartoon.ID, cartoon.GroupID, cartoon.Created, cartoon.Filmed, cartoon.Name);
                            serializer.Serialize(writer, cartoon);
                        }
                    }
                }

                Console.WriteLine("-- ONLY FILMED --");
                using (SimpleCSVReader reader = new SimpleCSVReader("new_cartoon.csv"))
                {
                    reader.HasHeader = true;
                    serializer.OnDeserialization += (sender, eventArgs) =>
                    {
                        if (eventArgs.State == SimpleCSVSerializationState.BeforeDeserialization)
                        {
                            return "yes".Equals(eventArgs.CSVStream["FILMED"]);
                        }
                        return true;
                    };

                    foreach (var cartoon in serializer.Deserialize <CartoonItem>(reader))
                    {
                        Console.WriteLine("{0} {1} {2} {3} {4} {5}", cartoon.ID, cartoon.GroupID, cartoon.Created, cartoon.Filmed, cartoon.Name, cartoon.GroupType);
                    }
                }
            }

            Console.WriteLine("-- RAW --");
            using (SimpleCSVReader reader = new SimpleCSVReader("new_cartoon.csv"))
            {
                reader.HasHeader = true;

                while (reader.ReadLine())
                {
                    Console.WriteLine("{0} {1} {2} {3} {4} {5}", reader["ID"], reader["GROUP"], reader[3], reader[4], reader[5], reader[6]);
                }
            }

            #endregion

            Console.ReadKey();
        }
    }


    public class MyObject
    {
        [SimpleCSV]
        public decimal ID { get; set; }

        [SimpleCSV(Label = "Name")]
        public string Title { get; set; }

        [SimpleCSV(Label = "Created", Index = 4)]
        public DateTime Date { get; set; }

        [SimpleCSV(Label = "Description", Index = 3)]
        public string Data { get; set; }

        public string NotForExport { get; set; }
    }

    public class CartoonItem : ISimpleCSVSerializationCallback
    {
        [SimpleCSV(Label = "GROUP")]
        public int GroupID { get; set; }

        [SimpleCSV]
        public int ID { get; set; }

        [SimpleCSV(Label = "NAME")]
        public string Name { get; set; }

        [SimpleCSV(Label = "CREATED", Format = "yyyy")]
        public DateTime Created { get; set; }

        [SimpleCSV(Label = "FILMED")]
        public bool Filmed { get; set; }

        [SimpleCSV(Label="GROUP_TYPE")]
        public MyEnum GroupType { get; set; }

        #region ISimpleCSVSerializationCallback Members

        public bool SimpleCSVDeserialization(SimpleCSVReader reader, SimpleCSVSerializationState state, object handler)
        {
            if (state == SimpleCSVSerializationState.BeforeDeserialization)
            {
                reader[1] = (handler as CartoonDataHandler).MapGroupToID(reader[1]).ToString();
                reader[5] = ("yes".Equals(reader[5])).ToString();
            }

            return true;
        }

        public bool SimpleCSVSerialization(SimpleCSVWriter writer, SimpleCSVSerializationState state, object handler)
        {
            if (state == SimpleCSVSerializationState.AfterSerialization)
            {
                writer[1] = (handler as CartoonDataHandler).MapIDToGroup(GroupID);
                writer[5] = Filmed ? "yes" : "no";
            }

            return true;
        }

        #endregion
    }

    public enum MyEnum
    {
        [SimpleCSVEnum(Label="GROUP_A")]
        GroupA,

        /// <summary>
        /// This enum value is not labelled, so the serialized value will be the same as enum value
        /// </summary>
        GroupB,

        [SimpleCSVEnum(Label = "GROUP_C")]
        GroupC
    }

    public class CartoonDataHandler
    {
        private Dictionary<int, string> idToName = new Dictionary<int, string>();
        private Dictionary<string, int> nameToID = new Dictionary<string, int>();

        public CartoonDataHandler()
        {
            idToName.Add(1, "CATS");
            idToName.Add(2, "DOGS");

            nameToID.Add("CATS", 1);
            nameToID.Add("DOGS", 2);
        }

        public int MapGroupToID(string name)
        {
            if (nameToID.ContainsKey(name))
            {
                return nameToID[name];
            }

            return -1;
        }

        public string MapIDToGroup(int id)
        {
            if (idToName.ContainsKey(id))
            {
                return idToName[id];
            }
            return null;
        }
    }
}
