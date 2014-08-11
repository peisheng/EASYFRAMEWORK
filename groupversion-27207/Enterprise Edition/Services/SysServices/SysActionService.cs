using System.Linq;
using Common;
using IServices.ISysServices;
using Models.SysModels;
using Services.Infrastructure;

namespace Services.SysServices
{
    public class SysActionService : RepositoryBase<SysAction>, ISysActionService
    {
        public SysActionService(IDatabaseFactory databaseFactory, IUserInfo userInfo)
            : base(databaseFactory, userInfo)
        {
        }

        public override IQueryable<SysAction> GetAll()
        {
            return base.GetAll().OrderBy(a => a.SystemId);
        }
    }
}