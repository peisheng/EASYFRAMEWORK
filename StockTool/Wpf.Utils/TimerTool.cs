using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows.Threading;

namespace Wpf.Utils
{
    public class TimerTool
    {
        DispatcherTimer timer;
        bool loop = false;
        public TimerTool(TimeSpan ts, Action actoin,bool isLoop=false)
        {
            timer = new DispatcherTimer();
            timer.Interval = ts;
            timer.Tick += new EventHandler(timer_Tick);
            this._Action = actoin;
            loop = isLoop; 
        }

        void timer_Tick(object sender, EventArgs e)
        {
            onRun();
        }
        Action _Action = null;

        private void onRun()
        {
             
            _Action();
            if (!loop)
            {
                if (timer != null)
                {
                    timer.Stop();
                    timer = null;
                }
            }
        }
        public void Run()
        {
            timer.Start();
        }


        /// <summary>
        /// 当isLoop==true 时要调用这个来释放内存
        /// </summary>
        public void ClearTimer()
        {
            try
            {
                timer.Stop();
                timer = null;
            }
            catch { }
        }

    }
}
