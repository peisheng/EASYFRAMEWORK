using IServices.ISysServices;
using System.Data.Objects;
using System.IO;
using System.Linq;
using System.Runtime.CompilerServices;
using System.Web.Mvc;
using System.Web.UI.DataVisualization.Charting;

namespace Web.Areas.Admin.Controllers
{
    public class SysStatisticController : Controller
    {
        private readonly ISysLogService _sysLogService;
        private readonly ISysUserLogService _sysUserLogService;

        public SysStatisticController(ISysLogService sysLogService,
                                      ISysUserLogService sysUserLogService)
        {
            _sysLogService = sysLogService;
            _sysUserLogService = sysUserLogService;
        }

        // 系统统计信息
        // GET: /Platform/SysStatistic/

        public ActionResult Index()
        {
            return View();
        }

        public FileResult Details(int width = 1000, int height = 618)
        {
            var sysUserLog = _sysUserLogService.GetAllEnt();
            var sysLog = _sysLogService.GetAllEnt();

            var chart = new Chart { Height = height, Width = width };
            var chartArea = new ChartArea("Area1") {AxisX = {Interval = 1}};
            chart.ChartAreas.Add(chartArea);
            var legend = new Legend();
            chart.Legends.Add(legend);

            var seriescountAll = new Series("使用次数");
            var countAll =
                sysUserLog.GroupBy(a => EntityFunctions.TruncateTime(a.CreatedDate))
                         .Select(a => new { Key = a.Key.Value, Count = a.Count() })
                         .OrderBy(a => a.Key);
            seriescountAll.ChartArea = "Area1";
            seriescountAll.IsVisibleInLegend = true;
            seriescountAll.IsValueShownAsLabel = true;
            seriescountAll.Points.DataBind(countAll, "Key", "Count", "");
            seriescountAll.ChartType = SeriesChartType.Column;
            chart.Series.Add(seriescountAll);


            var seriescountUser = new Series("登陆用户数量");
            var countUser =
                sysUserLog.GroupBy(a => EntityFunctions.TruncateTime(a.CreatedDate)).Select(
                    a => new { Key = a.Key.Value, Count = a.Select(c => c.SysUserId).Distinct().Count() })
                         .OrderBy(a => a.Key);
            seriescountUser.ChartArea = "Area1";
            seriescountUser.IsVisibleInLegend = true;
            seriescountUser.IsValueShownAsLabel = true;
            seriescountUser.Points.DataBind(countUser, "Key", "Count", "");
            seriescountUser.ChartType = SeriesChartType.Column;
            chart.Series.Add(seriescountUser);


            var seriessysLogChart = new Series("系统日志");
            var sysLogChart =
                sysLog.GroupBy(a => EntityFunctions.TruncateTime(a.CreatedDate))
                      .Select(a => new { Key = a.Key.Value, Count = a.Count() })
                      .OrderBy(a => a.Key);
            seriessysLogChart.ChartArea = "Area1";
            seriessysLogChart.IsVisibleInLegend = true;
            seriessysLogChart.IsValueShownAsLabel = true;
            seriessysLogChart.Points.DataBind(sysLogChart, "Key", "Count", "");
            seriessysLogChart.ChartType = SeriesChartType.Column;
            chart.Series.Add(seriessysLogChart);


            var imageStream = new MemoryStream();
            chart.SaveImage(imageStream, ChartImageFormat.Png);
            imageStream.Position = 0;
            return new FileStreamResult(imageStream, "image/png");
        }
    }
}