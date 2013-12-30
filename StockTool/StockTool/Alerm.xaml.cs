using StockTool.Helper;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using Wpf.Utils;



namespace StockTool
{
    /// <summary>
    /// Interaction logic for Alerm.xaml
    /// </summary>
    public partial class Alerm : Window
    {
        public Alerm()
        {
             
            InitializeComponent();
            
            ////PositionAnimation ani = new PositionAnimation(this,1.4.seconds(),100,100);
            ////ani.Begin();

            //win.WindowStartupLocation = WindowStartupLocation.Manual;
            //win.Top = SystemParameters.PrimaryScreenHeight - win.Height;
            //win.Left = SystemParameters.PrimaryScreenWidth - win.Width; 
            
        }



        public Alerm(Entity.StockInfo stockInfo, string stockCode)
        {
            InitializeComponent();
            WindHelper.SetWindowStartLocationOnRightButtom(this);
            Entity.SettingEntity entity = EntityHelper.GetSetting(stockCode);
            string  winTitle = string.Empty;
            if (entity != null && stockInfo != null)
            {
                txtCostPrice.Text = entity.BuyCostPrice;
                txtBuyVol.Text = entity.BuyVol;
                txtCurrentPrice.Text = stockInfo.LatestPrice;
                decimal latestPrice = Convert.ToDecimal(stockInfo.LatestPrice);
                decimal buyCostPrice = Convert.ToDecimal(entity.BuyCostPrice);
                if (latestPrice > buyCostPrice)
                {
                    winTitle = "赢利";
                }
                else
                {
                    winTitle = "亏损";
                }
                int buyVol = Convert.ToInt32(entity.BuyVol);
                txtMakeMoney.Text = ((latestPrice - buyCostPrice) * buyVol).ToString();
                txtMakeRate.Text = ((latestPrice - buyCostPrice) / buyCostPrice * 100).ToString() + " %";
                txtStockCode.Text = stockInfo.Code;
                txtStockName.Text = stockInfo.Name;
            }
            this.Title = stockInfo.Code + " - " + stockInfo.Name + winTitle + "预警";         
                ;

                TimerTool tool = new TimerTool(30.seconds(), () => {
                    this.Close();                
                });
                tool.Run();
        }

    }
}
