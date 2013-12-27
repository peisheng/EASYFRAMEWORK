using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace StockTool.Entity
{
    public class SettingEntity
    {
        public string StockCode { get; set; }  //股票代码
        public string BuyCostPrice { get; set; } //买入价格
        public string BuyVol { get; set; } //持仓数量
        public string AlarmLossStopPoint{ get; set; } //止损点数
        public string AlarmMakeStopPoint { get; set; }//止赢点数         
        public bool IsActived { get; set; }  //是否启用预警
    }
}
