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
    public class SpiderLinkService : RepositoryBase<SpiderLink>, ISpiderLinkService
    {
        public SpiderLinkService(IDatabaseFactory data) : base(data)
        { }
    }
}
