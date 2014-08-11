using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using IServices.ISysServices;
using Models;

namespace Web.Controllers
{
    public class IndexController : Controller
    {
        private readonly ISysUserService _sysUserService;

        public IndexController(ISysUserService sysUserService)
        {
            _sysUserService = sysUserService;
        }

        //
        // GET: /Index/

        public ActionResult Index()
        {

            ViewBag.UserCount = _sysUserService.GetAll().Count();
            return View();
        }

    }
}
