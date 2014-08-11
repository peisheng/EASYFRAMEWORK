using System;
using System.Web.Mvc;
using IServices.Infrastructure;
using Models.SysModels;

namespace IServices.ISysServices
{
    public interface ISysEnterpriseService : IRepository<SysEnterprise>
    {
        SelectList SelectList(object selectedValue);
    }
}
