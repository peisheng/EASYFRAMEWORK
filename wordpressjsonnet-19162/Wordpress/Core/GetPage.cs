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
        public WordpressEventHandler get_page_complete;
        /// <summary>
        /// Gets a page with a given slug
        /// </summary>
        /// <param name="slug">Page slug to find</param>
        /// <param name="children">Search page children as well</param>
        public void get_page(string slug, bool children = false)
        {
            WordpressEventArgs args = new WordpressEventArgs(WordpressDataType.PostList,HttpStatusCode.OK,true);
            string str = url + "?json=get_page&slug=" + slug;
            if (children)
            {
                str += "&children=true";
            }
            Helper.HttpWebRequestDownload((asynchronousResult) =>
            {
                HttpWebRequest request =
                    (HttpWebRequest)asynchronousResult.AsyncState;
                HttpWebResponse response =
                    (HttpWebResponse)request.EndGetResponse(asynchronousResult);
                PostList pl = new PostList();
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
                    List<Category> cats = new List<Category>();
                    cats.Add(new Category() { Slug = slug });
                    pl.Posts = new List<Post>();
                    pl.Posts.Add(new Post() { Title = "Failed to connect", Content = "Check data connection and try again, HttpStatusCode=" + response.StatusCode, Categories = cats });
                }
                Deployment.Current.Dispatcher.BeginInvoke(new Action(() =>
                {
                    try
                    {
                        get_page_complete.Invoke(pl, new WordpressEventArgs());
                    }
                    catch
                    {
                    }
                }));
            }, str);
            

        }
        /// <summary>
        /// Gets a page with a given slug
        /// </summary>
        /// <param name="id">Page id to find</param>
        /// <param name="children">Search page children as well</param>
        public void get_page(int id, bool children = false)
        {
            WordpressEventArgs args = new WordpressEventArgs(WordpressDataType.PostList, HttpStatusCode.OK, true);
            string str = url + "?json=get_page&id=" + id;
            if (children)
            {
                str += "&children=true";
            }
            Helper.HttpWebRequestDownload((asynchronousResult) =>
            {
                HttpWebRequest request =
                    (HttpWebRequest)asynchronousResult.AsyncState;
                HttpWebResponse response =
                    (HttpWebResponse)request.EndGetResponse(asynchronousResult);
                PostList pl = new PostList();
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
                    List<Category> cats = new List<Category>();
                    cats.Add(new Category() { ID = id });
                    pl.Posts = new List<Post>();
                    pl.Posts.Add(new Post() { Title = "Failed to connect", Content = "Check data connection and try again, HttpStatusCode=" + response.StatusCode, Categories = cats });
                }
                Deployment.Current.Dispatcher.BeginInvoke(new Action(() =>
                {
                    try
                    {
                        get_page_complete.Invoke(pl, new WordpressEventArgs());
                    }
                    catch
                    {
                    }
                }));
            }, str);
        }
    }
}
