using System;
using System.Collections.Specialized;
using System.Configuration;
using System.Web.Mvc;
using Common;

namespace Web.Areas.Admin.Controllers
{
    public class WebConfigAppSettingController : Controller
    {
        //
        // GET: /Platform/WebConfigAppSetting/

        
        public ActionResult Index()
        {
            NameValueCollection model = ConfigurationManager.AppSettings;
            return View(model);
        }

       [ValidateInput(true)]
        public ActionResult Edit(string id)
        {
         string validateid=id.Replace("-",":");

         ViewBag.id = validateid;
         ViewBag.value = ConfigurationManager.AppSettings[validateid];
            return View();
        }
       

        [HttpPost]
        public ActionResult Edit(string id, string value)
        {
            try
            {
                string validateid = id.Replace("-",":");
                var webConfig = new WebAppSetting();
                webConfig.Modify(validateid, value);
                return RedirectToAction("Index");
            }
            catch (Exception e)
            {
                ModelState.AddModelError("", e.Message);
            }
            Edit(id);
            return View();
        }
    }
}