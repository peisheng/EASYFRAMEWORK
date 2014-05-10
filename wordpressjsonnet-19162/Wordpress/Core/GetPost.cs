namespace l3v5y.Wordpress
{
    using System;
    using System.IO;
    using System.Net;
    using System.Windows;
    using l3v5y.Wordpress.Data;
    public partial class Wordpress
    {
        public event WordpressEventHandler get_post_complete;
        /// <summary>
        /// Gets a post based on a slug
        /// </summary>
        /// <param name="slug">The slug to retrieve</param>
        public void get_post(string slug)
        {
            string str = url + "?json=get_post&slug=" + slug;
            WordpressEventArgs args =  new WordpressEventArgs(WordpressDataType.SinglePost,HttpStatusCode.OK,true);
            Helper.HttpWebRequestDownload((asynchronousResult) =>
            {
                HttpWebRequest request =
                    (HttpWebRequest)asynchronousResult.AsyncState;
                HttpWebResponse response =
                    (HttpWebResponse)request.EndGetResponse(asynchronousResult);
                SinglePost post = new SinglePost();
                if (response.StatusCode == HttpStatusCode.OK)
                {
                    try
                    {
                    using (StreamReader streamReader1 =
                        new StreamReader(response.GetResponseStream()))
                    {
                        string resultString = streamReader1.ReadToEnd();
                        post = Helper.Deserialize<SinglePost>(resultString);
                    }

                    }
                    catch
                    {
                        args.Success=false;
                    }
                }
                else
                {
                    args.ResponseCode=response.StatusCode;
                    args.Success=false;
                    post = new SinglePost(){Post = new Post(){ Title = "Failed to connect", Content = "Check data connection and try again, HttpStatusCode=" + response.StatusCode}};
                }
                Deployment.Current.Dispatcher.BeginInvoke(new Action(() =>
                {
                    try
                    {
                        get_post_complete.Invoke(post,args);
                    }
                    catch
                    {
                    }
                }));
            }, str);
        }
        /// <summary>
        /// Gets a post of a given ID
        /// </summary>
        /// <param name="id">The post ID to retrieve</param>
        public void get_post(int id)
        {
            string str = url + "?json=get_post&id=" + id;
            WordpressEventArgs args =  new WordpressEventArgs(WordpressDataType.SinglePost,HttpStatusCode.OK,true);
            Helper.HttpWebRequestDownload((asynchronousResult) =>
            {
                HttpWebRequest request =
                    (HttpWebRequest)asynchronousResult.AsyncState;
                HttpWebResponse response =
                    (HttpWebResponse)request.EndGetResponse(asynchronousResult);
                SinglePost post = new SinglePost();
                if (response.StatusCode == HttpStatusCode.OK)
                {
                    try
                    {
                    using (StreamReader streamReader1 =
                        new StreamReader(response.GetResponseStream()))
                        {
                            string resultString = streamReader1.ReadToEnd();
                            post = Helper.Deserialize<SinglePost>(resultString);
                        }

                    }
                    catch
                    {
                        args.Success=false;
                    }
                }
                else
                {
                    args.ResponseCode=response.StatusCode;
                    args.Success=false;
                    post = new SinglePost(){Post = new Post(){ Title = "Failed to connect", Content = "Check data connection and try again, HttpStatusCode=" + response.StatusCode}};
                }
                Deployment.Current.Dispatcher.BeginInvoke(new Action(() =>
                {
                    try
                    {
                        get_post_complete.Invoke(post,args);
                    }
                    catch
                    {
                    }
                }));
            }, str);
        }

    }
}
