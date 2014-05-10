
namespace l3v5y.Wordpress.Data
{
    using System.Runtime.Serialization;
    [DataContract]
    public class SinglePost : Response
    {
        private Post _post;
        [DataMember(Name = "post")]
        public Post Post
        {
            get
            {
                return _post;
            }
            set
            {
                if (value != _post)
                {
                    _post = value;
                    NotifyPropertyChanged("Post");
                }
            }
        }
    }
}
