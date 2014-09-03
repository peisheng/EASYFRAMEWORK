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
    public class WebSiteSettingService : RepositoryBase<WebsiteSetting>, IWebSiteSettingService
    {
        public WebSiteSettingService(IDatabaseFactory data) :base(data)
        { }
    }
}
