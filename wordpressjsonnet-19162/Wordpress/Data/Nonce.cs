
namespace l3v5y.Wordpress.Data
{
    using System.Runtime.Serialization;
    [DataContract]
    public class NonceItem:Response
    {
        private string _controller;
        private string _method;
        private string _nonce;
        [DataMember(Name = "controller")]
        public string Controller
        {
            get
            {
                return _controller;
            }
            set
            {                
                if (_controller != value)
                {
                    _controller = value;
                    NotifyPropertyChanged("Controller");
                }
            }
        }

        [DataMember(Name = "method")]
        public string Method
        {
            get
            {
                return _method;
            }
            set
            {
                if (_method != value)
                {
                    _method = value;
                    NotifyPropertyChanged("Method");
                }
            }
        }
        [DataMember(Name = "nonce")]
        public string Nonce
        {
            get
            {
                return _nonce;
            }
            set
            {
                if (_nonce != value)
                {
                    _nonce = value;
                    NotifyPropertyChanged("Nonce");
                }
            }
        }

    }
}
