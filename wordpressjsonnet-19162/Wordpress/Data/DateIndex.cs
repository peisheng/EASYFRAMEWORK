
namespace l3v5y.Wordpress.Data
{
    using System.Collections.Generic;
    using System.Runtime.Serialization;
    [DataContract]
    public class DateIndex:Response
    {
        private  List<string> _permalinks;
        [DataMember(Name = "permalinks")]
        public List<string> Permalinks
        {
            get
            {
                return _permalinks;
            }
            set
            {
                if (value != _permalinks)
                {
                    _permalinks = value;
                    NotifyPropertyChanged("Permalinks");
                }
            }
        }
        
        // TODO: "tree", Y/M/N sets
    }
    
}
