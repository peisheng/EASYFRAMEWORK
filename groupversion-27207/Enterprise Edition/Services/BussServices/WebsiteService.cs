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
    public class WebSiteService : RepositoryBase<Website>, IWebSiteService
    {
        public WebSiteService(IDatabaseFactory data) : base(data)
        { }
    }
}
