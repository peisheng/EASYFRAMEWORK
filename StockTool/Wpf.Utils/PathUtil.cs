using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;
using BMC.Base;
namespace BMC.Core
{
    public class PathUtil
    {
        public static string appBaseDirectory = PlatformUtil.configPath;

        public void SetConfigDirectory(string Path) {
            if (Path != null) appBaseDirectory = Path;
        }

        private static PathUtil mInstance;

        public static PathUtil Instance
        {
            get
            {
                if (mInstance == null)
                {
                    mInstance = new PathUtil();
                }
                return mInstance;
            }
        }

        public static string AudioPath
        {
            get
            {
                string path = Path.Combine(appBaseDirectory,"wav");
                if (!Directory.Exists(path))
                    Directory.CreateDirectory(path);
                return path;
            }
        }
        public static string PhotoPath
        {
            get
            {
                string path = Path.Combine(appBaseDirectory, "Photo");
                if (!Directory.Exists(path))
                    Directory.CreateDirectory(path);
                return path;
            }
        }
        /// <summary>
        /// 系统资源目录
        /// </summary>
        public static string ResourceDirectory
        {
            get {
                string path = PlatformUtil.PlatformConfig.ResourceDirectory;
                if (!Directory.Exists(path))
                    Logger.Log("访问当前的资源目录不存在", "ResourceDirectory");
                return path;
            }
        }

        /// <summary>
        /// 皮肤资源目录
        /// </summary>
        public static string SkinResourceDirectory
        {
            get{
                string SkinName = PlatformUtil.PlatformConfig.SkinName;
                if (SkinName == null)
                    Logger.Log("访问当前的皮肤未设置",  "SkinResourceDirectory");

                return PlatformUtil.GetSkinDirectory();
            }
        }
        /// <summary>
        /// 皮肤全路径
        /// </summary>
        public static string SkinPath = System.IO.Path.Combine("file:\\", PathUtil.ResourceDirectory + PathUtil.SkinResourceDirectory);
        
        /// <summary>
        /// 皮肤样式文件
        /// </summary>
        public static string SkinStyleFile
        {
            get
            {
                return System.IO.Path.Combine("file:\\", PathUtil.ResourceDirectory + PathUtil.SkinResourceDirectory + "\\Style.xaml");
            }
        }
        /// <summary>
        /// EasyButton背景图片
        /// </summary>
        public static string SkinEasyButtonBg
        {
            get
            {
                return System.IO.Path.Combine("file:\\", PathUtil.ResourceDirectory + PathUtil.SkinResourceDirectory + "\\EasyButton_Bg.png");
            }
        }

        public static string PlatformConfigPath
        {
            get
            {
                string path = Path.Combine(appBaseDirectory, PlatformUtil.PlatformConfigName);
                return path;
            }
        }
    }
}
