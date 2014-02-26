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

namespace ReplaceTool
{
    /// <summary>
    /// Interaction logic for ViewResult.xaml
    /// </summary>
    public partial class ViewResult : Window
    {
        public ViewResult()
        {
            InitializeComponent();
        }

        private string FilePath=string.Empty;
        private int ReplaceColumnIndex = 0;
        public ViewResult(string filePath,int replaceColIndex,string GroupName)
        {
            InitializeComponent();
            FilePath = filePath;
            ReplaceColumnIndex = replaceColIndex;
        }
    }
}
