
namespace l3v5y.Wordpress.Data
{
    using System.Runtime.Serialization;
    [DataContract]
    public class ListableItem:Response
    {
        private int _count;
        [DataMember(Name = "count")]
        public int Count
        {
            get
            {
                return _count;
            }
            set
            {
                if (_count != value)
                {
                    _count = value;
                    NotifyPropertyChanged("Count");
                }
            }
        }
    }
}
