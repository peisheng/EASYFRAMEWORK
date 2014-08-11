using IServices.Infrastructure;
using Models.SysModels;
using System;
using System.Linq;
using System.Linq.Expressions;

namespace IServices.ISysServices
{
    public interface ISysUserLogService : IRepository<SysUserLog>
    {
        void DeleteExpiredData();
        void AddLogAutoSave(SysUserLog entity);
    }
}
