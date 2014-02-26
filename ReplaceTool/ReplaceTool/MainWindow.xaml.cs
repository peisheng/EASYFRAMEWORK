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
using ReplaceTool.Hepler;
using System.Data;
namespace ReplaceTool
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        { 
            InitializeComponent();
            lblReulstMsg.Content = "";
           
        }
        public static string OutputFolder
        {
            get;
            set;
        }

        private string csvFilePath = string.Empty;

        private string ReplaceColumnName = string.Empty;

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            Config config = new Config();
            config.ShowDialog();
        }
        

        private void btnOpen_Click(object sender, RoutedEventArgs e)
        {
            OpenFileDialog open = new OpenFileDialog();
            open.Title = "打开文件";
            open.Filter = "文件（.txt）|*.txt|所有文件|*.*";
            if((bool)open.ShowDialog().GetValueOrDefault())
            {
                 csvFilePath = open.FileName;
                lblReulstMsg.Content = "文件导入成功，请查看导入文件内容";
                SimpleCSVReader reader = new SimpleCSVReader(csvFilePath);
                reader.Splitter='\t';
                reader.ReadHeader();
                Dictionary<string, int> dict = reader.HeaderMap; 
                comBoxList.Items.Clear();
                foreach (var item in dict)
                {
                    int index=(int)item.Value-1;
                    comBoxList.Items.Add(index.ToString()+"<<-->>"+item.Key.ToString());
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
            if (string.IsNullOrEmpty(OutputFolder))
            {
                MessageBox.Show("请先选择结果输出文件夹");
                return;
            }
            if (string.IsNullOrEmpty(ReplaceColumnName))
            {
                MessageBox.Show("你没有选择要替换的列，请选择");
                return;
            }

            CSVHelper helper = new CSVHelper(csvFilePath,'\t');
          
            
            
            foreach (var item in ConfigHelper.ConfigSetting.GroupSettings)
            {
                DataTable dt = helper.CsVTable.Copy();
                string groupName = item.GroupName;
                for (int i = 0; i<dt.Rows.Count; i++)
                {
                    foreach (var map in item.GroupReplaceItems)
                    {
                        dt.Rows[i][ReplaceColumnName] = dt.Rows[i][ReplaceColumnName].ToString().Replace(map.SourceString,map.ReplaceString);
                    } 
                }
                helper.WriteDataTableToCsVFile(dt, OutputFolder+"\\"+groupName.ToLower()+"_"+csvFilePath.Substring(csvFilePath.LastIndexOf("\\")+1)); 
            }
            //
        }
        
        private void btnSelectFolder_Click(object sender, RoutedEventArgs e)
        {
            System.Windows.Forms.FolderBrowserDialog fbd = new System.Windows.Forms.FolderBrowserDialog();
           var result= fbd.ShowDialog();
           if (fbd.SelectedPath!=string.Empty)
           {
               OutputFolder = fbd.SelectedPath;
           }
        }

       

        private void comBoxList_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            string selectItem = this.comBoxList.SelectedItem.ToString();
            string[] arr = selectItem.Split(new string[1]{"<<-->>"},StringSplitOptions.None);
            ReplaceColumnName = arr[1];

        }
    }
}
