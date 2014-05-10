

namespace l3v5y.Wordpress.Data
{
    using System.Runtime.Serialization;

    [DataContract]
    public class ImageCollection:DataItem
    {
        private Image _full;
        private Image _thumbnail;
        private Image _medium;
        private Image _large;

        [DataMember(Name = "full")]
        public Image Full
        {
            get
            {
                return _full;
            }
            set
            {
                if (_full != value)
                {
                    _full = value;
                    NotifyPropertyChanged("Full");
                }
            }
        }
        [DataMember(Name = "thumbnail")]
        public Image Thumbnail
        {
            get
            {
                return _thumbnail;
            }
            set
            {
                if (_thumbnail != value)
                {
                    _thumbnail = value;
                    NotifyPropertyChanged("Thumbnail");
                }
            }
        }
        [DataMember(Name = "medium")]
        public Image Medium
        {
            get
            {
                return _medium;
            }
            set
            {
                if (_medium != value)
                {
                    _medium = value;
                    NotifyPropertyChanged("Medium");
                }
            }
        }
        [DataMember(Name = "large")]
        public Image Large
        {
            get
            {
                return _large;
            }
            set
            {
                if (_large != value)
                {
                    _large = value;
                    NotifyPropertyChanged("Large");
                }
            }
        }

    }
}
