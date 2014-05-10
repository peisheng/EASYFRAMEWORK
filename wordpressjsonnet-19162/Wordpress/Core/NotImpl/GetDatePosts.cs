namespace l3v5y.Wordpress
{
    using System;
    using System.IO;
    using System.Net;
    using System.Windows;
    using l3v5y.Wordpress.Data;
    public partial class Wordpress
    {
        public event WordpressEventHandler get_date_posts_complete;
        public void get_date_posts(DateTime date, int count = 0, int page = 0, string post_type = null)
        {
            throw new NotImplementedException();
        }     
    }
}
