using System;
using System.Configuration;
using System.Data.Entity;
using System.Timers;
using System.Web.Http;
using System.Web.Mvc;
using System.Web.Optimization;
using System.Web.Routing;
using Services;
using Services.Initializer;
using Web.App_Start;
using Web.Helper;

namespace Web
{
    // 注意: 有关启用 IIS6 或 IIS7 经典模式的说明，
    // 请访问 http://go.microsoft.com/?LinkId=9394801

    public class MvcApplication : System.Web.HttpApplication
    {
        private Timer _objTimer;

        protected void Application_Start()
        {
            AreaRegistration.RegisterAllAreas();
            BundleTable.EnableOptimizations = true;    //禁止压缩js，某些js压缩后无法使用
            WebApiConfig.Register(GlobalConfiguration.Configuration);
            FilterConfig.RegisterGlobalFilters(GlobalFilters.Filters);
            RouteConfig.RegisterRoutes(RouteTable.Routes);
       

            using (var context = new ApplicationDb())
            {
                if (!context.Database.Exists())
                {
                    Database.SetInitializer(new DbEntitiesInitializer());
                }
                else
                {
                    Database.SetInitializer(new MigrateDatabaseToLatestVersion<ApplicationDb, Services.Migrations.Configuration>());
                }
                context.Database.Initialize(false);
            }

            var onTimedEvent = DependencyResolver.Current.GetService<IOnTimedEvent>();

            //计划任务 按照间隔时间执行
            _objTimer = new Timer(Convert.ToDouble(ConfigurationManager.AppSettings["Timer"]) * 1000 * 60);
            _objTimer.Elapsed += onTimedEvent.Run;
            _objTimer.Start();
            BootstrapSupport.BootstrapBundleConfig.RegisterBundles(System.Web.Optimization.BundleTable.Bundles);
          
        }
    }
}