using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using IServices.ISysServices;

namespace Web.Areas.Admin.Controllers
{
    public class HelpController : Controller
    {

        private readonly ISysHelpService _iSysHelpService;
        private readonly ITheIndexService _iTheIndexService;

        public HelpController(ISysHelpService iSysHelpService, ITheIndexService iTheIndexService)
        {
            _iSysHelpService = iSysHelpService;
            _iTheIndexService = iTheIndexService;
        }

        //
        // GET: /Admin/Desktop/

        public ActionResult Index(string keyword)
        {
            var model = _iSysHelpService.GetAllEnt();

            if (!string.IsNullOrEmpty(keyword))
            {
                var aa = _iTheIndexService.Search("SysHelp", keyword);
                model = model.Where(a => aa.Contains(a.Id));
            }

            return View(model);
        }

    }
}
