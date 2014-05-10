
namespace l3v5y.Wordpress
{
    using System;
    using System.IO;
    using System.Net;
    using System.Runtime.Serialization.Json;
    using System.Text;
    using System.Text.RegularExpressions;
    public class Helper
    {
        public static T Deserialize<T>(string jsonString)
        {
            using (MemoryStream ms = new MemoryStream(Encoding.Unicode.GetBytes(jsonString)))
            {
                DataContractJsonSerializer serializer = new DataContractJsonSerializer(typeof(T));
                return (T)serializer.ReadObject(ms);
            }
        }
       
        public static void HttpWebRequestPost(AsyncCallback readCallback, string url)
        {
            try
            {
                HttpWebRequest request =
                    (HttpWebRequest)HttpWebRequest.Create(new Uri(url));
                request.Method = "POST";
                if (request.Headers == null)
                {
                    request.Headers = new WebHeaderCollection();
                }
                request.Headers[HttpRequestHeader.IfModifiedSince] = DateTime.UtcNow.ToString();
                request.BeginGetResponse(new AsyncCallback(readCallback),
                request);
            }
            catch
            {
                
            }
        }
        public static void HttpWebRequestDownload(AsyncCallback readCallback, string url)
        {
            try
            {
                HttpWebRequest request =
                    (HttpWebRequest)HttpWebRequest.Create(new Uri(url));
                if (request.Headers == null)
                {
                    request.Headers = new WebHeaderCollection();
                }
                request.Headers[HttpRequestHeader.IfModifiedSince] = DateTime.UtcNow.ToString();
                request.BeginGetResponse(new AsyncCallback(readCallback),
                request);
            }
            catch
            {
                
            }
        }
        
        public static string RemoveEncoding(string text)
        {
            try
            {
                string temp="";

                temp = Regex.Replace(text.Replace("&ndash;", "-").Replace("&nbsp;", " ").Replace("&rsquo;", "'").Replace("&amp;", "&").Replace("&#038;", "&").Replace("&quot;", "\"").Replace("&#039;", "'").Replace("&#8230;", "...").Replace("&#8212;", "—").Replace("&#8211;", "-").Replace("&#8220;", "“").Replace("&#8221;", "”").Replace("&#8217;", "'").Replace("&#160;", " ").Replace("&gt;", ">").Replace("&rdquo;", "\"").Replace("&ldquo;", "\"").Replace("&lt;", "<").Replace("&#215;", "×").Replace("&#8242;", "′").Replace("&#8243;", "″").Replace("&#8216;", "'"), "<[^<>]+>", "");
                
                return temp;
            }
            catch
            {
                return "";
            }
        }
        public static string HtmlEncode(string toEncode)
        {
            string temp = System.Net.HttpUtility.UrlEncode(toEncode);
            return temp;
        }
    }
}
