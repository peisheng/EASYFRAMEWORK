using System.Linq;
using System.Web.Mvc;
using Common;
using DoddleReport;
using DoddleReport.Web;
using IServices.ISysServices;
using IServices.Infrastructure;
using Web.Helper;

namespace Web.Areas.Admin.Controllers
{
    public class SysLogController : Controller
    {
        private readonly ISysLogService _sysLogService;
        private readonly IUnitOfWork _unitOfWork;

        public SysLogController(IUnitOfWork unitOfWork, ISysLogService sysLogService)
        {
            _unitOfWork = unitOfWork;
            _sysLogService = sysLogService;
        }

        //
        // GET: /Platform/SysLog/

        public ActionResult Index(int pageIndex = 1)
        {
            var model = _sysLogService.GetAllEnt().Select(a => new { a.Title, a.CreatedDate });


            ViewBag.PropertyInfo = model.ElementType.GetProperties();

            model = model.Processing(Request.QueryString);

            if (!string.IsNullOrEmpty(Request["report"]))
            {
                //导出
                var reportModel = new Report(model.ToReportSource());
                return new ReportResult(reportModel);
            }

            return View(model.ToPagedList(pageIndex));
        }
    }
}