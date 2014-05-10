namespace l3v5y.Wordpress
{ 
    using System;
    using System.ComponentModel;
    using System.Runtime.Serialization;
    [DataContract]
    public abstract class DataItem :INotifyPropertyChanged
    {        
        // For databinding, this is necessary, putting it in a base class makes it simpler!
        public event PropertyChangedEventHandler PropertyChanged;
        public void NotifyPropertyChanged(String propertyName)
        {
            PropertyChangedEventHandler handler = PropertyChanged;
            if (null != handler)
            {
                handler(this, new PropertyChangedEventArgs(propertyName));
            }
        }
        
    }
    
}
