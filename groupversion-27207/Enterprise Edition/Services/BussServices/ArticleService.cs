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
    class ArticleService : RepositoryBase<Article>, IArticleService
    {
        public ArticleService(IDatabaseFactory data) : base(data)
        { }
    }
}
