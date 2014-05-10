
namespace l3v5y.Wordpress.Data
{
    using System.Collections.Generic;
    using System.Runtime.Serialization;
    [DataContract]
    public class Controller : Response
    {
        private string _name;
        private string _description;
        private List<string> _methods;

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
        [DataMember(Name = "methods")]
        public List<string> Methods
        {
            get
            {
                return _methods;
            }
            set
            {
                if (value != _methods)
                {
                    _methods = value;
                    NotifyPropertyChanged("Methods");
                }
            }
        }
    }
}
