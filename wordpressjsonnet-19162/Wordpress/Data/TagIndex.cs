

namespace l3v5y.Wordpress.Data
{
    using System.Collections.Generic;
    using System.Runtime.Serialization;
    [DataContract]
    public class TagIndex:ListableItem
    {
        private List<Tag> _tags;
        [DataMember(Name = "tags")]
        public List<Tag> Tags
        {
            get
            {
                return _tags;
            }
            set
            {
                if (_tags != value)
                {
                    _tags = value;
                    NotifyPropertyChanged("Tags");
                }
            }
        }
        
    }
}
