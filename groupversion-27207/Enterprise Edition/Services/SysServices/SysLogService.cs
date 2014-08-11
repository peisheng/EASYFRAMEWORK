using System;
using System.Configuration;
using System.Linq;
using Common;
using IServices.ISysServices;
using IServices.Infrastructure;
using Models.SysModels;
using Services.Infrastructure;

namespace Services.SysServices
{
    public class SysLogService : RepositoryBase<SysLog>, ISysLogService
    {
        public SysLogService(IDatabaseFactory databaseFactory, IUserInfo userInfo)
            : base(databaseFactory, userInfo)
        {

        }

        public void DeleteExpiredData()
        {
            //只保留一定数量的日志,根据web.config中的设置值，默认单位：天。
            if (ConfigurationManager.AppSettings["LogValidity"] != null)
            {
                var logValidity = Convert.ToDouble(ConfigurationManager.AppSettings["LogValidity"]);
                var createddatetime = DateTime.Now.AddDays(-logValidity).Date;
                foreach (var item in base.GetAllEnt().Where(a => a.CreatedDate < createddatetime))
                {
                    base.Remove(item);
                }
            }
        }
    }
}