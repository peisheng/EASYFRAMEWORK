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
    public   class BaseUserRoleService :RepositoryBase<BaseUserRole>,IBaseUserRoleService
    {
        public BaseUserRoleService(IDatabaseFactory data) : base(data)
        { }
    }
}
