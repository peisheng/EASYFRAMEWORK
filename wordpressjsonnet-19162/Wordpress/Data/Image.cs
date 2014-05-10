namespace l3v5y.Wordpress.Data
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel;
    using System.Runtime.Serialization;
    [DataContract]
    public class Image : DataItem
    {
        private string _url;
        private int _width;
        private int _height;
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

        [DataMember(Name = "width")]
        public int Width
        {
            get
            {
                return _width;
            }
            set
            {
                if (_width != value)
                {
                    _width = value;
                    NotifyPropertyChanged("Width");
                }
            }
        }
        [DataMember(Name = "height")]
        public int Height
        {
            get
            {
                return _height;
            }
            set
            {
                if (_height != value)
                {
                    _height = value;
                    NotifyPropertyChanged("Height");
                }
            }
        }
    }
}
