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
        public event WordpressEventHandler get_category_posts_complete;
        public void get_category_posts(int id, int count = 0, int page = 0, string post_type = null)
        {
            WordpressEventArgs args = new WordpressEventArgs(WordpressDataType.PostList, HttpStatusCode.OK, true);
            string str = url + "?json=get_category_posts&id=" + id;
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
                        get_category_posts_complete.Invoke(pl, args);
                    }
                    catch
                    {
                    }
                }));
            }, str);
        }
        public void get_category_posts(string slug, int count = 0, int page = 0, string post_type = null)
        {
            WordpressEventArgs args = new WordpressEventArgs(WordpressDataType.PostList, HttpStatusCode.OK, true);
            string str = url + "?json=get_category_posts&slug=" + slug;
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
                        get_category_posts_complete.Invoke(pl, args);
                    }
                    catch
                    {
                    }
                }));
            }, str);
        }
    }
}
