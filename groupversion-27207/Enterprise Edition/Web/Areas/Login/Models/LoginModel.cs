using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;
using LanguagePack;

namespace Web.Areas.Login.Models
{
    public class LoginModel
    {
        [Display(Name = "UserName")]   
        [Required(ErrorMessage="请输入用户名")]
        public string UserName { get; set; }

        [Display(Name = "Password")]   
        [DataType(DataType.Password)]
        [Required(ErrorMessage = "请输入密码")]
        public string Password { get; set; }

        [Display(Name = "Enterprise")]
        [DataType("DropDownList")]
        public Guid EnterpriseId { get; set; }

        [Display(Name = "Remember")]
        public bool Remember { get; set; }
    }
}