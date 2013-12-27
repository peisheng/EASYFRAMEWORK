using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Reflection;
using System.IO;
using System.Collections;
using Terminal.Log;

namespace ATMC.Core
{
    [Serializable]
    public class AppLoader  //:MarshalByRefObject
    {
        private string AppName { get; set; }
        private static Hashtable AppAssembly = new Hashtable();

        public AppLoader(string appName)
        {
            this.AppName = appName;
        }
        public IAppBase GetAppInstance()
        {
            List<Assembly> list = new List<Assembly>();
            AppDomain.CurrentDomain.AssemblyResolve += delegate(object s, ResolveEventArgs e)
            {
                string path = Path.Combine(AppUtil.GetAppDirectory(AppName), e.Name.Split(new char[] { ',' }).First<string>() + ".dll");
                if (File.Exists(path))
                {
                    Assembly resoveAssembly = Assembly.LoadFile(path);
                    list.Add(resoveAssembly);
                    return resoveAssembly;
                }
                return null;
            };

            Assembly appAssembly = Assembly.LoadFile(AppUtil.GetAppDllPath(AppName));
            list.Add(appAssembly);
            IAppBase app = appAssembly.CreateInstance(AppUtil.GetApp(AppName).FullTypeName, true) as IAppBase;
            if (app == null)
                Com.Logger.ErrorLog(string.Format("无法实例化{0}", AppUtil.GetApp(AppName).FullTypeName), AppName, "AppLoader.GetAppInstance");
            if (!AppAssembly.ContainsKey(AppName))
            {
                AppAssembly.Add(AppName, list);
            }
            return app;
        }

        //public void UnloadAssembly()
        //{
        //    if (AppAssembly.ContainsKey(AppName))
        //    {
        //        List<Assembly> list = AppAssembly[AppName] as List<Assembly>;
        //        for (int i = 0; i < list.Count; i++)
        //        {
        //            Assembly ass = list[i];
        //            ass = null;
        //        }
        //    }
        //}
    }
}


//using System;
//using System.Collections.Generic;
//using System.Linq;
//using System.Text;
//using System.Reflection;
//using System.IO;
//using System.Security.Permissions;
//using EasyBill.Loader;

//namespace EasyBill.AppCore
//{
//    [SecurityPermission(SecurityAction.LinkDemand)]
//    [Serializable]
//    public class AppLoader
//    {

//        private string AppName { get; set; }
//        private AppDomain domain { get; set; }
//        public AppLoader(string appName)
//        {
//            this.AppName = appName;
//            //domain = AppDomain.CurrentDomain;


//        }
//        public IAppBase GetAppInstance()
//        {
//            ObjectLoader loader = new ObjectLoader();

//            IAppBase app=loader.GetObject(AppUtil.GetAppDllPath(AppName), AppUtil.GetApp(AppName).FullTypeName,null) as IAppBase;

//            return app;

//           // //domain = AppDomain.CreateDomain(AppName);
//           // domain.AssemblyResolve += delegate(object s, ResolveEventArgs e)
//           //  {
//           //      string path = Path.Combine(AppUtil.GetAppDirectory(AppName), e.Name.Split(new char[] { ',' }).First<string>() + ".dll");
//           //      if (File.Exists(path))
//           //      {
//           //          return Assembly.LoadFile(path);
//           //      }
//           //      return null;
//           //  };
//           // IAppBase app = domain.CreateInstanceFromAndUnwrap(AppUtil.GetAppDllPath(AppName), AppUtil.GetApp(AppName).FullTypeName) as IAppBase;
//           // ProxyObject obj = (ProxyObject)domain.CreateInstanceFromAndUnwrap("EasyBill.AppCore.dll", "EasyBill.AppCore.ProxyObject");
//           // return obj.LoadAppAssembly(AppName);
//           //// return app;

//        }

//        public void UnloadAssembly()
//        {
//            if(domain!=null)
//            AppDomain.Unload(domain);
//        }

//    }


//    public class ProxyObject : MarshalByRefObject
//    {
//        Assembly assembly = null;
//        public IAppBase LoadAppAssembly(string appName)
//        {
//            assembly = Assembly.LoadFrom(AppUtil.GetAppDllPath(appName));
//            Type tp = assembly.GetType(AppUtil.GetApp(appName).FullTypeName);
//           IAppBase app = System.Activator.CreateInstance(tp) as IAppBase;
//            return app;
//        }
//    }



//}
