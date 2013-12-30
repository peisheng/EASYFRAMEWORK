using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace StockTool.Entity
{
    [Serializable]
    public class StockSetttings
    {
        public List<SettingEntity>  SetttingList { get; set; }  
    }
}
