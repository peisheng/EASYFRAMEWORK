using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows;

namespace StockTool.Helper
{
    public class WindHelper
    {
        
        public static void SetWindowStartLocationOnRightButtom(System.Windows.Window win)
        {
            win.WindowStartupLocation = WindowStartupLocation.Manual;
            win.Top = SystemParameters.PrimaryScreenHeight - win.Height;
            win.Left = SystemParameters.PrimaryScreenWidth - win.Width ; 
        }
         
    }
}
