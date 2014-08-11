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
    public class SysUserLogService : RepositoryBase<SysUserLog>, ISysUserLogService
    {
        private readonly IUnitOfWork _unitOfWork;

        public SysUserLogService(IDatabaseFactory databaseFactory, IUnitOfWork unitOfWork, IUserInfo userInfo)
            : base(databaseFactory, userInfo)
        {
            _unitOfWork = unitOfWork;
        }

        public void AddLogAutoSave(SysUserLog entity)
        {
            base.Save(null,entity);
            _unitOfWork.Commit();
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