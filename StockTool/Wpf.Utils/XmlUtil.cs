using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;
using System.Xml.Serialization;

namespace Wpf.Utils
{
    public class XmlUtil<T>
    {
        #region XML相关的静态方法
        ///
        /// 使用XmlSerializer序列化对象 ///
        /// 需要序列化的对象类型，必须声明[Serializable]特征 /// 需要序列化的对象 
        public static string XmlSerialize(T obj)
        {
            using (MemoryStream ms = new MemoryStream())
            {
                XmlSerializer serializer = new XmlSerializer(typeof(T));
                serializer.Serialize(ms, obj);
                ms.Seek(0, SeekOrigin.Begin);
                using (StreamReader reader = new StreamReader(ms, Encoding.UTF8))
                {
                    return reader.ReadToEnd();
                }
            }
        }

        /// 使用XmlSerializer序列化对象 并保存到相应的文件里面 ///
        /// 需要序列化的对象类型，必须声明[Serializable]特征 
        /// 需要序列化的对象  obj,
        public static void XmlSerializeToFile(T obj, string filePath)
        {
            using (MemoryStream ms = new MemoryStream())
            {
                XmlSerializer serializer = new XmlSerializer(typeof(T));
                serializer.Serialize(ms, obj);
                ms.Seek(0, SeekOrigin.Begin);
                using (StreamReader reader = new StreamReader(ms, Encoding.UTF8))
                {
                    string xml = reader.ReadToEnd();
                    //if (File.Exists(filePath))
                    // {
                    File.WriteAllText(filePath, xml, Encoding.UTF8);
                    //} 
                    //string descryptoFile = filePath.Insert(filePath.LastIndexOf("."), "-desc");
                    //string descString = StringTool.GetEncryptDES(xml);
                    //File.WriteAllText(descryptoFile, descString, Encoding.UTF8);

                }
            }
        }


        ///
        /// 使用XmlSerializer反序列化对象 ///
        /// 需要反序列化的xml字符串 
        public static T XmlDeserialize(string xmlOfObject)
        {
            using (MemoryStream ms = new MemoryStream())
            {
                using (StreamWriter sr = new StreamWriter(ms, Encoding.UTF8))
                {
                    sr.Write(xmlOfObject);
                    sr.Flush();
                    ms.Seek(0, SeekOrigin.Begin);
                    XmlSerializer serializer = new XmlSerializer(typeof(T));
                    return (T)serializer.Deserialize(ms);
                }
            }
        }

        ///
        /// 使用XmlSerializer反序列化对象 ///
        /// 需要反序列化的xml字符串 
        public static T XmlDeserializeFromFile(string filePath)
        {
            try
            {
                string descryptoFile = filePath.Insert(filePath.LastIndexOf("."), "-desc");
                string xmlOfObject = string.Empty;
                if (File.Exists(filePath))
                {
                    xmlOfObject = File.ReadAllText(filePath, Encoding.UTF8);

                    //如果是空文件则从加密文件中加载数据
                    if (xmlOfObject.Length <= 10)
                    {
                        xmlOfObject = StringTool.GetDecryptDES(File.ReadAllText(descryptoFile, Encoding.UTF8));
                    }
                }
                else
                {
                    xmlOfObject = StringTool.GetDecryptDES(File.ReadAllText(descryptoFile, Encoding.UTF8));
                }

                using (MemoryStream ms = new MemoryStream())
                {
                    using (StreamWriter sr = new StreamWriter(ms, Encoding.UTF8))
                    {
                        sr.Write(xmlOfObject);
                        sr.Flush();
                        ms.Seek(0, SeekOrigin.Begin);
                        XmlSerializer serializer = new XmlSerializer(typeof(T));
                        return (T)serializer.Deserialize(ms);
                    }
                }
            }
            catch(Exception ex){
                return default(T);
            }
        }
        #endregion
    }
}
