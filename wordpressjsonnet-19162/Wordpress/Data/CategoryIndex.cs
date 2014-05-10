namespace l3v5y.Wordpress.Data
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel;

    using System.Runtime.Serialization;
    [DataContract]
    public class CategoryIndex:ListableItem
    {        
        public List<Category> _categories;
        [DataMember(Name = "categories")]
        public List<Category> Categories
        {
            get
            {
                return _categories;
            }
            set
            {
                if (value != _categories)
                {
                    value = _categories;
                    NotifyPropertyChanged("Categories");
                }
            }
        }
    }
}
