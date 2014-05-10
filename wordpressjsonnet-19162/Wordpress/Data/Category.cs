

namespace l3v5y.Wordpress.Data
{

    using System;
    using System.Collections.Generic;
    using System.ComponentModel;
    using System.Runtime.Serialization;

    // Only difference between tag and category is "parent" in category
    // Save re-writing it all!
    [DataContract]
    public class Category : Tag
    {
        private int _parent;
        [DataMember(Name="parent")]
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
    }
}
