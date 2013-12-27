using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BMC.Core
{
    public class HexByteConvertUtil
    {
        /// <summary>
        /// 16进制转字符串 
        /// </summary>
        /// <param name="str"></param>
        /// <returns></returns>
        public static string HexToStr(string hexstr)
        {
            hexstr = hexstr.Replace(" ", "");
            if (hexstr.Length % 2 != 0) hexstr += " ";

            byte[] returnByte = new byte[hexstr.Length / 2];
            for (int i = 0; i < returnByte.Length; i++)
            {
                returnByte[i] = Convert.ToByte(hexstr.Substring(i * 2, 2), 16);
            }
            return Encoding.Default.GetString(returnByte);
        }
        /// <summary>
        /// 字符串转16进制
        /// </summary>
        /// <param name="hexByte"></param>
        /// <returns></returns>
        public static string StrToHex(string str)
        {
            string tempStr = string.Empty;
            byte[] strByte = Encoding.Default.GetBytes(str);

            for (int i = 0; i < strByte.Length; i++)
            {
                tempStr = tempStr + strByte[i].ToString("X02");
            }
            return tempStr;
        }



        public static string ByteToStr(byte[] hexbyte)
        {
            string strResult = "";
            for (int i = 0; i < hexbyte.Length; i++)
            {
                strResult = strResult + hexbyte[i].ToString("X02");
            }
            return strResult;
        }

        public static byte[] StrToHexByte(string hexStr)
        {
            hexStr = hexStr.Replace(" ", "");
            if (hexStr.Length % 2 != 0) hexStr = hexStr + " ";
            byte[] returnByte = new byte[(hexStr.Length / 2)];
            for (int i = 0; i < returnByte.Length; i++)
            {
                returnByte[i] = Convert.ToByte(hexStr.Substring(i * 2, 2), 16);
            }
            return returnByte;
        }
    }
}
