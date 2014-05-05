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
                using (SimpleCSVReader reader = new SimpleCSVReader(csvFilePath)) {
                    reader.Splitter = '\t';
                    reader.ReadHeader();
                    Dictionary<string, int> dict = reader.HeaderMap;
                    comBoxList.Items.Clear();
                    LogHelper.WriteLog("原文件中的列名：");
                    LogHelper.WriteLog("####################################################################");
                    foreach (var item in dict)
                    {
                        int index = (int)item.Value - 1;
                        comBoxList.Items.Add(index.ToString() + "<<-->>" + item.Key.ToString());
                        LogHelper.WriteLog(item.Key.ToString()); 
                    }
                    LogHelper.WriteLog("####################################################################");
                }
               
            } 
        }

        private void btnViewSource_Click(object sender, RoutedEventArgs e)
        {

            if (string.IsNullOrEmpty(csvFilePath))
            {
                MessageBox.Show("请先选择文件");
                return;
            }
            ViewSource source = new ViewSource(csvFilePath);
            source.Show();

        }
        List<string> OutputList = new List<string>();
        private void btnReplace_Click(object sender, RoutedEventArgs e)
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

            try
            {

                CSVHelper helper = new CSVHelper(csvFilePath, '\t');
                OutputList.Clear();
                this.lblReulstMsg.Content = "正在转换";
                foreach (var item in ConfigHelper.ConfigSetting.GroupSettings)
                {
                    DataTable dt = helper.CsVTable.Copy();
                    string groupName = item.GroupName;
                    LogHelper.WriteLog("####################################################################");
                    LogHelper.WriteLog(string.Format("正在替换组：{0}", groupName));

                    for (int i = 0; i < dt.Rows.Count; i++)
                    {
                        foreach (var map in item.GroupReplaceItems)
                        {
                            try
                            {
                                if (dt.Rows[i][ReplaceColumnName].ToString().Trim()==map.SourceString.Trim())
                                {
                                    LogHelper.WriteLog(string.Format("找到对应的配置：{0}", map.SourceString));
                                    dt.Rows[i][ReplaceColumnName] = dt.Rows[i][ReplaceColumnName].ToString().Replace(map.SourceString, map.ReplaceString);
                                    LogHelper.WriteLog(string.Format("进行替换{0}==>：{1}", map.SourceString, map.ReplaceString));
                                }

                            }
                            catch (Exception ex)
                            {
                                LogHelper.WriteLog("列替换异常：");
                                LogHelper.WriteLog(ex.Message, ex);
                            }
                        }
                    }
                    string path = OutputFolder + "\\" + groupName.ToLower() + "_" + csvFilePath.Substring(csvFilePath.LastIndexOf("\\") + 1);
                    LogHelper.WriteLog(string.Format("输出的转换的文件路径：{0}", path));
                    OutputList.Add(path);
                    helper.WriteDataTableToCsVFile(dt, path);
                    LogHelper.WriteLog("####################################################################");
                }
                this.lblReulstMsg.Content = "转换完成了";
            }
            catch (Exception ex)
            {
                LogHelper.WriteLog(ex.Message, ex);
               
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

        private void btnViewResult_Click(object sender, RoutedEventArgs e)
        {
            if (OutputList.Count > 0)
            {
                foreach (string item in OutputList)
                {
                    ViewSource source = new ViewSource(item);
                    source.Show();

                }

            }

        }
    }
}
