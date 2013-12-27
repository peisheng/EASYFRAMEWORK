using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;
using ICSharpCode.SharpZipLib.Zip;
using BMC.Core.DownLoad;

namespace BMC.Core
{
    public class AppUtil
    {

        private static string AppDirectory = Path.Combine(AppDomain.CurrentDomain.BaseDirectory, "Apps");
        public static AppConfig GetApp(string appName)
        {
            string configFilePath = Path.Combine(GetAppDirectory(appName), getAppConfigName(appName));
            if (File.Exists(configFilePath))
            {
                try
                {
                    string xmlFileString = File.ReadAllText(configFilePath);
                    //AppConfig config = XmlUtil<AppConfig>.XmlDeserialize(xmlFileString);
                    AppConfig config = SerializeUtil<AppConfig>.DeSerialize(xmlFileString);
                    return config;
                }
                catch (Exception ex)
                {
                    Com.Logger.ExceptionLog(string.Empty, ex);
                    return null;
                } 
            }
            else
            {
                Com.Logger.ErrorLog(string.Format("{0}插件的配置文件不存在，请检查插件目录{1}", appName, GetAppDirectory(appName)), "AppUtil.GetApp");
                return null;
            }
        }

        public static string GetAppDirectory(string appName)
        {
            try
            {
                string configFilePath = Path.Combine(AppDirectory, appName);
                return configFilePath;
            }
            catch (Exception ex)
            {
                Com.Logger.ExceptionLog(ex.Message, ex);
            }
            return null;
        }
        public static string GetAppDllPath(string appName)
        {
            AppConfig config = GetApp(appName);
            return Path.Combine(GetAppDirectory(appName), config.DllName);
        }

        private static string getAppConfigName(string appName)
        {
            return string.Concat(appName, ".config.xml");
        }

        public static bool CheckAppExisted(string appName)
        {
            string path = GetAppDirectory(appName);
            return Directory.Exists(path);
        }

        static string appDownloadPackageSavePath = Path.Combine(AppDomain.CurrentDomain.BaseDirectory, "Download/Apps");
        public static void UnpackDownApps(string appName)
        {
            string zipPath = Path.Combine(appDownloadPackageSavePath, appName + ".app");
            if (File.Exists(zipPath))
            {
                try
                {
                    FastZip zip = new FastZip();
                    zip.ExtractZip(zipPath, AppDirectory, "");
                }
                catch (Exception ex)
                {
                    Com.Logger.ExceptionLog(string.Format("解压应用文件包 {0}.app  的时候出错", appName), ex);

                }
            }
            else
            {
                Com.Logger.ErrorLog(string.Format("找不到下载文件夹中的 {0}.app 文件包：", appName), "", "AppUtil.UnpackDownApps");
            }
        }

        public static bool DownloadApp(string appName)
        {
            string fileName = appName + ".app";
            string savePath = Path.Combine(appDownloadPackageSavePath, fileName);
            DownloadTrans trans = new DownloadTrans();
            return trans.DownloadFile(fileName, appDownloadPackageSavePath);
        }

        public static string GetPrintTemplateContent(string appName)
        {
           // return "Print Content Test.. pleash implement the AppUtil Get Print Template Function<img src='http://cn.bing.com/az/hprichbg?p=rb%2fWaterWheel_ZH-CN1971453770.jpg'/>";
            AppConfig config = GetApp(appName);
           string templatePath= Path.Combine(GetAppDirectory(appName), config.PrintContentTemplate);
       string    templateContent = File.ReadAllText(templatePath,Encoding.UTF8);
       return templateContent;
             
        }

        public static string AppPrintFormBackgroundPath(string appName)
        {
            string path = Path.Combine(GetAppDirectory(appName), "formbackground.jpg");

            return path;
        }






    }
}
