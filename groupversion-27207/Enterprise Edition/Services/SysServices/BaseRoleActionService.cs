using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using IServices;
using Models;
using Services.Infrastructure;

namespace Services
{
    class BaseRoleActionService : RepositoryBase<BaseRoleAction>,IBaseRoleActionService
    {
        public BaseRoleActionService(IDatabaseFactory data) :base(data)
        {
        }
    }
}
