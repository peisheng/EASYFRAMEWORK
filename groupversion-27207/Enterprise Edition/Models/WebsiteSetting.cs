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
    
    public partial class WebsiteSetting
    {
        public int Id { get; set; }
        public int ParentId { get; set; }
        public string SettingGroupName { get; set; }
        public string SettingKey { get; set; }
        public string SettingValue { get; set; }
        public string Description { get; set; }
        public System.DateTime CreateTime { get; set; }
        public int WebsiteId { get; set; }
    
        public virtual Website Website { get; set; }
    }
}
