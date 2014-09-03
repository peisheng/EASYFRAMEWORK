using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using Models;
namespace WebCenter.Controllers
{
    public class HomeController : BaseController
    {
        public HomeController()
        { }
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult About()
        {
            ViewBag.Message = "Your application description page.";

            return View();
        }

        public ActionResult Contact()
        {
            ViewBag.Message = "Your contact page.";

            return View();
        }
        [HttpPost]
        public ActionResult Login(LogOn logon,string returnUrl)
        {
            if (!ModelState.IsValid)
            {
                return View(logon);
            }
            else
            {

                return null;
            }
            
        }
        public ActionResult Login()
        {
            return View();
        }
        

    }
}