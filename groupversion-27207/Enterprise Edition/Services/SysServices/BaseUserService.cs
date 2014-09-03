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
   public class BaseUserService :RepositoryBase<BaseUser>,IBaseUserService
    {
        public BaseUserService(IDatabaseFactory data) :base(data)
        { }
    }
}
