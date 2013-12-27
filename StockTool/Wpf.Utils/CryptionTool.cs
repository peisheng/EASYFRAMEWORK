using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using BMC.Base.CryptControl;
using System.Security.Cryptography;
using System.IO;
using BMC.Core;

namespace BMC.Core
{
    public class CryptionTool
    {
        public static byte[] SoftMac919(byte[] requestByte, string MacKey)
        {
            Encrypt cry = new Encrypt();
            int MLength = 16;
            if (requestByte.Length % 8 != 0)
            {
                requestByte = RightZero(requestByte, requestByte.Length + (8 - requestByte.Length % 8), 0x00);
            }
            string hexStr = MessageTool.ByteToStr(requestByte);
            //string hexStr = Encoding.Default.GetString(requestByte);
            string keyLeft = MacKey.Substring(0, MacKey.Length / 2);
            string keyRight = MacKey.Substring(MacKey.Length / 2, MacKey.Length / 2);

            List<string> mabData = new List<string>();
            for (int index = 0; index < hexStr.Length / MLength; index++)
            {
                mabData.Add(hexStr.Substring(index * MLength, MLength));
            }
            string nextInput = Des(keyLeft, mabData[0], EncryptFlag.DES_ENCRYPT);
            for (int i = 1; i < hexStr.Length / MLength; i++)
            {
                nextInput = Xor(mabData[i], nextInput);
                nextInput = Des(keyLeft, nextInput, EncryptFlag.DES_ENCRYPT);
            }

            nextInput = Des(keyRight, nextInput, EncryptFlag.DES_DECRYPT);
            nextInput = Des(keyLeft, nextInput, EncryptFlag.DES_ENCRYPT);

            return Encoding.Default.GetBytes(nextInput);
        }

        public static string PinBlock(string pinKey, string pin, string pan)
        {
            //取pan右12位
            pan = pan.Substring(0, pan.Length - 1);
            pan = pan.Length < 12 ? (MessageTool.AglinLeft(pan, 12, '0')) : pan.Substring(pan.Length - 12, 12);
            byte[] panByte = MessageTool.StrToHexByte(pan);
            panByte = LeftZero(panByte, 8, 0x00);

            byte[] pinByteSource = new byte[4];
            pinByteSource[0] = 0x06;
            byte[] pinByteTemp = MessageTool.StrToHexByte(pin);
            for (int i = 0; i < pinByteTemp.Length; i++) pinByteSource[i + 1] = pinByteTemp[i];
            byte[] pinByte = RightZero(pinByteSource, 8, 0xFF);
            //异或
            byte[] PinBlockXor = Xor(panByte, pinByte);
            Encrypt cry = new Encrypt();
            string PinBlock = MessageTool.ByteToStr(PinBlockXor);

            return cry.Des3(pinKey, PinBlock, EncryptFlag.DES_ENCRYPT);
        }
        public static byte[] Xor(byte[] byteA, byte[] byteB)
        {
            byte[] result = new byte[byteB.Length];
            for (int i = 0; i < byteB.Length; i++)
            {
                int temp = byteA[i] ^ byteB[i];
                result[i] = (byte)temp;
            }
            return result;
        }
        public static string Xor(string strA, string strB)
        {
            byte[] byteA = MessageTool.StrToHexByte(strA);
            byte[] byteB = MessageTool.StrToHexByte(strB);
            byte[] result = new byte[byteB.Length];
            for (int i = 0; i < byteB.Length; i++)
            {
                int temp = byteA[i] ^ byteB[i];
                result[i] = (byte)temp;
            }
            return MessageTool.ByteToStr(result);
        }

        private static byte[] LeftZero(byte[] ByteSource, int TotalLength, byte s)
        {
            byte[] ReturnByte = new byte[TotalLength];
            for (int index = 0; index < TotalLength; index++)
            {
                if (index < TotalLength - ByteSource.Length) ReturnByte[index] = s;
                else ReturnByte[index] = ByteSource[index - (TotalLength - ByteSource.Length)];
            }
            return ReturnByte;
        }

        private static byte[] RightZero(byte[] ByteSource, int TotalLength, byte s)
        {
            byte[] ReturnByte = new byte[TotalLength];
            for (int index = 0; index < TotalLength; index++)
            {
                if (index < ByteSource.Length) ReturnByte[index] = ByteSource[index];
                else ReturnByte[index] = s;
            }
            return ReturnByte;
        }

        public static string Des(string _key, string _text, EncryptFlag encryptFlag)
        {
            Encrypt cry = new Encrypt();
            return cry.Des(_key, _text, encryptFlag);

        }

        public static string Des3(string _key, string _text, EncryptFlag encryptFlag)
        {
            Encrypt cry = new Encrypt();
            return cry.Des3(_key, _text, encryptFlag);

        }

    }
}
