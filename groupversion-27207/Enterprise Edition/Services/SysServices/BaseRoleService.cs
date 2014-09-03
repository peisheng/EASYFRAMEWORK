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
    class BaseRoleService :RepositoryBase<BaseRole>,IBaseRoleService
    {
        public BaseRoleService(IDatabaseFactory data):base(data)
        { }
    }
}
