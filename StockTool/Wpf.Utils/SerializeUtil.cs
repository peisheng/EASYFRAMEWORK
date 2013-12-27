using System;
using System.Collections.Generic;
using System.IO;
using System.Runtime.Serialization.Formatters.Binary;

namespace BMC.Core
{
    public class SerializeUtil<T>
    {
        /// <summary>
        /// 串行化文件
        /// </summary>
        public static void Serialize(T c, string Path)
        {
            FileStream fileStream = new FileStream(Path, FileMode.Create);
            BinaryFormatter b = new BinaryFormatter();
            b.Serialize(fileStream, c);
            fileStream.Close();
        }
        /// <summary>
        /// 反串行化
        /// </summary>
        public static T DeSerialize(string Path)
        {
            FileStream fileStream = new FileStream(Path, FileMode.Open, FileAccess.Read, FileShare.Read);
            BinaryFormatter b = new BinaryFormatter();
            T c = (T)b.Deserialize(fileStream);
            fileStream.Close();
            return c;
        }
    }
}
