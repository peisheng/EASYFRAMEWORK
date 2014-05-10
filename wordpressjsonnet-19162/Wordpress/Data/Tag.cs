
namespace l3v5y.Wordpress.Data
{
    using System.Runtime.Serialization;
    [DataContract]
    public class Tag : DataItem
    {
        private int _id;
        private string _slug;
        private string _title;
        private string _description;        
        private int _post_count;

    [DataMember(Name="id")]
        public int ID
        {
            get
            {
                return _id;
            }
            set
            {
                if (_id != value)
                {
                    _id = value;
                    NotifyPropertyChanged("ID");
                }
            }
        }
        [DataMember(Name="slug")]
        public string Slug
        {
            get
            {
                return _slug;
            }
            set
            {
                if (_slug != value)
                {
                    _slug = value;
                    NotifyPropertyChanged("Slug");
                }
            }
        }
        [DataMember(Name = "title")]
        public string Title
        {
            get
            {
                return _title;
            }
            set
            {
                if (_title != value)
                {
                    _title = value;
                    NotifyPropertyChanged("Title");
                }
            }
        }
        [DataMember(Name = "description")]
        public string Description
        {
            get
            {
                return _description;
            }
            set
            {
                if (_description != value)
                {
                    _description = value;
                    NotifyPropertyChanged("Description");
                }
            }
        }
        [DataMember(Name = "post_count")]
        public int PostCount
        {
            get
            {
                return _post_count;
            }
            set
            {
                if (_post_count != value)
                {
                    _post_count = value;
                    NotifyPropertyChanged("PostCount");
                }
            }
        }
    }
}
