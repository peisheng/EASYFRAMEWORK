namespace l3v5y.Wordpress
{
    using System;
    using System.IO;
    using System.Net;
    using System.Windows;
    using l3v5y.Wordpress.Data;
    public partial class Wordpress
    {
        public event WordpressEventHandler info_complete;
        /// <summary>
        /// Gets generic info about the state of the JSON plugin
        /// </summary>
        public void info()
        {
            string str = url + "?json=info";
            Info info = new Info();
            WordpressEventArgs args = new WordpressEventArgs(WordpressDataType.Info, HttpStatusCode.OK, true);
            Helper.HttpWebRequestDownload((asynchronousResult) =>
            {
                HttpWebRequest request =
                    (HttpWebRequest)asynchronousResult.AsyncState;
                HttpWebResponse response =
                    (HttpWebResponse)request.EndGetResponse(asynchronousResult);

                if (response.StatusCode == HttpStatusCode.OK)
                {
                    try
                    {
                        using (StreamReader streamReader1 =
                            new StreamReader(response.GetResponseStream()))
                        {
                            string resultString = streamReader1.ReadToEnd();

                            info = Helper.Deserialize<Info>(resultString);

                        }
                    }
                    catch
                    {
                        args.Success = false;
                    }
                }
                else
                {
                    args.ResponseCode = response.StatusCode;
                    args.Success = false;
                }

                Deployment.Current.Dispatcher.BeginInvoke(new Action(() =>
                {
                    try
                    {
                        info_complete.Invoke(info, args);
                    }
                    catch
                    {
                    }
                }));
            }, str);
        }
        /// <summary>
        /// Gets information about a specific controller 
        /// </summary>
        /// <param name="controller">Controller to retrieve information about (Core, Respond or Post)</param>
        public void info(string controller)
        {

            string str = url + "?json=info&controller=" + controller;
            Controller info = new Controller();
            WordpressEventArgs args = new WordpressEventArgs(WordpressDataType.Controller, HttpStatusCode.OK, true);
            Helper.HttpWebRequestDownload((asynchronousResult) =>
            {
                HttpWebRequest request =
                    (HttpWebRequest)asynchronousResult.AsyncState;
                HttpWebResponse response =
                    (HttpWebResponse)request.EndGetResponse(asynchronousResult);

                if (response.StatusCode == HttpStatusCode.OK)
                {
                    try
                    {
                        using (StreamReader streamReader1 =
                            new StreamReader(response.GetResponseStream()))
                        {
                            string resultString = streamReader1.ReadToEnd();

                            info = Helper.Deserialize<Controller>(resultString);

                        }
                    }
                    catch
                    {
                        args.Success = false;
                    }
                }
                else
                {
                    args.ResponseCode = response.StatusCode;
                    args.Success = false;
                }

                Deployment.Current.Dispatcher.BeginInvoke(new Action(() =>
                {
                    try
                    {
                        info_complete.Invoke(info, args);
                    }
                    catch
                    {
                    }
                }));
            }, str);
        }
    }
}
