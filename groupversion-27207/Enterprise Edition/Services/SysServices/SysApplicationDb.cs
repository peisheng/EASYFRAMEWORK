using System.Data.Common;
using System.Data.Entity;
using Models.SysModels;

namespace Services.SysServices
{
    public abstract class SysApplicationDb : DbContext
    {
        protected SysApplicationDb(string nameOrConnectionString)
            : base(nameOrConnectionString)
        {
        }

        protected SysApplicationDb(DbConnection dbConnection)
            : base(dbConnection, true)
        {
        }

        public DbSet<SysEnterprise> SysEnterprises { get; set; }
        public DbSet<SysDepartment> SysDepartments { get; set; }
        public DbSet<SysDepartmentSysUser> SysDepartmentSysUsers { get; set; }
        public DbSet<SysUser> SysUsers { get; set; }
        public DbSet<SysRole> SysRoles { get; set; }
        public DbSet<SysRoleSysUser> SysRoleSysUsers { get; set; }
        public DbSet<SysUserLog> SysUserLogs { get; set; }
        public DbSet<SysLog> SysLogs { get; set; }
        public DbSet<SysArea> SysAreas { get; set; }
        public DbSet<SysController> SysControllers { get; set; }
        public DbSet<SysControllerSysAction> SysControllerSysActions { get; set; }
        public DbSet<SysAction> SysActions { get; set; }
        public DbSet<SysRoleSysControllerSysAction> SysRoleSysControllerSysActions { get; set; }
        public DbSet<SysUserResetPassword> SysUserResetPasswords { get; set; }
        public DbSet<SysHelp> SysHelps { get; set; }
        public DbSet<SysHelpImage> SysHelpImages { get; set; }
        public DbSet<SysUploadFile> SysUploadFiles { get; set; }
        public DbSet<SysMail> SysMails { get; set; }

        public virtual void Commit()
        {
            base.SaveChanges();
        }
    }
}