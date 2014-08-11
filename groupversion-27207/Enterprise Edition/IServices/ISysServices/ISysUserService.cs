using System;
using IServices.Infrastructure;
using Models.SysModels;

namespace IServices.ISysServices
{
    public interface ISysUserService : IRepository<SysUser>
    {
        SysUser GetByUserNamePassword(Guid enterpriseId, string userName, string password);
        SysUser GetByUserNamePassword(Guid userId, string password);
    }
}
