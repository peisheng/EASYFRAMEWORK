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
           
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            Config config = new Config();
            config.ShowDialog();
        }
    }
}
