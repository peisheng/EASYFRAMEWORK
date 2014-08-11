using System;
using System.Runtime.CompilerServices;
using System.Web;
using System.Web.Mvc;
using Common;
using IServices.ISysServices;
using System.Collections.Generic;
using System.Linq;
using IServices.Infrastructure;
using Models.SysModels;
using StructureMap;

namespace Web.Helper
{
    public class UserAuthorizeAttribute : AuthorizeAttribute
    {
   
        private readonly ISysControllerSysActionService _sysControllerSysActionService;
        private readonly ISysUserLogService _sysUserLogService;
        private readonly ISysRoleService _sysRoleService;
        private readonly IUserInfo _userInfo;

        public UserAuthorizeAttribute()
        {
            _userInfo = DependencyResolver.Current.GetService<IUserInfo>();
            _sysRoleService = DependencyResolver.Current.GetService<ISysRoleService>();
            _sysControllerSysActionService = DependencyResolver.Current.GetService<ISysControllerSysActionService>();
            _sysUserLogService = DependencyResolver.Current.GetService<ISysUserLogService>();

            //_userInfo = ObjectFactory.GetInstance<IUserInfo>();
            //_sysRoleService = ObjectFactory.GetInstance<ISysRoleService>();
            //_sysControllerSysActionService = ObjectFactory.GetInstance<ISysControllerSysActionService>();
            //_sysUserLogService = ObjectFactory.GetInstance<ISysUserLogService>();
        }

        public IList<string> Areas { private get; set; }

        protected override bool AuthorizeCore(HttpContextBase httpContext)
        {
            var area = (string)httpContext.Request.RequestContext.RouteData.DataTokens["area"];
            var action = (string)httpContext.Request.RequestContext.RouteData.Values["action"];
            var controller = (string)httpContext.Request.RequestContext.RouteData.Values["controller"];

            //是否对该Area区域进行身份验证
            if (Areas.Contains(area))
            {
                //判断是否用户已登录
                if (httpContext.User.Identity.IsAuthenticated)
                {
                    //判断用户是否有该区域访问的权限
                    //如果权限中有该区域的任何一个操作既可以进行访问
                    //默认Index控制下的全部内容仅验证是否登录
                    if (controller == "Elmah" || _sysRoleService.CheckSysUserSysRoleSysControllerSysActions(_userInfo.EnterpriseId, _userInfo.UserId, area, action, controller))
                    {
                        //同步记录用户访问记录
                        var recordId = (string)httpContext.Request.RequestContext.RouteData.Values["id"];
                        var sysControllerSysAction = _sysControllerSysActionService.GetAllEnt().OrderBy(a => a.SysController.SystemId).FirstOrDefault(a => a.SysController.ControllerName.Equals(controller) && a.SysController.SysArea.AreaName.Equals(area) && a.SysAction.ActionName.Equals(action));

                        if (sysControllerSysAction != null && httpContext.Request.Url != null)
                        {
                            var sysuserlog = new SysUserLog
                                {

                                    Url = httpContext.Request.Url.AbsolutePath,
                                    Ip = httpContext.Request.ServerVariables["Remote_Addr"],
                                    SysControllerSysActionId = sysControllerSysAction.Id,
                                    RecordId = recordId,
                                    SysUserId = _userInfo.UserId,
                                    EnterpriseId = _userInfo.EnterpriseId
                                };
                            _sysUserLogService.AddLogAutoSave(sysuserlog);
                        }
                        return true;
                    }
                    if (controller == "Index")
                    {
                        return false;
                    }
                    throw new Exception("没有权限！请联系系统管理员进行权限分配！");
                }
                return false;
            }
            return true;
        }
    }
}