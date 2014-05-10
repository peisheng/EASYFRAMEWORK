namespace l3v5y.Wordpress
{
    using System.Runtime.Serialization;
    [DataContract]
    public class Author:DataItem
    {
        #region Fields
        private int _id;
        private string _slug;
        private string _name;
        private string _first_name;
        private string _last_name;
        private string _nickname;
        private string _url;
        private string _description;
        #endregion
        
        /// <summary>
        /// Override ToString to return authors nickname
        /// </summary>
        /// <returns>Authors nickname</returns>
        public override string ToString()
        {
            return _nickname.ToString();
        }
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
        [DataMember(Name = "name")]
        public string Name
        {
            get
            {
                return _name;
            }
            set
            {
                if (_name != value)
                {
                    _name = value;
                    NotifyPropertyChanged("Name");
                }
            }
        }
        [DataMember(Name = "first_name")]
        public string FirstName
        {
            get
            {
                return _first_name;
            }
            set
            {
                if (_first_name != value)
                {
                    _first_name = value;
                    NotifyPropertyChanged("FirstName");
                }
            }
        }
        [DataMember(Name = "last_name")]
        public string LastName
        {
            get
            {
                return _last_name;
            }
            set
            {
                if (_last_name != value)
                {
                    _last_name = value;
                    NotifyPropertyChanged("LastName");
                }
            }
        }
        [DataMember(Name = "nickname")]
        public string NickName
        {
            get
            {
                return _nickname;
            }
            set
            {
                if (_nickname != value)
                {
                    _nickname = value;
                    NotifyPropertyChanged("NickName");
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
        #endregion
    }
}
