
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
                    this.listSourceString.Items.Add(sourceString);
                }
            }

        }
    }
}
