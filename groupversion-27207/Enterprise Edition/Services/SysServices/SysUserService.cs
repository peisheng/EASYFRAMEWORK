using System;
using System.Linq;
using Common;
using IServices.ISysServices;
using Models.SysModels;
using Services.Infrastructure;

namespace Services.SysServices
{
    public class SysUserService : RepositoryBase<SysUser>, ISysUserService
    {
        public SysUserService(IDatabaseFactory databaseFactory, IUserInfo userInfo)
            : base(databaseFactory, userInfo)
        {
        }

        public override IQueryable<SysUser> GetAll()
        {
            return base.GetAll().OrderBy(a => a.UserName);
        }

        public override void Add(SysUser entity)
        {
            entity.Password = HashPassword.GetHashPassword(entity.Password);
            entity.OldPassword = entity.Password;
            base.Add(entity);
        }

        public override void Update(SysUser entity)
        {
            if (entity.Password != entity.OldPassword)
            {
                entity.Password = HashPassword.GetHashPassword(entity.Password);
                entity.OldPassword = entity.Password;
            }
            base.Update(entity);
        }

        public SysUser GetByUserNamePassword(Guid enterpriseId, string userName, string password)
        {
            password = HashPassword.GetHashPassword(password);
            return base.GetAllEnt().FirstOrDefault(a => a.EnterpriseId == enterpriseId && a.UserName.Equals(userName) && a.Password.Equals(password));
        }

        public SysUser GetByUserNamePassword(Guid userId, string password)
        {
            password = HashPassword.GetHashPassword(password);
            return base.GetAllEnt().FirstOrDefault(a => a.Id.Equals(userId) && a.Password.Equals(password));
        } 
    }
}