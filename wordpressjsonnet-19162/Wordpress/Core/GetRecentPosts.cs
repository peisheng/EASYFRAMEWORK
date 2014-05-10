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
        public event WordpressEventHandler get_recent_posts_complete;
        /// <summary>
        /// Gets a list of recent posts
        /// </summary>
        /// <param name="count">(Optional) number of posts to retrieve</param>
        /// <param name="page">(Optional) page to retrieve</param>
        /// <param name="post_type">(Optional) type of posts</param>
        public void get_recent_posts(int count = 0, int page = 0, string post_type = null)
        {
            WordpressEventArgs args = new WordpressEventArgs(WordpressDataType.PostList, HttpStatusCode.OK, true);
            string str = url + "?json=get_recent_posts";
            if (count != 0)
            {
                str += "&count=" + count.ToString();
            }
            if (page != 0)
            {
                str += "&page=" + page.ToString();
            }
            if (!string.IsNullOrEmpty(post_type))
            {
                str += "&post_type=" + post_type;
            }
            Helper.HttpWebRequestDownload((asynchronousResult) =>
            {
                PostList pl = new PostList();
                try
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
                                pl = Helper.Deserialize<PostList>(resultString);
                            }
                        }
                        catch
                        {
                            args.Success = false;
                        }
                    }
                    else
                    {
                        args.Success = false;
                        args.ResponseCode = response.StatusCode;
                        pl.Count = 1;
                        pl.Posts = new List<Post>();
                        pl.Posts.Add(new Post() { Title = "Failed to connect", Content = "Check data connection and try again, HttpStatusCode=" + response.StatusCode });
                    }
                }
                catch { }
                finally
                {

                    Deployment.Current.Dispatcher.BeginInvoke(new Action(() =>
                    {
                        try
                        {
                            get_recent_posts_complete.Invoke(pl, args);
                        }
                        catch
                        {
                        }
                    }));
                }
            }, str);

        }        
    }
}
