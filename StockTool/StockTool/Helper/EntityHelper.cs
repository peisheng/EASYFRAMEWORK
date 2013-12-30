using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using StockTool.Entity;
using Wpf.Utils;

namespace StockTool.Helper
{
    public class EntityHelper
    {

        public static string SettingPath = "StockSetttings.xml";
        public static StockSetttings GetSettings()
        {
           StockSetttings setting= XmlUtil<StockSetttings>.XmlDeserializeFromFile(SettingPath);
           if (setting == null)
           {
               setting = new StockSetttings();
               setting.SetttingList = new List<SettingEntity>();
           } 
           return setting;
        }
        public static void SaveSetting(SettingEntity entity)
        {
           StockSetttings set= GetSettings();
           SettingEntity selboj = set.SetttingList.Where(p => p.StockCode == entity.StockCode).FirstOrDefault();
           if (selboj != null)
            {
                selboj = entity;
            }
            else
            {
                set.SetttingList.Add(entity);
            }
            SaveSetting(set);
        }
        private static void SaveSetting(StockSetttings setting)
        {
            XmlUtil<StockSetttings>.XmlSerializeToFile(setting,SettingPath);
        }
        public static bool RemoveSetting(string stockCode)
        {
            StockSetttings settings = GetSettings();
            var entity = settings.SetttingList.Where(p => p.StockCode == stockCode).FirstOrDefault();
            if (entity!=null)
            { 
                settings.SetttingList.Remove(entity); 
               SaveSetting(settings);
            }
            return true; 
        }

        public static SettingEntity GetSetting(string stockCode)
        {
            StockSetttings set = GetSettings();
            return set.SetttingList.Where(p => p.StockCode == stockCode).FirstOrDefault();
        }
    }
}
