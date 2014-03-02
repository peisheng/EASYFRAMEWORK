using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using log4net;

namespace ReplaceTool.Hepler
{
    public class LogHelper  
    {
        private static ILog _log;
        static  ILog LogInfo
        {
            get {

                if (_log == null)
                {
                    log4net.Config.XmlConfigurator.Configure();
                    _log = log4net.LogManager.GetLogger("MyLog");
                }
                return _log;
            }
        }

         

        public static void WriteLog(string info,Exception ex=null)
        {
            if (LogInfo.IsInfoEnabled)
            {
                if (ex == null)
                    LogInfo.Info(info);
                else
                    LogInfo.Info(info +"  " +  ex.Message +"  "+ ex.StackTrace);
            }

        }

        
    }
}
