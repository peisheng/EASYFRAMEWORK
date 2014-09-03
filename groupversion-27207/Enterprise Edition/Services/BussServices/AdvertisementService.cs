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
  public  class AdvertisementService :RepositoryBase<Advertisement>,IAdvertisementService
    {
        public AdvertisementService(IDatabaseFactory data) : base(data)
        { }
    }
}
