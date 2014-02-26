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
using System.Windows.Navigation;
using System.Windows.Shapes;
using ReplaceTool.Utils;
using ReplaceTool.Entity;
using Microsoft.Win32;
using System.IO;

using Codeplex.SimpleCSV;
namespace ReplaceTool
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {

            //ReplaceSettings settings = new ReplaceSettings();
            //settings.AllReplaceStrings = new List<string>();
            //settings.Setting = new List<ReplaceGroupSetting>();

            //for (int i = 0; i < 1000; i++)
            //{
            //    ReplaceGroupSetting group = new ReplaceGroupSetting();
            //    group.GroupReplaceItems = new List<ReplaceMapper>();
            //    group.GroupName = "Group Name " + i.ToString();
            //    for (int j = 0; j < 50; j++)
            //    {
            //        group.GroupReplaceItems.Add(new ReplaceMapper() { ReplaceString = "ReplaceString" + j.ToString(), SourceString = "SourceString" + j.ToString() });

            //    }
            //    settings.Setting.Add(group);
            //}
            //XmlUtil<ReplaceSettings>.XmlSerializeToFile(settings, "aa.xml");

            ReplaceSettings setting = XmlUtil<ReplaceSettings>.XmlDeserializeFromFile("aa.xml");


            InitializeComponent();
            lblReulstMsg.Content = "";
           
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            Config config = new Config();
            config.ShowDialog();
        }
        private string csvFilePath = string.Empty;

        private void btnOpen_Click(object sender, RoutedEventArgs e)
        {
            OpenFileDialog open = new OpenFileDialog();
            open.Title = "打开文件";
            open.Filter = "文件（.txt）|*.txt|所有文件|*.*";
            if((bool)open.ShowDialog().GetValueOrDefault())
            {
                string csvFilePath = open.FileName;
                lblReulstMsg.Content = "文件导入成功，请查看导入文件内容";
                SimpleCSVReader reader = new SimpleCSVReader(csvFilePath);
                reader.Splitter='\t';
                reader.ReadHeader();
                Dictionary<string, int> dict = reader.HeaderMap; 
                comBoxList.Items.Clear();
                foreach (var item in dict)
                {
                    int index=(int)item.Value-1;
                    comBoxList.Items.Add(index.ToString()+"--"+item.Key.ToString());
                } 
            } 
        }

        private void btnViewSource_Click(object sender, RoutedEventArgs e)
        {
            ViewSource source = new ViewSource(csvFilePath);
            source.Show();
        }

        private void btnViewResult_Click(object sender, RoutedEventArgs e)
        {
            

        }
    }
}
