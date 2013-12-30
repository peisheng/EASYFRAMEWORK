using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Runtime.InteropServices;
using System.Windows.Threading;

namespace Wpf.Utils
{
    public class WindowsUtil
    {


        /// <summary>
        /// 取得当前时间与上次输入时间的差
        /// </summary>
        /// <returns>返回单位 毫秒</returns>
        public static long GetIdleTick()
        {
            LASTINPUTINFO lastInputInfo = new LASTINPUTINFO();
            lastInputInfo.cbSize = Marshal.SizeOf(lastInputInfo);
            if (!GetLastInputInfo(ref　lastInputInfo)) return 0;
            return Environment.TickCount - (long)lastInputInfo.dwTime;
        } 

        #region  取得最后输入的信息
        [DllImport("user32.dll")]
        private static extern bool GetLastInputInfo(ref LASTINPUTINFO plii);

        [StructLayout(LayoutKind.Sequential)]
        private struct LASTINPUTINFO
        {
            [MarshalAs(UnmanagedType.U4)]
            public int cbSize;
            [MarshalAs(UnmanagedType.U4)]
            public uint dwTime;
        }
        #endregion


    }
}
