using StockTool.Entity;
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
    /// Interaction logic for Setting.xaml
    /// </summary>
    public partial class Setting : Window
    {
        public Setting()
        {
            InitializeComponent();
            TimerTool tool = new TimerTool(1.seconds(), () => {
                foreach(var item in  this.GetVisuals<TextBox>())
                {
                    item.Width = 140;
                }

                foreach (var item in this.GetVisuals<Button>())
                {
                    item.Width = 70;
                    item.Height = 30;
                    item.VerticalAlignment = VerticalAlignment.Top;
                }
 
            },false);
            tool.Run();
            bindLtConfig();
            
        }

        void bindLtConfig()
        {
            ltConfig.Items.Clear();
            string[] stockCodes = EntityHelper.GetSettings().SetttingList.Select(p=>p.StockCode).ToArray();
            foreach(string s in stockCodes)
            {
                ltConfig.Items.Add(s);
            }
        }

        private void btnSave_Click(object sender, RoutedEventArgs e)
        {
            Entity.SettingEntity entity = new Entity.SettingEntity();
            entity.IsActived = (bool)this.chkIsActive.IsChecked;
            entity.StockCode = this.txtCode.Text;
            entity.BuyVol = this.txtBuyVol.Text;
            entity.BuyCostPrice = this.txtBuyCostPrice.Text;
            entity.AlarmMakeStopPoint = this.txtAlarmMakeStopPoint.Text;
            entity.AlarmLossStopPoint = this.txtAlarmLossStopPoint.Text;            
            EntityHelper.SaveSetting(entity);
            bindLtConfig();
        }

        private void btnNew_Click(object sender, RoutedEventArgs e)
        {

            foreach (var item in this.GetVisuals<TextBox>())
            {
                item.Text="";
            }
        }

        private void btnDelete_Click(object sender, RoutedEventArgs e)
        {
            string stockCode = this.txtCode.Text.ToLower().Trim();
            EntityHelper.RemoveSetting(stockCode);
            bindLtConfig();
            foreach (var item in this.GetVisuals<TextBox>())
            {
                item.Text = "";
            }
        }

        private void ltConfig_SelectionChanged_1(object sender, SelectionChangedEventArgs e)
        {
            try
            {
                string stockCode = ltConfig.SelectedValue.ToString();
                if (!string.IsNullOrEmpty(stockCode))
                {
                    SettingEntity entity = EntityHelper.GetSetting(stockCode);
                    this.txtAlarmLossStopPoint.Text = entity.AlarmLossStopPoint;
                    this.txtAlarmMakeStopPoint.Text = entity.AlarmMakeStopPoint;
                    this.txtBuyCostPrice.Text = entity.BuyCostPrice;
                    this.txtBuyVol.Text = entity.BuyVol;
                    this.txtCode.Text = entity.StockCode;
                    this.chkIsActive.IsChecked = entity.IsActived;
                }
            }
            catch { }


        }
    }
}
