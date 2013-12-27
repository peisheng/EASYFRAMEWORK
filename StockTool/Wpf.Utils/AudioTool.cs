using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Runtime.InteropServices;

namespace BMC.Core
{
    public class AudioPlay
    {
         
            [DllImport("winmm.dll")]
            private static extern long mciSendString(string lpstrCommand, string lpstrReturnString, long length, long hwndcallback);
            public AudioPlay(string name)
            {
                filename = name;
                
            }
            public void play()
            {
                t = mciSendString(@"open " + filename, m, 0, 0);
                t = mciSendString(@"play " + filename + @" wait", m, 0, 0);
                t = mciSendString(@"close " + filename, m, 0, 0);
            }
            private string filename;
            private string m = @"                                  ";
            private long t; 

    }
}
