using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace StockTool.Entity
{
   public class StockInfo
    {
       public string Code { get; set; }
       public string Name { get; set; }
       public DateTime MarketTime { get; set; }
       public string LatestPrice { get; set; }
       public string LastClosePrice { get; set; }
       public string TodayOpenPrice { get; set; }
       public string TodayRangePrice { get; set; }
       public string TodayLowerPrice { get; set; }
       public string TodayHighestPrice { get; set; }
       public string TodayRangeRate { get; set; }
       public string TradeVol { get; set; }
       public string TradeMoney { get; set; }
       public string BuyPrice { get; set; }
       public string SellPrice { get; set; }
       public string BuySellRate { get;set;}
       public string Buy1 { get; set; }
       public string Buy2 { get; set; }
       public string Buy3 { get; set; }
       public string Buy4 { get; set; }
       public string Buy5 { get; set; }
       public string Sell1 { get; set; }
       public string Sell2 { get; set; }
       public string Sell3 { get; set; }
       public string Sell4 { get; set; }
       public string Sell5 { get; set; }


    }
}
