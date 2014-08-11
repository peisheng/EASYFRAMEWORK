using System;
using System.Collections.Generic;
using System.Linq;
using System.Web.Mvc;
using Common;
using DoddleReport;
using DoddleReport.Web;
using IServices.ISysServices;
using IServices.Infrastructure;
using Models.SysModels;
using Web.Helper;

namespace Web.Areas.Admin.Controllers
{
    public class SysHelpController : Controller
    {
        private readonly ISysHelpService _sysHelp;
        private readonly ISysHelpImageService _sysHelpImage;
        private readonly IUnitOfWork _unitOfWork;

        public SysHelpController(ISysHelpService sysHelp, ISysHelpImageService sysHelpImage, IUnitOfWork unitOfWork)
        {
            _sysHelp = sysHelp;
            _sysHelpImage = sysHelpImage;
            _unitOfWork = unitOfWork;
        }

        //
        // GET: /Platform/SysHelp/        
        public ActionResult Index(int pageIndex = 1)
        {
            var model = _sysHelp.GetAllEnt();

            var returnModel = model.Select(a => new { a.Title, a.Sort, a.CreatedDate, a.Remark, a.Id });

            ViewBag.PropertyInfo = returnModel.ElementType.GetProperties();

            returnModel = returnModel.Processing(Request.QueryString);

            if (!string.IsNullOrEmpty(Request["report"]))
            {
                //导出
                // var reportModel = model.Select(a => new { a.Title, a.Content, a.Sort, a.CreatedDate, a.Remark });

                //导出数据自定义字段

                var reportModel = model.Select("new ( Title,Content,Sort,CreatedDate,Remark )");

                return new ReportResult(new Report(reportModel.ToReportSource()));
            }

            return View(returnModel.ToPagedList(pageIndex));
        }

        //
        // GET: /Platform/SysHelp/Details/5

        public ActionResult Details(Guid id)
        {
            var item = _sysHelp.GetById(id);
            return View(item);
        }

        public ActionResult Create()
        {
            return RedirectToAction("Edit");
        }

        //
        // GET: /Platform/SysHelp/Edit/5

        public ActionResult Edit(Guid? id)
        {
            var item = new SysHelp();
            if (id.HasValue)
            {
                item = _sysHelp.GetById(id.Value);
            }
            if (item.SysHelpImages != null)
                ViewBag.SysHelpImagesUrl = item.SysHelpImages.Select(a => a.Url).ToList();
            return View(item);
        }

        //
        // POST: /Platform/SysHelp/Edit/5

        [HttpPost]
        public ActionResult Edit(Guid? id, SysHelp collection, IEnumerable<string> sysHelpImagesUrl)
        {
            if (!ModelState.IsValid)
            {
                Edit(id);
                return View(collection);
            }

            if (id.HasValue)
            {
                _sysHelpImage.Delete(a => a.SysHelpId.Equals(id.Value));
            }

            _sysHelp.Save(id, collection);

            if (sysHelpImagesUrl != null)
            {
                var sysHelpImages =
                    sysHelpImagesUrl.Where(a => !string.IsNullOrEmpty(a))
                                    .Select(
                                        sysHelpImageUrl =>
                                        new SysHelpImage { SysHelpId = collection.Id, Url = sysHelpImageUrl })
                                    .ToList();
                sysHelpImages.ForEach(a => _sysHelpImage.Add(a));
            }

            _unitOfWork.Commit();

            return RedirectToAction("Index");
        }


        //
        // POST: /Platform/SysHelp/Delete/5

        [HttpDelete]
        public ActionResult Delete(Guid id)
        {
            _sysHelp.Delete(a => a.Id.Equals(id));
            _unitOfWork.Commit();
            return RedirectToAction("Index");
        }
    }
}