using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Runtime.InteropServices;
using SHDocVw;
using Microsoft.Win32;
using System.Collections;
using System.Threading;
using System.Windows.Threading;
using System.Text.RegularExpressions;
using System.Windows;
using System.ComponentModel;
using System.Reflection;
namespace ATMC.Core
{
    
    public static class PrinterUtil
    {
        [ComImport, InterfaceType(ComInterfaceType.InterfaceIsIUnknown)]
        [Guid("6d5140c1-7436-11ce-8034-00aa006009fa")]
        internal interface IServiceProvider
        {
            [return: MarshalAs(UnmanagedType.IUnknown)]
            object QueryService(ref Guid guidService, ref Guid riid);
        }
        static readonly Guid SID_SWebBrowserApp = new Guid("0002DF05-0000-0000-C000-000000000046");


        private static bool hasSetup = false;
        static void Print(System.Windows.Controls.WebBrowser webbrowse)
        {
           
            IServiceProvider serviceProvider = null;
            if (webbrowse.Document != null)
            {
                serviceProvider = (IServiceProvider)webbrowse.Document;
            }


            Guid serviceGuid = SID_SWebBrowserApp;
            Guid iid = typeof(SHDocVw.IWebBrowser2).GUID;
            SHDocVw.IWebBrowser2 myWebBrowser2 = (SHDocVw.IWebBrowser2)serviceProvider.QueryService(ref serviceGuid, ref iid);
            object NullValue = null;

            if (!hasSetup)
            {
                const string keyName = @"Software\Microsoft\Internet Explorer\PageSetup";
                try
                {
                    using (var key = Registry.CurrentUser.OpenSubKey(keyName, true))
                    {
                        if (key != null)
                        {
                            key.SetValue("footer", "");
                            key.SetValue("header", "");
                            hasSetup = true;
                        }
                    }
                }
                catch (Exception ex)
                {
                    Com.Logger.ExceptionLog(string.Empty, ex);
                }
            }
            myWebBrowser2.ExecWB(SHDocVw.OLECMDID.OLECMDID_PRINT, SHDocVw.OLECMDEXECOPT.OLECMDEXECOPT_DONTPROMPTUSER, ref NullValue, ref NullValue);

        }



       /// <summary>
       /// 
       /// </summary>
       /// <param name="webbrowse"></param>
       /// <param name="appName"></param>
       /// <param name="hash"></param>
       /// <param name="doKeyReplace">
       /// 参数说明：1: string Key
       ///           2: FieldList
       ///           3: String TemplateContent
       /// 
       /// </param>
       
        public static void PrintForm(System.Windows.Controls.WebBrowser webbrowse, string appName, Hashtable hash,Func<string,Hashtable,string,string> doKeyReplace=null )
        {
            string printContent = AppUtil.GetPrintTemplateContent(appName);
            string backgroundpath = AppUtil.AppPrintFormBackgroundPath(appName);
            backgroundpath = "file://" + backgroundpath.Replace("\\","/");
            printContent=printContent.Replace("##BackgroundPath##", backgroundpath);
            List<string> keys = StringTool.GetTemplateKey(printContent); 
            foreach(string s in keys)
            {
                if (doKeyReplace == null)
                {
                    string value = Convert.ToString(hash[s]);
                    printContent = printContent.Replace("{{" + s + "}}", value);
                }
                else
                {
                   printContent= doKeyReplace(s, hash, printContent);
                }
            }
            webbrowse.NavigateToString(printContent); 
           
        }

        
        public static System.Windows.Navigation.NavigatedEventHandler doPrint(System.Windows.Controls.WebBrowser webbrowse)
        { 
            return (s, o) =>
            {
                 
                PrinterUtil.Print(webbrowse); 
               
            };
        } 

    }



}
