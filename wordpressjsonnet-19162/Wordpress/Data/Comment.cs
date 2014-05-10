namespace l3v5y.Wordpress
{
    using System;
    using System.Runtime.Serialization;
    [DataContract]
    public class Comment : DataItem
    {       
        private int _id;
        private string _name;
        private string _url;
        private DateTime _date;
        private string _content;
        private int _parent;
        private object _author;

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
        [DataMember(Name = "name")]
        public string Name
        {
            get
            {
                return _name;
            }
            set
            {
                if (value != _name)
                {
                    _name = value;
                    NotifyPropertyChanged("Name");
                }
            }
        }
        [DataMember(Name = "url")]
        public string URL
        {
            get
            {
                return _url;
            }
            set
            {
                if (_url != value)
                {
                    _url = value;
                    NotifyPropertyChanged("URL");
                }
            }
        }
        [DataMember(Name = "date")]
        public DateTime Date
        {
            get
            {
                return _date;
            }
            set
            {
                if (value != _date)
                {
                    _date = value;
                    NotifyPropertyChanged("Date");
                }
            }
        }
        [DataMember(Name = "content")]
        public string Content
        {
            get
            {
                return Helper.RemoveEncoding(_content);
            }
            set
            {
                if (value != _content)
                {
                    _content = value;
                    NotifyPropertyChanged("Content");
                }
            }
        }
        [DataMember(Name = "parent")]
        public int Parent
        {
            get
            {
                return _parent;
            }
            set
            {
                if (_parent != value)
                {
                    _parent = value;
                    NotifyPropertyChanged("Parent");
                }
            }
        }
        [DataMember(Name = "author")]
        public object Author
        {
            get
            {
                return _author;
            }
            set
            {
                if (_author != value)
                {
                    _author = value;
                    NotifyPropertyChanged("Author");
                }
            }
        }        
    }
}
