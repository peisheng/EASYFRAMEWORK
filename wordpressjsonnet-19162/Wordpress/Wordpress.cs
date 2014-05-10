namespace l3v5y.Wordpress
{
    public delegate void WordpressEventHandler(object data, WordpressEventArgs we);
    public partial class Wordpress
    {       
        private string url = string.Empty;
        public Wordpress(string ApiLocation)
        {
            url = ApiLocation;
            if (!url.EndsWith("/"))
            {
                url += "/";
            }
        }
    }
}
