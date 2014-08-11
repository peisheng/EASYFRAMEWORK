using System.Linq;
using Common;
using IServices.ISysServices;
using Models.SysModels;
using Services.Infrastructure;

namespace Services.SysServices
{
    public class SysHelpService : RepositoryBase<SysHelp>, ISysHelpService
    {
        private readonly ITheIndexService _iTheIndexService;

        public SysHelpService(IDatabaseFactory databaseFactory, IUserInfo userInfo, ITheIndexService iTheIndexService)
            : base(databaseFactory, userInfo)
        {
            _iTheIndexService = iTheIndexService;
        }

        public override void Save(System.Guid? id, SysHelp entity)
        {
            base.Save(id, entity);
            _iTheIndexService.CreateIndex(entity.Id, "SysHelp", entity.Title + entity.Content);
        }

        public override void Delete(SysHelp item)
        {
            base.Delete(item);
            _iTheIndexService.RemoveIndex(item.Id);
        }

        public override IQueryable<SysHelp> GetAll()
        {
            return base.GetAll().OrderBy(a => a.Sort);
        }
    }
}