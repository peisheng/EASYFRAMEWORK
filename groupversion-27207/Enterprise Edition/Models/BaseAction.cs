//------------------------------------------------------------------------------
// <auto-generated>
//    This code was generated from a template.
//
//    Manual changes to this file may cause unexpected behavior in your application.
//    Manual changes to this file will be overwritten if the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

namespace Models
{
    using System;
    using System.Collections.Generic;
    
    public partial class BaseAction
    {
        public BaseAction()
        {
            this.BaseRoleAction = new HashSet<BaseRoleAction>();
        }
    
        public int Id { get; set; }
        public string ActionName { get; set; }
        public string ActionUrl { get; set; }
        public System.DateTime CreateDate { get; set; }
    
        public virtual ICollection<BaseRoleAction> BaseRoleAction { get; set; }
        public virtual BaseAction BaseAction1 { get; set; }
        public virtual BaseAction BaseAction2 { get; set; }
    }
}
