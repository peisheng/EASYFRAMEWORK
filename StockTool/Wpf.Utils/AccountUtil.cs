using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BMC.Core
{
   public class AccountUtil
    {
       /// <summary>
       /// 账号隐藏方法
       /// </summary>
       /// <param name="accountStr"></param>
       /// <returns></returns>
        public static string AccountStringDeal(string accountStr)
        {
            if (!string.IsNullOrEmpty(accountStr) && accountStr.Length > 6)
            {
                StringBuilder sb = new StringBuilder();
                sb.Append(accountStr.Substring(0, accountStr.Length - 5));
                sb.Append("****");
                sb.Append(accountStr.Substring(accountStr.Length - 1, 1));
                return sb.ToString();
            }
            return accountStr;
        }
       /// <summary>
       /// 户名掩藏方法
       /// </summary>
       /// <param name="humingStr"></param>
       /// <returns></returns>
        public static string NameStringDeal(string humingStr)
        {
            if (!String.IsNullOrEmpty(humingStr))
            {
                if (humingStr.Length >= 1)
                {
                    return "*" + humingStr.Substring(1);
                }
                else
                {
                    return humingStr;
                }
            }
            return humingStr;
        }

        public static string ConvertToUIMoney(string moneyStr)
        { 
            if(!String.IsNullOrEmpty(moneyStr))
            {
                string uiMoney = (Decimal.Parse(moneyStr) / 100).ToString();
                if (uiMoney.Contains('.'))
                {
                    string[] tmp = uiMoney.Split('.');
                    switch (tmp[1].Length)
                    { 
                        case 0:
                            uiMoney += "00";
                            break;
                        case 1:
                            uiMoney += "0";
                            break;
                    }
                }
                else
                {
                    uiMoney += ".00";
                }
                return uiMoney;
            }
            return moneyStr;
        }
    }
}
