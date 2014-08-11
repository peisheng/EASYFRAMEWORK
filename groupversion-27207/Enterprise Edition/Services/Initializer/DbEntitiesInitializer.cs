using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.IO;
using System.Linq;
using Common;
using Models.SysModels;

namespace Services.Initializer
{
    public class DbEntitiesInitializer : CreateDatabaseIfNotExists<ApplicationDb>
    {
        protected override void Seed(ApplicationDb context)
        {
            // 在表创建完成后执行的动作，例如：基础数据

            #region SysEnterprise

            var sysEnterprise = new SysEnterprise {EnterpriseName = "系统初始企业"};
            context.SysEnterprises.Add(sysEnterprise);

            #endregion

            #region SysArea

            var sysAreas = new List<SysArea>
                {
                    new SysArea
                        {
                            EnterpriseId = sysEnterprise.Id,
                            AreaName = "Login",
                            AreaDisplayName = "用户登录",
                            SystemId = "000"
                        },
                    new SysArea
                        {
                            EnterpriseId = sysEnterprise.Id,
                            AreaName = "Platform",
                            AreaDisplayName = "操作平台",
                            SystemId = "001"
                        },
                    new SysArea
                        {
                            EnterpriseId = sysEnterprise.Id,
                            AreaName = "Admin",
                            AreaDisplayName = "管理平台",
                            SystemId = "002"
                        },
                };
            sysAreas.ForEach(a => context.SysAreas.Add(a));

            #endregion

            #region SysAction

            var sysActions = new List<SysAction>
                {
                    new SysAction
                        {
                            EnterpriseId = sysEnterprise.Id,
                            ActionDisplayName = "列表",
                            ActionName = "Index",
                            SystemId = "001"
                        },
                    new SysAction
                        {
                            EnterpriseId = sysEnterprise.Id,
                            ActionDisplayName = "详细",
                            ActionName = "Details",
                            SystemId = "003"
                        },
                    new SysAction
                        {
                            EnterpriseId = sysEnterprise.Id,
                            ActionDisplayName = "新建",
                            ActionName = "Create",
                            SystemId = "004"
                        },
                    new SysAction
                        {
                            EnterpriseId = sysEnterprise.Id,
                            ActionDisplayName = "编辑",
                            ActionName = "Edit",
                            SystemId = "005"
                        },
                    new SysAction
                        {
                            EnterpriseId = sysEnterprise.Id,
                            ActionDisplayName = "删除",
                            ActionName = "Delete",
                            SystemId = "006"
                        }
                };
            sysActions.ForEach(a => context.SysActions.Add(a));

            #endregion

            #region SysController

            var sysControllers = new List<SysController>
                {
                    // Platform
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Platform"),
                            ControllerDisplayName = "操作平台",
                            ControllerName = "Index",
                            SystemId = "100",
                            Display = false,
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "管理平台",
                            ControllerName = "Index",
                            SystemId = "100",
                            Display = false,
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "桌面",
                            ControllerName = "Desktop",
                            SystemId = "100100",
                            Display = false,
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "使用帮助",
                            ControllerName = "Help",
                            SystemId = "100200",
                            Display = false,
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Platform"),
                            ControllerDisplayName = "企业管理",
                            ControllerName = "Index",
                            SystemId = "700",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Platform"),
                            ControllerDisplayName = "组织架构",
                            ControllerName = "SysDepartment",
                            SystemId = "700200",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Platform"),
                            ControllerDisplayName = "用户日志",
                            ControllerName = "SysUserLog",
                            SystemId = "700900",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Platform"),
                            ControllerDisplayName = "角色管理",
                            ControllerName = "SysRole",
                            SystemId = "700300",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Platform"),
                            ControllerDisplayName = "用户管理",
                            ControllerName = "SysUser",
                            SystemId = "700400",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "企业管理",
                            ControllerName = "Index",
                            SystemId = "700",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "企业管理",
                            ControllerName = "SysEnterprise",
                            SystemId = "700200",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "角色管理",
                            ControllerName = "SysRole",
                            SystemId = "700300",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "用户管理",
                            ControllerName = "SysUser",
                            SystemId = "700400",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "系统设置",
                            ControllerName = "Index",
                            SystemId = "800",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "系统参数",
                            ControllerName = "WebConfigAppSetting",
                            SystemId = "800100",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "系统区域",
                            ControllerName = "SysArea",
                            SystemId = "800200",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "操作类型",
                            ControllerName = "SysAction",
                            SystemId = "800300",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "系统模块",
                            ControllerName = "SysController",
                            SystemId = "800400",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "帮助信息",
                            ControllerName = "SysHelp",
                            SystemId = "800900",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "系统信息",
                            ControllerName = "Index",
                            SystemId = "900",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "统计信息",
                            ControllerName = "SysStatistic",
                            SystemId = "900100",
                        },  
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "邮件队列",
                            ControllerName = "SysMail",
                            SystemId = "900200",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "用户日志",
                            ControllerName = "SysUserLog",
                            SystemId = "900300",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "系统日志",
                            ControllerName = "SysLog",
                            SystemId = "900400",
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "错误日志",
                            ControllerName = "Elmah",
                            SystemId = "900500",
                            TargetBlank = true,
                        },
                    new SysController
                        {
                            EnterpriseId = sysEnterprise.Id,
                            SysArea = sysAreas.Single(a => a.AreaName == "Admin"),
                            ControllerDisplayName = "服务器信息",
                            ControllerName = "ServerInfo",
                            SystemId = "900600",
                        },
                };
            sysControllers.ForEach(a => context.SysControllers.Add(a));

