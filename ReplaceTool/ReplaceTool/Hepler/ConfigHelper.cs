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

        public static ReplaceSettings ConfigSetting { get; set; }

        public static ReplaceSettings GetSetting()
        {
            ReplaceSettings settings = XmlUtil<ReplaceSettings>.XmlDeserializeFromFile("Config.xml");
            if (settings == null)
            {
                settings = new ReplaceSettings();
                settings.GroupSettings = new List<ReplaceGroupSetting>();
                settings.AllReplaceStrings = new List<string>();

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
            ReplaceGroupSetting group = ConfigSetting.GroupSettings.Where(p => p.GroupName == GroupName).FirstOrDefault();
            return group;
        }
        public static bool SetGroupSetting(ReplaceGroupSetting group)
        {
            if (group != null)
            {
                ReplaceGroupSetting setting = GetReplaceGroupSetting(group.GroupName);
                if (setting != null)
                {
                    bool ok = ConfigSetting.GroupSettings.Remove(setting);
                    if (ok)
                    {
                        ConfigSetting.GroupSettings.Add(group);
                        return true;
                    }
                    return false;
                }
                else
                {
                    ConfigSetting.GroupSettings.Add(group);
                }
            }
            return false;

        }

        public static bool SetMaping(string groupName, string source, string replace)
        {
            ReplaceGroupSetting setting = ConfigSetting.GroupSettings.Where(p => p.GroupName == groupName).FirstOrDefault();
            if (setting != null)
            {
                var mapper = setting.GroupReplaceItems.Where(p => p.SourceString == source).FirstOrDefault();
                if (mapper != null)
                {
                    mapper.ReplaceString = replace;
                    return true;
                }
                else
                {
                    mapper = new ReplaceMapper();
                    mapper.SourceString = source;
                    mapper.ReplaceString = replace;
                    setting.GroupReplaceItems.Add(mapper);

                }
            }
            return false;
        }

    }
}
