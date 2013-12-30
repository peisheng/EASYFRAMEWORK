using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.IO;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using StockTool.Entity;
using StockTool.Helper;
using Wpf.Utils;

namespace StockTool
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
            //this.WindowStartupLocation = WindowStartupLocation.CenterScreen; 
            //          //  this.Top=



            //            //ChinaStock.ChinaStockWebServiceSoap client = new ChinaStock.ChinaStockWebServiceSoapClient("ChinaStockWebServiceSoap"); 
            //            //    string [] info= client.getStockInfoByCode("sz002500");

            //          //  StringReader sr=File.iop

            ////            string content = File.ReadAllText("C://test.txt");

            ////            Regex reg = new Regex("(?<=\").*?(?=\")");
            ////           var coll=  reg.Matches(content);
            ////           StringBuilder sb = new StringBuilder();
            ////           int i = 0;
            ////            foreach(Match m in coll)
            ////            {
            ////                i++;
            ////                string value = m.Value;

            ////                string val = string.Format(@"
            ////exec sp_create_APP_SETTING_FOR_ALL_COMPANIES 'Evatic Mobile', '{0}', '' 
            ////UPDATE APP_SETTINGS SET SETTING = '' WHERE SETTING_KEY = 'Evatic Mobile' AND SUB_KEY = '{0}' AND (SETTING IS NULL OR SETTING = '' OR SUBSTRING(SETTING,1,1) <> '<')
            ////
            ////",value) ;
            ////                sb.Append(val);

            ////               // Debug.WriteLine(value);
            ////            }

            ////            sb.Append(i.ToString()+"");

            ////            File.WriteAllText("C://result.txt",sb.ToString());
            ////          //  Debug.Write(content);




        }

        private void btnStartWatching_Click(object sender, RoutedEventArgs e)
        {
            TimerTool tool = new TimerTool(20.seconds(), () => {
                StockSetttings settings = EntityHelper.GetSettings();
                var list = settings.SetttingList.Where(p => p.IsActived == true).ToList();
                foreach (var entity in list)
                {
                    string stockCode = entity.StockCode;
                    decimal buyCostPrice = Convert.ToDecimal(entity.BuyCostPrice);
                    decimal alarmLossRate = Convert.ToDecimal(entity.AlarmLossStopPoint);
                    decimal alarmMakeRate = Convert.ToDecimal(entity.AlarmMakeStopPoint);
                    StockInfo info = StockHelper.GetStockInfo(stockCode);
                    
                   
                    if (info != null)
                    {
                        Debug.WriteLine("CODE:"+info.Code);
                        Debug.WriteLine("Name:"+info.Name);
                        Debug.WriteLine("当前价格：" + info.LatestPrice);
                        decimal currentPrice = Convert.ToDecimal(info.LatestPrice);
                        decimal nowRate = (currentPrice - buyCostPrice) / buyCostPrice * 100;
                        if (nowRate > 0 && nowRate >= alarmMakeRate)
                        {
                            Alerm alerm = new Alerm(info, stockCode);
                            alerm.Show();
                        }
                        else if (nowRate < 0 && Math.Abs(nowRate) > alarmLossRate)
                        {
                            Alerm alerm = new Alerm(info, stockCode);
                            alerm.Show();
                        }
                    }
                    else
                    {
                        //记录找不到相应的股票
                    } 
                }
            
            },true);
            tool.Run(); 
        }

        private void Setting_Click(object sender, RoutedEventArgs e)
        {
            Setting setting = new Setting();
            setting.Show();
        }
    }
}
