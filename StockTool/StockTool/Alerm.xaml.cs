using StockTool.Helper;
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
using Animator;


namespace StockTool
{
    /// <summary>
    /// Interaction logic for Alerm.xaml
    /// </summary>
    public partial class Alerm : Window
    {
        public Alerm()
        {
            InitializeComponent(); 
            //WindHelper.SetWindowStartLocationOnRightButtom(this);
            //PositionAnimation ani = new PositionAnimation(this,1.4.seconds(),100,100);
            //ani.Begin();
        }
    }
}
