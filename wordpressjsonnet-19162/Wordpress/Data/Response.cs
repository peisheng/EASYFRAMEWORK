
namespace l3v5y.Wordpress.Data
{
    using System.Runtime.Serialization;
    [DataContract]
    public class Response:DataItem
    {
        protected string _status;
        
        [DataMember(Name = "status")]
        public string Status
        {
            get
            {
                return _status;
            }
            set
            {
                if (_status != value)
                {
                    _status = value;
                    NotifyPropertyChanged("Status");
                }
            }
        }

    }
}
