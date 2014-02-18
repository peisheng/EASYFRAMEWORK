using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using ReplaceTool.Entity;
using ReplaceTool.Utils;
using System.Threading;

namespace ReplaceTool.Hepler
{
    public class ConfigHelper
    {

        public static ReplaceSettings ConfigSetting { get;set;}

        public static ReplaceSettings GetSetting()
        {
            ReplaceSettings settings = XmlUtil<ReplaceSettings>.XmlDeserializeFromFile("Config.xml");
            if (settings == null)
            {
                settings = new ReplaceSettings();  
                settings.Setting=new List<ReplaceGroupSetting>();
            }
            ConfigSetting = settings;
            return settings; 
        }
        public static bool SaveSetting(ReplaceSettings settings)
        {
            if (settings != null)
            {
                ConfigSetting = settings;
                XmlUtil<ReplaceSettings>.XmlSerializeToFile(settings, "Config.xml");
                Thread.Sleep(300);
                return true;
            }
            else
            {
                return false;
            } 
        }
        public static ReplaceGroupSetting GetReplaceGroupSetting(string GroupName)
        {
            ReplaceGroupSetting group = ConfigSetting.Setting.Where(p => p.GroupName == GroupName).FirstOrDefault();
            return group; 
        }
        public static bool SetGroupSetting(ReplaceGroupSetting group)
        {
            if (group != null)
            {
                ReplaceGroupSetting setting = GetReplaceGroupSetting(group.GroupName);
                if (setting != null)
                {
                    bool ok = ConfigSetting.Setting.Remove(setting);
                    if (ok)
                    {
                        ConfigSetting.Setting.Add(group);
                        return true;
                    }
                    return false;
                }
                else
                {
                    ConfigSetting.Setting.Add(group);
                }
            }
            return false;
            
        }
        
    }
}
