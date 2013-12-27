using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using BMC.Base;
namespace BMC.Core
{
   public class PlatformUtil
    {
       public static string configPath = AppDomain.CurrentDomain.BaseDirectory;
       public static string PlatformConfigName = "Config\\TradeAndSkin.dat";
       private static Config platformConfig;
       
       #region 配置管理
       public static void ReadConfig()
       {
           try
           {
               platformConfig = XmlUtil<Config>.XmlDeserializeFromFile(System.IO.Path.Combine(configPath, "Platform.config"));
               //platformConfig = SerializeUtil<Config>.DeSerialize(System.IO.Path.Combine(configPath, PlatformConfigName));
               //return platformConfig;
           }
           catch 
           {
               Logger.Log("PlatformConfig读取失败", "ReadConfig");
               //return null;
           }
       }

       public static void ReadConfig(string configpath)
       {
           try
           {
               configPath = configpath;
               ReadConfig();
           }
           catch 
           {
               Logger.Log("PlatformConfig读取失败", "ReadConfig");
               //return null;
           }
       }

       public static void SaveConfig() {
           ModifyConfig(platformConfig);
       }

       public static void ModifyConfig(Config config)
       {
           try
           {
               XmlUtil<Config>.XmlSerializeToFile(config, System.IO.Path.Combine(configPath, "Platform.config"));
               SerializeUtil<Config>.Serialize(config, System.IO.Path.Combine(configPath, PlatformConfigName));
           }
           catch {
               Logger.Log("修改配置文件(PlatformConfig)出错", "ReadConfig");
           }          
       }

       public static Config PlatformConfig
       {
           get
           {
               //ReadConfig();
               return platformConfig;
           }
           set
           {
               platformConfig = value;
           }
       }
       #endregion

       #region 资源路径管理
       public static string GetResourceDirectory() {
           return platformConfig.ResourceDirectory;
       }
       public static bool SetResourceDirectory(string ResourcePath){
           if (ResourcePath != null)
           {
               platformConfig.ResourceDirectory = ResourcePath;
               return true;
           }
           else { 
               return false;
           }
       }
       #endregion