            #endregion

            #region SysControllerSysAction

            List<SysControllerSysAction> sysControllerSysActions = (from sysAction in sysActions
                                                                    from sysController in sysControllers
                                                                    select
                                                                        new SysControllerSysAction
                                                                            {
                                                                                EnterpriseId = sysEnterprise.Id,
                                                                                SysAction = sysAction,
                                                                                SysController = sysController
                                                                            }).ToList();

            sysControllerSysActions.ForEach(a => context.SysControllerSysActions.Add(a));

            #endregion

            #region SysRole

            var sysRoles = new List<SysRole>
                {
                    new SysRole {RoleName = "管理员", EnterpriseId = sysEnterprise.Id}
                };
            sysRoles.ForEach(a => context.SysRoles.Add(a));

            #endregion

            #region SysUser

            var sysUsers = new List<SysUser>
                {
                    new SysUser
                        {
                            EnterpriseId = sysEnterprise.Id,
                            UserName = "admin",
                            Email = "Test@test.com",
                            Password = HashPassword.GetHashPassword("admin"),
                            OldPassword = HashPassword.GetHashPassword("admin"),
                            SysRolesId = sysRoles.Select(a => a.Id).ToList()
                        },
                    new SysUser
                        {
                            EnterpriseId = sysEnterprise.Id,
                            UserName = "test",
                            Email = "Test@test.com",
                            Password = HashPassword.GetHashPassword("test"),
                            OldPassword = HashPassword.GetHashPassword("test"),
                            SysRolesId = sysRoles.Select(a => a.Id).ToList()
                        }
                };

            sysUsers.ForEach(a => context.SysUsers.Add(a));

            #endregion

            #region SysRoleSysUser

            List<SysRoleSysUser> sysRoleSysUser =
                (from sysRole in sysRoles
                 from sysUser in sysUsers
                 select new SysRoleSysUser {EnterpriseId = sysEnterprise.Id, SysUser = sysUser, SysRole = sysRole})
                    .ToList();
            sysRoleSysUser.ForEach(a => context.SysRoleSysUsers.Add(a));

            #endregion

            #region SysRoleSysControllerSysAction

            List<SysRoleSysControllerSysAction> sysRoleSysControllerSysAction = (from sysRole in sysRoles
                                                                                 from sysControllerSysAction in
                                                                                     sysControllerSysActions
                                                                                 select
                                                                                     new SysRoleSysControllerSysAction
                                                                                         {
                                                                                             EnterpriseId =
                                                                                                 sysEnterprise.Id,
                                                                                             SysControllerSysAction =
                                                                                                 sysControllerSysAction,
                                                                                             SysRole = sysRole
                                                                                         }).ToList();
            sysRoleSysControllerSysAction.ForEach(a => context.SysRoleSysControllerSysActions.Add(a));

            #endregion

            //运行初始数据脚本
            string path = AppDomain.CurrentDomain.BaseDirectory + "/App_Data/init_script.sql";
            var sqlScriptFileReader = new StreamReader(path);
            string sqlScript = sqlScriptFileReader.ReadToEnd();
            if (!string.IsNullOrEmpty(sqlScript))
            {
                context.Database.ExecuteSqlCommand(sqlScript);
            }
        }
    }
}