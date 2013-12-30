using StockTool.Entity;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace StockTool
{

    public enum KType
    {
        D, // day
        W, //week
        M //month
    }
    public  class StockHelper
    {
        

        //深A+SZ  上证：SH  
        /// <summary>
        /// 获取当前股票的行情 信息
        /// </summary>
        /// <param name="stockCode">股票代码</param>
        /// <returns></returns>
        public static StockInfo GetStockInfo(string _stockCode)
        {
            string stockCode = getStockCode(_stockCode);
            using (ChinaStock.ChinaStockWebServiceSoapClient client = new ChinaStock.ChinaStockWebServiceSoapClient())
            {
                string[] result = client.getStockInfoByCode(stockCode);
                StockInfo info = parserStockInfo(result);
                return info;
            }
        }


        /// <summary>
        /// 
        /// </summary>
        /// <param name="_stockCode">股票代码</param>
        /// <param name="type">K线的周期类型</param>
        /// <returns>返回GIF K线图字节数组</returns>
        public static byte[] GetStockKImage(string _stockCode,KType type)
        {
            string stockCode = getStockCode(_stockCode);
            using(ChinaStock.ChinaStockWebServiceSoapClient client=new ChinaStock.ChinaStockWebServiceSoapClient())
            {
                byte[] bys = client.getStockImage_kByteByCode(stockCode,type.ToString());
                return bys;
            } 
        }

        /// <summary>
        /// 取得股票分时图
        /// </summary>
        /// <param name="_stockCode"></param>
        /// <returns>GIF 分时图</returns>
        public static byte[] GetStockImage(string _stockCode)
        {
            string stockCode = getStockCode(_stockCode);
            using (ChinaStock.ChinaStockWebServiceSoapClient client=new ChinaStock.ChinaStockWebServiceSoapClient())
            {
                return client.getStockImageByteByCode(stockCode); 
            }
        }


        static string getStockCode(string input)
        {
            string _input = input.ToLower();
            if (_input.StartsWith("sh")||_input.StartsWith("sz"))
            {
                return input;
            }            
            if (input == "000001")
            {
                return "SH000001";
            }
            if (input == "399001")
            {
                return "SH399001";
            }
            string result=string.Empty;
            if (input.Trim().StartsWith("00"))
            {
                result = "SZ" + input;
            }
            else
            {
                result = "SH" + input;
            }
            return result;
        }
        static StockInfo parserStockInfo(string[] result)
        {
            
            if(result.Length==25)
            {
                return new StockInfo(){
                    Code=result[0],
                    Name=result[1],
                    MarketTime=Convert.ToDateTime(result[2]),
                    LatestPrice=result[3],
                    LastClosePrice=result[4],
                    TodayOpenPrice=result[5],
                    TodayRangePrice=result[6],
                    TodayLowerPrice=result[7],
                    TodayHighestPrice=result[8],
                    TodayRangeRate=result[9],
                    TradeVol=result[10],
                    TradeMoney=result[11],
                    BuyPrice=result[12],
                    SellPrice=result[13],
                    BuySellRate=result[14],
                    Buy1=result[15],
                    Buy2=result[16],
                    Buy3=result[17],
                    Buy4=result[18],
                    Buy5=result[19],
                    Sell1=result[20],
                    Sell2=result[21],
                    Sell3=result[22],
                    Sell4=result[23],
                    Sell5=result[24]
                };
                
            }
            return null;
        } 
    }
}
