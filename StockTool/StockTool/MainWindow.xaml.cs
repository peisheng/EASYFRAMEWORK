using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.IO;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace StockTool
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
            this.WindowStartupLocation = WindowStartupLocation.CenterScreen;

           
           

            
          //  this.Top=



            //ChinaStock.ChinaStockWebServiceSoap client = new ChinaStock.ChinaStockWebServiceSoapClient("ChinaStockWebServiceSoap"); 
            //    string [] info= client.getStockInfoByCode("sz002500");
                
          //  StringReader sr=File.iop

//            string content = File.ReadAllText("C://test.txt");

//            Regex reg = new Regex("(?<=\").*?(?=\")");
//           var coll=  reg.Matches(content);
//           StringBuilder sb = new StringBuilder();
//           int i = 0;
//            foreach(Match m in coll)
//            {
//                i++;
//                string value = m.Value;

//                string val = string.Format(@"
//exec sp_create_APP_SETTING_FOR_ALL_COMPANIES 'Evatic Mobile', '{0}', '' 
//UPDATE APP_SETTINGS SET SETTING = '' WHERE SETTING_KEY = 'Evatic Mobile' AND SUB_KEY = '{0}' AND (SETTING IS NULL OR SETTING = '' OR SUBSTRING(SETTING,1,1) <> '<')
//
//",value) ;
//                sb.Append(val);

//               // Debug.WriteLine(value);
//            }

//            sb.Append(i.ToString()+"");

//            File.WriteAllText("C://result.txt",sb.ToString());
//          //  Debug.Write(content);


                
           
        }
    }
}
