using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.ComponentModel;
using System.ComponentModel.DataAnnotations;

namespace Models
{
    public class LogOn
    {
        [Required(ErrorMessage ="用户名不能为空")]
        [MinLength(4,ErrorMessage ="用户名不小于4个字符")] 
        [DisplayName("用户名")]
        public string UserName
        {
            get; set;
        }
        [Required(ErrorMessage ="密码不能为空")]
        [MinLength(8,ErrorMessage ="密码不能小于8位")]
        [DisplayName("密码")]
        public string Password
        { get; set; }
        [DisplayName("记住密码")]
        public bool RemebeMe
        {
            get;set;
        }
    }
}
