namespace l3v5y.Wordpress
{
    using System;
    using System.IO;
    using System.Net;
    using System.Windows;
    using l3v5y.Wordpress.Data;
    public partial class Wordpress
    {
        public event WordpressEventHandler get_tag_index_complete;
        public void get_tag_index()
        {            
            string str = url + "?json=get_tag_index";
            TagIndex tags = new TagIndex();
            WordpressEventArgs args = new WordpressEventArgs(WordpressDataType.TagIndex, HttpStatusCode.OK, true);
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

                            tags = Helper.Deserialize<TagIndex>(resultString);

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
                        get_tag_index_complete.Invoke(tags, args);
                    }
                    catch
                    {
                    }
                }));
            }, str);
        }      
    }
}
