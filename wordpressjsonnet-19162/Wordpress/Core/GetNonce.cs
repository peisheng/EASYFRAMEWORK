namespace l3v5y.Wordpress
{
    using System;
    using System.Collections.Generic;
    using System.IO;
    using System.Net;
    using System.Windows;
    using l3v5y.Wordpress.Data;
    public partial class Wordpress    
    {
        public event WordpressEventHandler get_nonce_complete;
        public void get_nonce(string controller, string method)
        {

            string str = url + "?json=get_nonce&controller=" + controller + "method=" + method;
            NonceItem nonce = new NonceItem();
            WordpressEventArgs args = new WordpressEventArgs(WordpressDataType.Nonce, HttpStatusCode.OK, true);
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

                            nonce = Helper.Deserialize<NonceItem>(resultString);

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
                        get_nonce_complete.Invoke(nonce, args);
                    }
                    catch
                    {
                    }
                }));
            }, str);
           
        }
    }
}
