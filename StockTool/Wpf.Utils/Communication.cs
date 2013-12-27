using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Net;
using Terminal.Sockets.Tcp;
using Terminal.Log;
using BMC.Base;
namespace BMC.Core
{
    public class Communication
    {
        public static string Address = string.Empty;
        public static int Port = 0;
        /// <summary>
        /// Socket Tcp通讯
        /// </summary>
        /// <param name="xmlStr">字符串报文</param>
        /// <returns>返回服务器返回的xml字符串报文</returns>
        public static byte[] TcpLink(byte[] requestByte)
        {
            IPEndPoint ip;
            if (String.IsNullOrEmpty(Address))
            {
                ip = new IPEndPoint(IPAddress.Loopback, Port);
            }
            else
            {
                ip = new IPEndPoint(IPAddress.Parse(Address), Port);
            }
            TcpClientX client = new TcpClientX();
            try
            {
                client.BufferSize = 999999;
                client.Client.ReceiveTimeout = 60000;
                client.Client.SendTimeout = 60000;
                client.UseThreadPool = true;

               
                if (string.IsNullOrEmpty(Address) || Port == 0)
                {
                    BMC.Core.PlatformUtil.ReadConfig();
                    Address = BMC.Core.PlatformUtil.PlatformConfig.TradeServerAddress;
                    Port = int.Parse(BMC.Core.PlatformUtil.PlatformConfig.TradeServerPort);
                    ip = new IPEndPoint(IPAddress.Parse(Address), Port);
                }


                BMC.Base.Logger.Log(String.Format("正在连接服务器-{0}:{1}", Address, Port), "TcpLink");
                // XTrace.WriteLine("正在连接服务器-{0}:{1}", ipAddress, port);
                client.Connect(ip);
                // XTrace.WriteLine("连接服务器-{0}:{1}成功", ipAddress, port);
            }
            catch (Exception ex)
            {
                client.Close();
                client.Dispose();
                //  XTrace.WriteLine("连接服务器-{0}:{1}失败", ipAddress, port);
                // XTrace.WriteExceptionWhenDebug(ex);
                return null;
            }
            if (!client.Client.Connected)
            {
                // XTrace.WriteLine("连接服务器-{0}:{1}失败", ipAddress, port);
                return null;
            }
            //utf8编码
            // byte[] requestByte = UTF8Encoding.UTF8.GetBytes(transStr);
            try
            {
                //  XTrace.WriteLine("正在发送报文:{0}",transStr);
                client.Send(requestByte, 0, requestByte.Count());
                //   XTrace.WriteLine("报文发送成功");
                //  XTrace.WriteLine("服务器正在处理......");
            }
            catch (Exception ex)
            {
                client.Close();
                client.Dispose();
                //  XTrace.WriteLine("报文发送失败");
                //  XTrace.WriteExceptionWhenDebug(ex); 
                return null;
            }
            byte[] responseByte = null;
            try
            {
                BMC.Base.Logger.Log("接收服务器响应", "TcpLink");
                client.BufferSize = 999999;
                responseByte = client.Receive();
                if (responseByte == null)
                {
                    // XTrace.WriteLine("接收服务器响应失败,数据为Null");
                    return null;
                }
                else
                {
                    //  XTrace.WriteLine("数据接收成功");
                }
            }
            catch (Exception ex)
            {
                //  XTrace.WriteLine("接收服务器响应失败");
                //  XTrace.WriteExceptionWhenDebug(ex);
                return null;
            }
            finally
            {
                //  XTrace.WriteLine("断开连接");
                client.Close();
                client.Dispose();
            }
            return responseByte;
        }

        public static byte[] TcpLink(string address, int port, byte[] requestByte)
        {
            IPEndPoint ip;
            if (String.IsNullOrEmpty(address))
            {
                ip = new IPEndPoint(IPAddress.Loopback, port);
            }
            else
            {
                ip = new IPEndPoint(IPAddress.Parse(Address), port);
            }
            TcpClientX client = new TcpClientX();
            try
            {
                client.BufferSize = 999999;
                client.Client.ReceiveTimeout = 60000;
                client.Client.SendTimeout = 60000;
                client.UseThreadPool = true;
                BMC.Base.Logger.Log(String.Format("正在连接服务器-{0}:{1}", Address, Port), "TcpLink");
                // XTrace.WriteLine("正在连接服务器-{0}:{1}", ipAddress, port);
                client.Connect(ip);
                // XTrace.WriteLine("连接服务器-{0}:{1}成功", ipAddress, port);
            }
            catch (Exception ex)
            {
                client.Close();
                client.Dispose();
                //  XTrace.WriteLine("连接服务器-{0}:{1}失败", ipAddress, port);
                // XTrace.WriteExceptionWhenDebug(ex);
                return null;
            }
            if (!client.Client.Connected)
            {
                // XTrace.WriteLine("连接服务器-{0}:{1}失败", ipAddress, port);
                return null;
            }
            //utf8编码
            // byte[] requestByte = UTF8Encoding.UTF8.GetBytes(transStr);
            try
            {
                //  XTrace.WriteLine("正在发送报文:{0}",transStr);
                client.Send(requestByte, 0, requestByte.Count());
                //   XTrace.WriteLine("报文发送成功");
                //  XTrace.WriteLine("服务器正在处理......");
            }
            catch (Exception ex)
            {
                client.Close();
                client.Dispose();
                //  XTrace.WriteLine("报文发送失败");
                //  XTrace.WriteExceptionWhenDebug(ex); 
                return null;
            }
            byte[] responseByte = null;
            try
            {
                BMC.Base.Logger.Log("接收服务器响应", "TcpLink");
                client.BufferSize = 999999;
                responseByte = client.Receive();
                if (responseByte == null)
                {
                    // XTrace.WriteLine("接收服务器响应失败,数据为Null");
                    return null;
                }
                else
                {
                    //  XTrace.WriteLine("数据接收成功");
                }
            }
            catch (Exception ex)
            {
                //  XTrace.WriteLine("接收服务器响应失败");
                //  XTrace.WriteExceptionWhenDebug(ex);
                return null;
            }
            finally
            {
                //  XTrace.WriteLine("断开连接");
                client.Close();
                client.Dispose();
            }
            return responseByte;
        }

        public static byte[] TradeTcpLink(byte[] requestByte, string transCode)
        {

            try
            {
                Address = BMC.Core.PlatformUtil.PlatformConfig.TradeServerAddress;
                Port = int.Parse(BMC.Core.PlatformUtil.PlatformConfig.TradeServerPort);
            }
            catch (Exception ex)
            {
                //    XTrace.WriteLine(string.Format("交易服务器地址{0}:{1}格式不正确", address, port.ToString()));
                //    XTrace.WriteExceptionWhenDebug(ex);
            }
            return TcpLink(Address, Port, requestByte);
        }

#if DEBUG
        static string LeftZero(string Source, int Leng)
        {
            int initLeng = Source.Length;
            if (Leng > initLeng)
            {
                for (int i = initLeng; i < Leng; i++)
                {
                    Source = "0" + Source;
                }
            }
            return Source;
        }
#endif
    }
}
