

namespace l3v5y.Wordpress.Data
{
    using System.Runtime.Serialization;
    [DataContract]
    public class Attachment :DataItem
    {
        #region Fields
        private int _id;
        private string _url;
        private string _slug;
        private string _title;
        private string _description;
        private string _caption;
        private int _parent;
        private string _mime_type;
        private ImageCollection _images;
        #endregion
        #region Properties
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
        [DataMember(Name="url")]
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
        [DataMember(Name = "_slug")]
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
        [DataMember(Name = "_title")]
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
        [DataMember(Name = "_description")]
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
        [DataMember(Name = "caption")]
        public string Caption
        {
            get
            {
                return _caption;
            }
            set
            {
                if (_caption != value)
                {
                    _caption = value;
                    NotifyPropertyChanged("Caption");
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
                    NotifyPropertyChanged("ID");
                }
            }
        }
        [DataMember(Name = "mime_type")]
        public string MimeType
        {
            get
            {
                return _mime_type;
            }
            set
            {
                if (_mime_type != value)
                {
                    _mime_type = value;
                    NotifyPropertyChanged("MimeType");
                }
            }
        }
        [DataMember(Name = "images")]
        public ImageCollection Images
        {
            get
            {
                return _images;
            }
            set
            {
                if (_images != value)
                {
                    _images = value;
                    NotifyPropertyChanged("Images");
                }
            }
        }
        #endregion
    }
}
