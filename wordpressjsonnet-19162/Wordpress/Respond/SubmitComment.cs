namespace l3v5y.Wordpress
{
    using System;
    using System.IO;
    using System.Net;
    using System.Windows;
    using l3v5y.Wordpress.Data;
    public partial class Wordpress
    {
        public event WordpressEventHandler submit_comment_complete;
        public void submit_comment(int postid, string name, string email, string content, string redirect = null, string redirect_ok = null, string redirect_error = null, string redirect_pending = null)
        {
            string str = url + "?json=submit_comment"
                + "&post_id=" + postid
                + "&name=" + Helper.HtmlEncode(name)
                + "&email=" + Helper.HtmlEncode(email)
                + "&content=" + Helper.HtmlEncode(content);
            /*
            Helper.Upload((sender, e) =>
            {
                Comment comment = new Comment();
                if (!e.Cancelled && e.Error == null)
                {
                    comment = Helper.Deserialize<Comment>(e.Result.ToString());
                }
                try
                {
                    submit_comment_complete.Invoke(comment, new WordpressEventArgs(WordpressDataType.Comment, ((HttpWebResponse)sender)., true));
                }
                catch
                {
                }
            }, str);*/
            WordpressEventArgs args = new WordpressEventArgs();
            Helper.HttpWebRequestDownload((asynchronousResult) =>
            {
                Comment c = new Comment();
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
                                c = Helper.Deserialize<Comment>(resultString);
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
                        }
                }
                catch { }
                finally
                {

                    Deployment.Current.Dispatcher.BeginInvoke(new Action(() =>
                    {
                        try
                        {
                            submit_comment_complete.Invoke(c, args);
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
