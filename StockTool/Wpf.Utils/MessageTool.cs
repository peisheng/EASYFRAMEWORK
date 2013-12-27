using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BMC.Core
{
    public static class MessageTool
    {
        public static byte[] AglinRight(byte[] inputByte, int totalLength, char flag = '0')
        {
            if (totalLength <= 0) return null;
            byte[] outputByte = new byte[totalLength];
            int inputLength = inputByte.Length;
            for (int i = 0; i < inputLength; i++)
            {
                outputByte[i] = inputByte[i];
            }
            byte flagbyte = ChangeFlag(flag);
            for (int i = inputLength; i < totalLength; i++)
            {
                outputByte[i] = flagbyte;
            }
            return outputByte;
        }
        public static string AglinRight(string inputStr, int totalLength, char flag = '0')
        {
            if (totalLength <= 0) return string.Empty;
            string outputStr = inputStr;
            for (int i = 0; i < totalLength - inputStr.Length; i++)
            {
                outputStr += flag;
            }
            return outputStr;
        }
        public static byte[] AglinLeft(byte[] inputByte, int totalLength, char flag = '0')
        {
            if (inputByte == null) return null;
            if (totalLength <= 0) return null;
            if (inputByte.Length >= totalLength) return inputByte;
            int inputLength = inputByte.Length;
            byte[] outputByte = new byte[totalLength];
            byte flagbyte = ChangeFlag(flag);
            for (int i = 0; i < totalLength - inputLength; i++)
            {
                outputByte[i] = flagbyte;
            }

            for (int i = totalLength - inputLength; i < totalLength; i++)
            {
                outputByte[i] = inputByte[i - (totalLength - inputLength)];
            }

            return outputByte;
        }
        public static string AglinLeft(string inputStr, int totalLength, char flag = '0')
        {
            if (totalLength <= 0) return string.Empty;
            string tempStr = string.Empty;
            for (int i = 0; i < totalLength - inputStr.Length; i++)
            {
                tempStr += flag;
            }
            return tempStr + inputStr;
        }

        public static Encoding GetEncoding()
        {
            return Encoding.GetEncoding("GB2312");
        }
        private static byte ChangeFlag(char flag = '0')
        {
            switch (flag)
            {
                case '0':
                    return GetEncoding().GetBytes("0")[0];
                default:
                    return GetEncoding().GetBytes(" ")[0];
            }
        }
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
                strResult = strResult + ((hexbyte[i].ToString("X").Length <= 1) ? ("0" + hexbyte[i].ToString("X")) : hexbyte[i].ToString("X"));
            }
            return strResult;
        }

        public static string ByteToStr2(byte[] hexbyte)
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
        public static string LeftAlignForInt(string havingStr, int totalLength, char flag = '0')
        {
            int havingLength = 0;
            if (String.IsNullOrEmpty(havingStr))
            {
                havingLength = 0;
            }
            else
            {
                havingLength = havingStr.Length;
            }

            if (havingLength == totalLength) return havingStr;
            if (havingLength > totalLength) return havingStr.Substring(0, totalLength);
            StringBuilder sb = new StringBuilder();
            for (int i = 1; i <= (totalLength - havingLength); i++)
            {
                sb.Append(flag);
            }

            sb.Append(havingStr);
            return sb.ToString();
        }

        public static string RightAlignForString(string havingStr, int totalLength, char flag = ' ')
        {
            int havingLength = 0;
            if (String.IsNullOrEmpty(havingStr))
            {
                havingLength = 0;
            }
            else
            {
                havingLength = havingStr.Length;
            }
            if (havingLength == totalLength) return havingStr;
            if (havingLength > totalLength) return havingStr.Substring(0, totalLength);
            StringBuilder sb = new StringBuilder();
            sb.Append(havingStr);
            for (int i = 1; i <= (totalLength - havingLength); i++)
            {
                sb.Append(flag);
            }
            return sb.ToString();
        }

        public static string RightAlignForByte(byte[] havingByte, int totalLength, char flag = ' ')
        {
            int havingLength = 0;
            if (havingByte == null || havingByte.Length == 0)
            {
                havingLength = 0;
            }
            else
            {
                havingLength = havingByte.Length;
            }
            if (havingLength == totalLength) return havingByte.ToUTF8String();
            if (havingLength > totalLength) return havingByte.SubByte(0, totalLength).ToUTF8String();
            StringBuilder sb = new StringBuilder();
            sb.Append(havingByte.ToUTF8String());
            for (int i = 1; i <= (totalLength - havingLength); i++)
            {
                sb.Append(flag);
            }
            return sb.ToString();
        }

        public static byte[] SubByte(this byte[] bytes, int index, int count)
        {
            byte[] tempbyte = new byte[count];
            int tempindex = 0;
            for (int i = index; i < index + count; i++)
            {
                tempbyte[tempindex] = bytes[i];
                tempindex++;
            }
            return tempbyte;
        }

        public static string ToUTF8String(this byte[] bytes)
        {
            if (bytes == null || bytes.Length < 1) return null;

            //StringBuilder sb = new StringBuilder();
            //foreach( byte b in bytes)
            //{
            //    sb.Append((char)b);
            //}
            //return sb.ToString();
          return Encoding.UTF8.GetString(bytes);
        }


        
        
        public static byte[] ToUTF8Bytes(this string str)
        {
            if (String.IsNullOrEmpty(str)) return null;          
            return Encoding.UTF8.GetBytes(str);
        }

        /// <summary>
        /// 合并两个字节数组
        /// </summary>
        /// <param name="byte1"></param>
        /// <param name="byte2"></param>
        /// <returns></returns>
        public static byte[] MergeBytes( byte[] byte1, byte[] byte2)
        {
            byte[] bs = new byte[byte1.Length + byte2.Length];
            Array.Copy(byte1, 0, bs, 0, byte1.Length);
            Array.Copy(byte2, 0, bs, byte1.Length, byte2.Length);
            return bs;
        }
    }
}
