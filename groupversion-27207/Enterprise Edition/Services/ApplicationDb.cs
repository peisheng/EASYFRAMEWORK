using System;
using System.ComponentModel.Composition;
using System.Configuration;
using System.Data.Common;
using Common;
using EFCachingProvider;
using EFCachingProvider.Caching;
using Services.SysServices;
using System.Data.Entity;

namespace Services
{
    public class ApplicationDb : SysApplicationDb
    {
        //指定连接字符串
        public ApplicationDb()
            : base("DefaultConnection")
        {
        }
        public ApplicationDb(DbConnection dbConnection)
            : base(dbConnection)
        {
        }


        //用户实体添加到此文件中
        // public DbSet<SysEnterprise> SysEnterprises { get; set; }
    }


    /// <summary>
    ///     启用缓存的自定义EntityFramework数据访问上下文
    /// </summary>
    [Export("EFCaching", typeof(DbContext))]
    public class ApplicationCachingDb : ApplicationDb
    {
        private static readonly InMemoryCache InMemoryCache = new InMemoryCache();

        public ApplicationCachingDb()
            : base(CreateConnectionWrapper("DefaultConnection")) { }

        public ApplicationCachingDb(string connectionStringName)
            : base(CreateConnectionWrapper(connectionStringName)) { }

        /// <summary>
        ///     由数据库连接串名称创建连接对象
        /// </summary>
        /// <param name="connectionStringName">数据库连接串名称</param>
        /// <returns></returns>
        private static DbConnection CreateConnectionWrapper(string connectionStringName)
        {
           
            var providerInvariantName = "System.Data.SqlClient";
            string connectionString = null;
            var connectionStringSetting = ConfigurationManager.ConnectionStrings[connectionStringName];
            if (connectionStringSetting != null)
            {
                providerInvariantName = connectionStringSetting.ProviderName;
                connectionString = connectionStringSetting.ConnectionString;
            }
            if (connectionString == null)
            {
                throw new Exception("名称为“" + connectionStringName + "”数据库连接串的ConnectionString值为空。");
            }
            var wrappedConnectionString = "wrappedProvider=" + providerInvariantName + ";" + connectionString;
            var connection = new EFCachingConnection
            {
                ConnectionString = wrappedConnectionString,
                CachingPolicy = CachingPolicy.CacheAll,
                Cache = InMemoryCache
            };

            return connection;
        }
    }

}