using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Web.Security;
using Common;
using IServices.ISysServices;
using LanguagePack;
using Services.SysServices;
using Web.Areas.Login.Models;
using Services;

namespace Web.Areas.Login.Controllers
{
    [AllowAnonymous]
    public class IndexController : Controller
    {
        private readonly ISysUserService _sysUserService;
        private readonly ISysEnterpriseService _sysEnterpriseService;

        public IndexController(SysUserService sysUserService, ISysEnterpriseService sysEnterpriseService)
        {
            _sysUserService = sysUserService;
            _sysEnterpriseService = sysEnterpriseService;
        }

        //
        // GET: /Login/Index/

        public ActionResult Index()
        {
            ViewBag.EnterpriseId = _sysEnterpriseService.SelectList(null);

            //根据url选定当前企业
            if (Request.Url != null)
            {
                var host = Request.Url.Host;

                var item = _sysEnterpriseService.GetAllEnt().Select(a => new { a.Id, a.Host }).FirstOrDefault(a => a.Host.Equals(host));
                if (item != null)
                {
                    ViewBag.EnterpriseId = _sysEnterpriseService.SelectList(item.Id);
                }
            }

            return View();
        }

        [HttpPost]
        public ActionResult Index(LoginModel item)
        {
            if (ModelState.IsValid)
            {
                var sysUser = _sysUserService.GetByUserNamePassword(item.EnterpriseId, item.UserName, item.Password);

                if (sysUser != null)
                {
                    if (sysUser.Enabled)
                    {
                        FormsAuthentication.RedirectFromLoginPage(sysUser.EnterpriseId + "," + sysUser.Id, item.Remember);
                    }
                    else
                    {
                        ModelState.AddModelError("", lang.UserDisabled);
                    }
                }
                else
                {
                    ModelState.AddModelError("", lang.UserNamePasswordError);
                }
            }
            Index();
            return View(item);
        }

        public ActionResult LogOff()
        {
            FormsAuthentication.SignOut();
            return Redirect("~/");
        }
    }
}
