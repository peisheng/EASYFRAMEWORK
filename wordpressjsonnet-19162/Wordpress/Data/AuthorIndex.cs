namespace l3v5y.Wordpress.Data
{
    using System.Collections.Generic;
    using System.Runtime.Serialization;
    [DataContract]
    public class AuthorIndex : ListableItem
    {       
        private List<Author> _authors;
        [DataMember(Name = "authors")]
        public List<Author> Authors
        {
            get
            {
                return _authors;
            }
            set
            {
                if (_authors != value)
                {
                    _authors = value;
                    NotifyPropertyChanged("Authors");
                }
            }
        }
    }
}
