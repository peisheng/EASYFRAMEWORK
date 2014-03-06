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
using Codeplex.SimpleCSV;
using ReplaceTool.Hepler;
using System.Data;

namespace ReplaceTool
{
    /// <summary>
    /// Interaction logic for ViewSource.xaml
    /// </summary>
    public partial class ViewSource : Window
    {
        public ViewSource()
        {
            InitializeComponent();
            
        }
        private string FilePath = string.Empty;
        public ViewSource(string filePath)
        {
            InitializeComponent();
            if (string.IsNullOrEmpty(filePath))
            { MessageBox.Show("请先选择文件");
              return;
            }
            this.Title = filePath + "的内容";
            FilePath=filePath;
            CSVHelper helper = new CSVHelper(FilePath,'\t');
            DataTable dt = helper.CsVTable;
             listView.DataContext = dt; 
             sourceGridView.Columns.Clear();

             foreach (var colum in dt.Columns)
             {
                 DataColumn dc = (DataColumn)colum;
                 GridViewColumn column = new GridViewColumn();
                 column.DisplayMemberBinding = new Binding(dc.ColumnName);
                 column.Header = dc.ColumnName;
                 sourceGridView.Columns.Add(column);
             }
             Binding bind = new Binding();
             listView.SetBinding(ListView.ItemsSourceProperty, bind);             
        }
    }
}
