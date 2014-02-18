using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace ReplaceTool.Entity
{
    [Serializable]
    public class ReplaceGroupSetting
    {
       
        //GroupName
        public string GroupName { get; set; }
        /// <summary>
        /// Group Replace Items
        /// </summary>
        public List<ReplaceMapper> GroupReplaceItems { get; set; }
        

    }
}
