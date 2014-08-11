﻿using System;
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
    public class SysUserController : Controller
    {
        private readonly ISysDepartmentService _sysDepartmentService;
        private readonly ISysDepartmentSysUserService _sysDepartmentSysUserService;
        private readonly ISysRoleService _sysRoleService;
        private readonly ISysRoleSysUserService _sysRoleSysUserService;
        private readonly ISysUserService _sysUserService;
        private readonly IUnitOfWork _unitOfWork;

        public SysUserController(IUnitOfWork unitOfWork, ISysDepartmentService sysDepartmentService,
                                 ISysDepartmentSysUserService sysDepartmentSysUserService,
                                 ISysUserService sysUserService, ISysRoleService sysRoleService,
                                 ISysRoleSysUserService sysRoleSysUserService)
        {
            _unitOfWork = unitOfWork;
            _sysDepartmentService = sysDepartmentService;
            _sysDepartmentSysUserService = sysDepartmentSysUserService;
            _sysUserService = sysUserService;
            _sysRoleService = sysRoleService;
            _sysRoleSysUserService = sysRoleSysUserService;
        }

        //
        // GET: /Platform/SysUser/

        public ActionResult Index(int pageIndex = 1)
        {

            var model =
                _sysUserService.GetAll()
                               .Select(
                                   a =>
                                   new { a.UserName, a.DisplayName, a.Email, a.Enabled, a.CreatedDate, a.Remark, a.Id });


            ViewBag.PropertyInfo = model.ElementType.GetProperties();

            model = model.Processing(Request.QueryString);

            if (!string.IsNullOrEmpty(Request["report"]))
            {
                //导出
                return new ReportResult(new Report(model.ToReportSource()));
            }

            return View(model.ToPagedList(pageIndex));
        }

        //
        // GET: /Platform/SysUser/Details/5

        public ActionResult Details(Guid id)
        {
            var item = _sysUserService.GetById(id);
            return View(item);
        }

        public ActionResult Create()
        {
            return RedirectToAction("Edit");
        }

        //
        // GET: /Platform/SysUser/Edit/5

        public ActionResult Edit(Guid? id)
        {
            var item = new SysUser();
            if (id.HasValue)
            {
                item = _sysUserService.GetById(id.Value);
            }

            ViewBag.SysDepartmentsId = new MultiSelectList(_sysDepartmentService.GetAll(), "Id", "DepartmentName", item.SysDepartmentSysUsers.Select(a => a.SysDepartmentId));

            ViewBag.SysRolesId = new MultiSelectList(_sysRoleService.GetAll(), "Id", "RoleName", item.SysRoleSysUsers.Select(a => a.SysRoleId));
            return View(item);
        }

        //
        // POST: /Platform/SysUser/Edit/5

        [HttpPost]
        public ActionResult Edit(Guid? id, SysUser collection)
        {
            if (!ModelState.IsValid)
            {
                Edit(id);
                return View(collection);
            }

            if (id.HasValue)
            {
                //清除原有部门数据
                _sysDepartmentSysUserService.Delete(a => a.SysUserId.Equals(id.Value));
                //清除原有数据
                _sysRoleSysUserService.Delete(a => a.SysUserId.Equals(id.Value));
            }

            _sysUserService.Save(id, collection);

            if (collection.SysDepartmentsId != null)
            {
                foreach (var sysDepartmentId in collection.SysDepartmentsId)
                {
                    _sysDepartmentSysUserService.Save(null, new SysDepartmentSysUser
                    {
                        SysUserId = collection.Id,
                        SysDepartmentId = sysDepartmentId
                    });
                }
            }

            if (collection.SysRolesId != null)
            {
                foreach (var sysRoleId in collection.SysRolesId)
                {
                    _sysRoleSysUserService.Save(null, new SysRoleSysUser
                    {
                        SysUserId = collection.Id,
                        SysRoleId = sysRoleId
                    });
                }
            }

            _unitOfWork.Commit();

            return RedirectToAction("Index");
        }

        //
        // POST: /Platform/SysUser/Delete/5

        [HttpDelete]
        public ActionResult Delete(Guid id)
        {
            _sysUserService.Delete(id);
            _unitOfWork.Commit();
            return RedirectToAction("Index");
        }
    }
}