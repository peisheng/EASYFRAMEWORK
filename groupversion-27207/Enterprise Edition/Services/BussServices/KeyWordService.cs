using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using Models;
using IServices;
using Services.Infrastructure;

namespace Services.BussServices
{
    class KeyWordService : RepositoryBase<KeyWord>, IKeyWordService
    {
        public KeyWordService(IDatabaseFactory data) : base(data)
        { }
    }
}