       #region 皮肤设置
       /// <summary>
       /// 获取皮肤列表
       /// </summary>
       /// <returns>List＜SkinConfig＞</returns>
       public static List<SkinConfig> GetSkinList()
       {
           return platformConfig.SkinList;
       }
       public static void SettingSkin(string currentSkinName) {
           platformConfig.SkinName = currentSkinName;
           SaveConfig();
       }
       /// <summary>
       /// 根据提供的皮肤名称获取皮肤资源目录
       /// </summary>
       /// <param name="SkinName">string型皮肤名称</param>
       /// <returns>皮肤目录</returns>
       public static string GetSkinDirectory()
       {
           string SkinName = platformConfig.SkinName;
           return GetSkinDirectory(SkinName);
       }
       public static string GetSkinDirectory(string SkinName)
       {
           string SkinDirectory = null;
           List<SkinConfig> SkinList = platformConfig.SkinList;
           for (int i = 0; i < SkinList.Count(); i++)
           {
               if (SkinName == SkinList[i].SkinName)
               {
                   SkinDirectory = SkinList[i].SkinResourceDirectory;
               }
           }
           if (null == SkinDirectory)
               Logger.Log("在已有的皮肤列表中未找到当前的皮肤名称",  "GetSkinDirectory");
           return SkinDirectory;
       }
       /// <summary>
       /// 添加皮肤
       /// </summary>
       /// <param name="Skin">SkinConfig类型</param>
       /// <returns>bool</returns>
       public static bool AddSkin(SkinConfig Skin){
           List<SkinConfig> list = platformConfig.SkinList;
           int count = list.Count(p => p.SkinName == Skin.SkinName);
           
           if (count > 0)
           {
               Logger.Log(string.Format("{0}皮肤已经存在，请更改名称。", Skin.SkinName), "AddSkin");
               return false;
           }
           else
           {
               list.Add(Skin);
               platformConfig.SkinList = list;
               SaveConfig();
               Logger.Log(string.Format("系统已经成功添加{0}应用", Skin.SkinName),  "AddSkin");
               return true;
           }
       }
       /// <summary>
       /// 删除皮肤
       /// </summary>
       /// <param name="Skin">SkinConfig类型</param>
       /// <returns>bool</returns>
       public static bool DeleteSkin(string SkinName)
       {
           List<SkinConfig> list = platformConfig.SkinList;
           int count = list.Count(p => p.SkinName == SkinName);
           if (count > 0)
           {
               SkinConfig appconf = list.Where(p => p.SkinName==SkinName).FirstOrDefault();
               list.Remove(appconf);
               platformConfig.SkinList = list;
               SaveConfig();
               Logger.Log(string.Format("系统已经成功删除皮肤：{0}", SkinName),  "DeleteSkin");
               return true;
           }
           else
           {
               Logger.Log(string.Format("系统不存在{0}皮肤，无法删除", SkinName), "DeleteSkin");
               return false;
           }
       }
       /// <summary>
       /// 获取当前分辨率宽度设置
       /// </summary>
       /// <param name="SkinName">皮肤名称</param>
       /// <returns>double分辨率宽度</returns>
       public static double GetResolutionWidth()
       {
           double ResolutionWidth = 0;
           string SkinName = platformConfig.SkinName;
           List<SkinConfig> SkinList = platformConfig.SkinList;
           for (int i = 0; i < SkinList.Count(); i++)
           {
               if (SkinName == SkinList[i].SkinName)
               {
                   ResolutionWidth = SkinList[i].ResolutionWidth;
               }
           }
           if (0 == ResolutionWidth)
               Logger.Log("当前的皮肤设置的分辨率宽度为0", "GetResolutionWidth");
           return ResolutionWidth;
       }
       /// <summary>
       /// 获取当前分辨率高度设置
       /// </summary>
       /// <param name="SkinName">皮肤名称</param>
       /// <returns>double分辨率高度</returns>
       public static double GetResolutionHeight()
       {
           double ResolutionHeight = 0;
           string SkinName = platformConfig.SkinName;
           List<SkinConfig> SkinList = platformConfig.SkinList;
           for (int i = 0; i < SkinList.Count(); i++)
           {
               if (SkinName == SkinList[i].SkinName)
               {
                   ResolutionHeight = SkinList[i].ResolutionHeight;
               }
           }
           if (0 == ResolutionHeight)
               Logger.Log("当前的皮肤设置的分辨率高度为0",  "GetResolutionWidth");
           return ResolutionHeight;
       }

#endregion

       #region App目录设置
       /// <summary>
       /// 获取应用目录列表
       /// </summary>
       /// <returns>List＜AppDirectoryConfig＞</returns>
       public static List<AppDirectoryConfig> AppDirectoryList
       {
           get { return platformConfig.AppDirectoryList; }
           set { platformConfig.AppDirectoryList = value; }
       }
       /// <summary>
       /// 添加新目录
       /// </summary>
       /// <param name="NewAppDirectory"></param>
       /// <returns></returns>
       public static bool AddAppDirectory(AppDirectoryConfig NewAppDirectory){
           bool Result = true;
           int Count = platformConfig.AppDirectoryList.Count(p => p.Content.Equals(NewAppDirectory));
           if (Count > 0)
           { 
               Result = false; 
           }
           if (Result) {
               platformConfig.AppDirectoryList.Add(NewAppDirectory);
               SaveConfig();
           }
           return Result;
       }
       public static int GetDirectoryParentID(List<AppDirectoryConfig> DirectoryList,string DirectoryContent) {
           int ReturnID = 0;
           foreach (AppDirectoryConfig Directory in DirectoryList)
           {
               if (Directory.Content == DirectoryContent)
               {
                   ReturnID = Directory.Parent_ID;
               }
           }
           return ReturnID;
       }
       public static int GetDirectoryID(List<AppDirectoryConfig> DirectoryList, string DirectoryContent)
       {
           int ReturnID = 0;
           foreach (AppDirectoryConfig Directory in DirectoryList)
           {
               if (Directory.Content == DirectoryContent)
               {
                   ReturnID = Directory.ID;
               }
           }
           return ReturnID;
       }

