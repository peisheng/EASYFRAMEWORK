namespace l3v5y.Wordpress.Data
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel;
    using System.Runtime.Serialization;
    [DataContract]
    public class Info : Response
    {
        private string _json_api_version;
        private List<string> _controllers;
        [DataMember(Name = "json_api_version")]
        public string JsonApiVersion
        {
            get
            {
                return _json_api_version;
            }
            set
            {
                if (value != _json_api_version)
                {
                    _json_api_version = value;
                    NotifyPropertyChanged("JsonApiVersion");
                }
            }
        }
        [DataMember(Name = "controllers")]
        public List<string> Controllers
        {
            get
            {
                return _controllers;
            }
            set
            {
                if (value != _controllers)
                {
                    _controllers = value;
                    NotifyPropertyChanged("Controllers");
                }
            }
        }
    }
}
