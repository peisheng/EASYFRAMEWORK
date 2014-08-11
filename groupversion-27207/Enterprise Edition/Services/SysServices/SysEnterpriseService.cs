using System;
using System.Linq;
using System.Web.Mvc;
using Common;
using IServices.ISysServices;
using Models.SysModels;
using Services.Infrastructure;

namespace Services.SysServices
{
    public class SysEnterpriseService : RepositoryBase<SysEnterprise>, ISysEnterpriseService
    {
        public SysEnterpriseService(IDatabaseFactory databaseFactory, IUserInfo userInfo)
            : base(databaseFactory, userInfo)
        {
        }

        public override IQueryable<SysEnterprise> GetAll()
        {
            return base.GetAll().OrderBy(a => a.EnterpriseName);
        }
    
        public SelectList SelectAllList(object selectedValue)
        {
            return new SelectList(GetAllEnt().Where(a => a.Enabled).Select(a => new { a.Id, a.EnterpriseName }), "Id", "EnterpriseName", selectedValue);
        }

        public SelectList SelectList(object selectedValue)
        {
            return new SelectList(GetAllEnt().Where(a => a.Enabled && a.Validity>DateTime.Now).Select(a => new { a.Id, a.EnterpriseName }), "Id", "EnterpriseName", selectedValue);
        }
    }
}