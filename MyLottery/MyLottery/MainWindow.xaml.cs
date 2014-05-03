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
using System.IO;
using System.Threading;

namespace MyLottery
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {

            InitializeComponent();
            this.ResizeMode = ResizeMode.NoResize;
        }


        static object obj = new object();
        private void button1_Click(object sender, RoutedEventArgs e)
        {
            lock (obj)
            {
                lastRandom = 0;
                lblResult.Content = string.Empty;
                txtResult.Text = string.Empty;
                string redNumber = txtRed.Text;
                string blueNumber = txtBlue.Text;
                string luckNumber = txtLucky.Text;
                int count = Convert.ToInt16(txtNumber.Text);
                bool isAvgGenerateByBlueCode = this.chkAvg.IsChecked == true;
                if (!isAvgGenerateByBlueCode)
                {
                    for (int i = 0; i < count; i++)
                    {
                        this.txtResult.Text += getGroupOfLottry(redNumber, blueNumber, luckNumber) + @"
";
                    }
                    lblResult.Content = string.Format("生成 {0} 注彩票，共 {1} 元",count,count*2); 
                }
                else
                {
                    int newCount = 0;
                    for (int i = 1; i <= 16; i++)
                    {
                        string[] blueArray = blueNumber.Trim().Split(',');
                        if (blueArray.Contains(i.ToString()))
                            continue;
                        for (int j = 0; j < count; j++)
                        {
                            this.txtResult.Text += getGroupOfLottry(redNumber,blueNumber,luckNumber,i)+ @"
" ;                            
                        }
                        newCount++;
                        
                    }
                    lblResult.Content = string.Format("生成 {0} 注彩票，共 {1} 元", newCount*count, newCount*count*2); 
                }
                if (!Directory.Exists("bak"))
                    Directory.CreateDirectory("bak");

                if (File.Exists("lottory.txt"))
                {
                    File.Move("lottory.txt", string.Format("bak/{0}lottory.txt", DateTime.Now.ToString("yyyy-MM-dd-hhmmss-")));
                }
                File.WriteAllText("lottory.txt", this.txtResult.Text);
                Thread.Sleep(1000);
            }

        }
        private string getGroupOfLottry(string exceptRedNumber, string exceptBlueNumber, string luckyNumber,int blueNumber=0)
        {
            bool isAvgGenerateByBlueCode = this.chkAvg.IsChecked == true;
             
            string[] redEc = exceptRedNumber.Split(',');            
            string[] blueEc = exceptBlueNumber.Split(',');
            string[] luck = null;
            List<int> resultRed = new List<int>();
            List<int> resultBlue = new List<int>();
            if (!string.IsNullOrEmpty(luckyNumber.Trim()))
            {
                luck = luckyNumber.Split(',');
            }

            if (luck != null)
            {
                redEc = redEc.Union(luck.ToArray()).Distinct().ToArray();
                blueEc = blueEc.Union(luck.ToArray()).Distinct().ToArray();
                foreach (string s in luck)
                {
                    int ln = Convert.ToInt16(s);
                    if (ln <= 16)
                    {
                        if (!resultBlue.Contains(ln))
                        {
                            resultBlue.Add(ln);
                        }
                        if (!resultRed.Contains(ln))
                        {
                            resultRed.Add(ln);
                        }
                    }
                    else if (ln > 16 && ln <= 33)
                    {
                        if (!resultRed.Contains(ln))
                        {
                            resultRed.Add(ln);
                        }
                    }
                }
                while (resultRed.Count < 6)
                {
                    redEc = redEc.Union(listIntToStrArray(resultRed)).ToArray();
                    int result = getRandomNumber(1, 34, arrayConvertToInt(redEc));
                    resultRed.Add(result);
                }
                if (resultBlue.Count == 0)
                {
                    blueEc = blueEc.Union(listIntToStrArray(resultBlue)).ToArray();
                    int result = getRandomNumber(1, 16, arrayConvertToInt(blueEc));
                    resultBlue.Add(result);
                }

                resultRed.Sort();
                string blue = string.Join(",", listIntToStrArray(resultBlue));
                string redN = string.Join(",", listIntToStrArray(resultRed));
                redEc = null;
                blueEc = null;
                resultBlue = null;
                resultRed = null;
                return redN + "|" + blue;

            }
            else
            {
                while (resultRed.Count < 6)
                {
                    redEc = redEc.Union(listIntToStrArray(resultRed)).ToArray();
                    int result = getRandomNumber(1, 33, arrayConvertToInt(redEc));
                    resultRed.Add(result);
                }
                if (!isAvgGenerateByBlueCode)
                {
                    if (resultBlue.Count == 0)
                    {
                        blueEc = blueEc.Union(listIntToStrArray(resultBlue)).ToArray();
                        int result = getRandomNumber(1, 16, arrayConvertToInt(blueEc));
                        resultBlue.Add(result);
                    }
                }
                else
                {
                    resultBlue.Clear();
                    resultBlue.Add(blueNumber);
                }
                resultRed.Sort();
                string blue = string.Join(",", listIntToStrArray(resultBlue));
                string redN = string.Join(",", listIntToStrArray(resultRed));
                redEc = null;
                blueEc = null;
                resultBlue = null;
                resultRed = null;
                return redN + "|" + blue;
            }
            Thread.Sleep(20);
            
        }


        List<int> arrayConvertToInt(string[] array)
        {
            List<int> list = new List<int>();
            foreach (string s in array)
            {
                list.Add(Convert.ToInt16(s));
            }
            return list;
        }
        string[] listIntToStrArray(List<int> list)
        {
            string[] str = new string[list.Count];
            for (int i = 0; i < str.Length; i++)
            {
                if (list[i] < 10)
                    str[i] = "0" + list[i].ToString();
                else
                    str[i] = list[i].ToString();
            }
            return str;
        }

        Random random = new Random();
        int lastRandom = 0;
        int getRandomNumber(int min, int max, List<int> excNumber)
        {
            
            int result = random.Next(min, max);
            if (excNumber.Contains(result))
            {
                result = getRandomNumber(min, max, excNumber);
            }
            lastRandom = result;
            return result;
        }
    }
}