       /// <summary>
       /// 删除目录，将子元素放置顶级目录
       /// </summary>
       /// <param name="DeleteAppDirectoryName">目录名称</param>
       /// <returns></returns>
       public static bool DeleteAppDirectory(string DeleteAppDirectoryName) {
           bool Result = false;
           int Count = platformConfig.AppDirectoryList.Count(p=>p.Content.Equals(DeleteAppDirectoryName));
           if (Count > 0)
           {
               AppDirectoryConfig DeleteAppDirectory = platformConfig.AppDirectoryList.Where(p => p.Content.Equals(DeleteAppDirectoryName)).FirstOrDefault();
               //搜索AppDirectory，将子Directory放入顶级目录
               IEnumerable<AppDirectoryConfig> DirectoryList = platformConfig.AppDirectoryList.Where(p => p.Parent_ID == GetDirectoryID(platformConfig.AppDirectoryList, DeleteAppDirectoryName));
               foreach(AppDirectoryConfig Directory in DirectoryList){
                   Directory.Parent_ID =  0;
               }

               //搜索AppList，将App的Directory设为顶级目录
               IEnumerable<AppConfig> AppList = platformConfig.AppList.Where(p => p.Parent_ID.Equals(PlatformUtil.GetDirectoryID(platformConfig.AppDirectoryList, DeleteAppDirectoryName)));
               foreach (AppConfig app in AppList)
               {
                   //将该App设为顶级目录
                   app.Parent_ID = 0;
               }

               platformConfig.AppDirectoryList.Remove(DeleteAppDirectory);
               SaveConfig();
               Result = true;
           }
           else {
               Result = false;
           }

           return Result;
       }
       
       #endregion

       #region App设置
       /// <summary>
       /// 获取应用列表
       /// </summary>
       /// <returns>List＜AppConfig＞</returns>
       public static List<AppConfig> AppList
       {
           get { return platformConfig.AppList; }
           set { platformConfig.AppList = value; }
       }

       public static AppConfig GetApp(string appName)
       {
           AppConfig ReturnApp = new AppConfig();
           bool Exist = false;
           foreach (AppConfig App in platformConfig.AppList) {
               if (App.Name == appName)
               {
                   ReturnApp = App;
                   Exist = true;
               }
           }
           if (Exist)
           {
               return ReturnApp;
           }
           else
           {
               return null;
           }
       }

       /// <summary>
       /// 添加应用
       /// </summary>
       /// <param name="app">AppConfig类型</param>
       /// <returns>bool</returns>
       public static bool AddApp(AppConfig app)
       {
           List<AppConfig> list = platformConfig.AppList;
           int count=list.Count(p => p.Name == app.Name);
           if (count > 0)
           {
               Logger.Log( string.Format("{0}应用已经存在，请先卸载后再添加该应用", app.Name), "PlatformUtil.AddApp");
               return false;
           }
           else
           {
               list.Add(app);
               platformConfig.AppList = list;
               SaveConfig();
               Logger.Log( string.Format("系统已经成功添加{0}应用", app.Name),  "PlatformUtil.AddApp");
               return true;
           }
       }
       /// <summary>
       /// 删除应用
       /// </summary>
       /// <param name="app">AppConfig类型</param>
       /// <returns>bool</returns>
       public static bool RemoveApp(AppConfig app)
       {
           List<AppConfig> list = platformConfig.AppList;
           int count = list.Count(p => p.Name == app.Name);
           if (count > 0)
           {
               AppConfig appconf = list.Where(p => p.Name==(app.Name)).FirstOrDefault();
               list.Remove(appconf);
               platformConfig.AppList = list;
               SaveConfig();
               Logger.Log( string.Format("系统已经成功卸载{0}应用", app.Name),  "PlatformUtil.AddApp");
               return true;
           }
           else
           {
               Logger.Log( string.Format("系统不存在{0}应用，无法卸载", app.Name),  "PlatformUtil.AddApp");
               return false;
           }

       }
        #endregion
    }
}
