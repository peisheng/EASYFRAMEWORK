
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
using ReplaceTool.Utils;
using ReplaceTool.Entity;
using ReplaceTool.Hepler;
using System.Diagnostics;

namespace ReplaceTool
{
    /// <summary>
    /// Interaction logic for Config.xaml
    /// </summary>
    public partial class Config : Window
    {
        public Config()
        {
            InitializeComponent();
        }

        private void removeSourceBtn_Click(object sender, RoutedEventArgs e)
        {
            if (this.listSourceString.SelectedItems.Count > 0)
            {
                foreach (var s in this.listSourceString.SelectedItems)
                {
                    if (ConfigHelper.ConfigSetting.AllReplaceStrings.Contains(s.ToString()))
                    {
                        ConfigHelper.ConfigSetting.AllReplaceStrings.Remove(s.ToString());
                    }
                }
            }
        }

        private void btnSaveAll_Click(object sender, RoutedEventArgs e)
        {
            lock (this)
            {
                this.Dispatcher.BeginInvoke(new Action(() => { ConfigHelper.SaveSetting(ConfigHelper.ConfigSetting); }), null);
            }
        }

        private void addSourceBtn_Click(object sender, RoutedEventArgs e)
        {
            string sourceString = this.txtSourceString.Text.Trim();
            if (!string.IsNullOrEmpty(sourceString))
            {
                if (!ConfigHelper.ConfigSetting.AllReplaceStrings.Contains(sourceString))
                {
                    ConfigHelper.ConfigSetting.AllReplaceStrings.Add(sourceString);
                    this.listSourceString.Items.Add(sourceString);

                }
            }
            this.txtSourceString.Text = "";

        }

        private void TabControl_SelectionChanged_1(object sender, SelectionChangedEventArgs e)
        {
            this.listGroupSetting.Items.Clear();
           foreach(var s in ConfigHelper.ConfigSetting.AllReplaceStrings)
           {
               ListBoxItem item = new ListBoxItem();
               StackPanel panel = new StackPanel();
               panel.Orientation = Orientation.Horizontal;
               panel.HorizontalAlignment = HorizontalAlignment.Center;
               Label lbl = new Label();
               lbl.Content = s;
               lbl.BorderThickness = new Thickness(1);
               
               TextBlock tb = new TextBlock();
               tb.Text =  "   =>   ";

               TextBox tbox = new TextBox();
               tbox.Width = 200;

               panel.Children.Add(lbl);
               panel.Children.Add(tb);
               panel.Children.Add(tbox);
               item.Content = panel;
               this.listGroupSetting.Items.Add(item);
               
               
                
           }
        }

        private void txtSourceString_KeyUp(object sender, KeyEventArgs e)
        {
            var ch = (char)KeyInterop.VirtualKeyFromKey(e.Key);
            if (ch == 13)
            {
                addSourceBtn_Click(null,null);
            }
            
        }

        private void txtGroupName_KeyDown(object sender, KeyEventArgs e)
        {
            var ch = (char)KeyInterop.VirtualKeyFromKey(e.Key);
            if (ch == 13)
            {
                btnAddGroup_Click(null,null);
            }
             
        }

        private void btnAddGroup_Click(object sender, RoutedEventArgs e)
        {

        }

       

        

        
    }
}
