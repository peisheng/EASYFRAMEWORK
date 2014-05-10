namespace l3v5y.Wordpress.Data
{
    using System;
    using System.Collections.Generic;
    using System.Runtime.Serialization;
    [DataContract]
    public class Post : Response
    {

        #region Members
        private int _id=0;
        private string _type="";
        private string _slug="";
        private string _url="";
        private string _title="";
        private string _title_plain="";
        private string _content="";
        private string _excerpt="";

        private DateTime _date;
        private DateTime _modified;

        private List<Category> _categories;
        private List<Tag> _tags;

        private Author _author;

        private List<Comment> _comments;
        private List<Attachment> _attachments;

        private int _comment_count;
        private string _comment_status;
        private string _thumbnail;
        private object _custom_fields;
        #endregion

        [DataMember(Name = "id")]
        public int ID
        {
            get
            {
                return _id;
            }
            set
            {
                if (_id != value)
                {
                    _id = value;
                    NotifyPropertyChanged("ID");
                }
            }
        }
        [DataMember(Name = "type")]
        public string Type
        {
            get
            {
                return _type;
            }
            set
            {
                if (_type != value)
                    _type = value;
                NotifyPropertyChanged("Type");
            }
        }
        [DataMember(Name = "slug")]
        public string Slug
        {
            get
            {
                return _slug;
            }
            set
            {
                if (_slug != value)
                    _slug = value;
                NotifyPropertyChanged("Slug");
            }
        }
        [DataMember(Name = "url")]
        public string URL
        {
            get
            {
                return _url;
            }
            set
            {
                if (_url != value)
                    _url = value;
                NotifyPropertyChanged("URL");
            }
        }
        [DataMember(Name = "title")]
        public string Title
        {
            get
            {
                return _title;
            }
            set
            {
                if (_title != value)
                    _title = value;
                NotifyPropertyChanged("Title");
            }
        }
        [DataMember(Name = "title_plain")]
        public string TitlePlain
        {
            get
            {
                return Helper.RemoveEncoding(_title_plain);
            }
            set
            {
                if (_title_plain != value)
                    _title_plain = value;
                NotifyPropertyChanged("TitlePlain");
            }
        }
        [DataMember(Name = "content")]
        public string Content
        {
            get
            {
                return _content;
            }
            set
            {
                if (_content != value)
                {
                    _content = value;
                    NotifyPropertyChanged("Content");
                }
            }
        }
  
        [DataMember(Name = "excerpt")]
        public string Excerpt
        {
            get
            {
                return Helper.RemoveEncoding(_excerpt);
            }
            set
            {
                if (_excerpt != value)
                    _excerpt = value;
                NotifyPropertyChanged("Excerpt");
            }
        }
        [DataMember(Name = "date")]
        public DateTime Date
        {
            get
            {
                return _date;
            }
            set
            {
                if (value != _date)
                {
                    _date = value;
                    NotifyPropertyChanged("Date");

                }
            }
        }
        [DataMember(Name = "modified")]
        public DateTime Modified
        {
            get
            {
                return _modified;
            }
            set
            {
                if (value != _modified)
                {
                    _modified = value;
                    NotifyPropertyChanged("Modified");

                }
            }
        }
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
                    _categories = value;
                    NotifyPropertyChanged("Categories");
                }
            }
        }
        [DataMember(Name = "tags")]
        public List<Tag> Tags
        {
            get
            {
                return _tags;
            }
            set
            {
                if (value != _tags)
                {
                    _tags = value;
                    NotifyPropertyChanged("Tags");
                }
            }
        }
        [DataMember(Name = "author")]
        public Author Author
        {
            get
            {
                return _author;
            }
            set
            {
                if (_author != value)
                    _author = value;
                NotifyPropertyChanged("Author");
            }
        }
        [DataMember(Name = "comments")]
        public List<Comment> Comments
        {
            get
            {
                return _comments;
            }
            set
            {
                if (_comments != value)
                {
                    _comments = value;
                    NotifyPropertyChanged("Comments");
                }
            }
        }
        [DataMember(Name = "attachments")]
        public List<Attachment> Attachments
        {
            get
            {
                return _attachments;
            }
            set
            {
                if (_attachments != value)
                {
                    _attachments = value;
                    NotifyPropertyChanged("Attachments");
                }
            }

        }
        [DataMember(Name = "comment_count")]
        public int CommentCount
        {
            get
            {
                return _comment_count;
            }
            set
            {
                if (_comment_count != value)
                {
                    _comment_count = value;
                    NotifyPropertyChanged("CommentCount");
                }
            }
        }
        [DataMember(Name = "comment_status")]
        public string CommentStatus
        {
            get
            {
                return _comment_status;
            }
            set
            {
                if (value != _comment_status)
                {
                    _comment_status = value;
                    NotifyPropertyChanged("CommentStatus");
                }
            }
        }
        [DataMember(Name = "thumbnail")]
        public string Thumbnail
        {
            get
            {
                if (string.IsNullOrEmpty(_thumbnail))
                {
                    if (Attachments.Count > 0)
                    {
                        return Attachments[0].Images.Full.URL;
                    }
                }
                    return _thumbnail;
                
            }
            set
            {
                if (value != _thumbnail)
                {
                    _thumbnail = value;
                    NotifyPropertyChanged("Thumbnail");
                }
            }
        }
        [DataMember(Name = "custom_fields")]
        public object CustomFields
        {
            get
            {
                return _custom_fields;
            }
            set
            {
                if (value != _custom_fields)
                {
                    _custom_fields = value;
                    NotifyPropertyChanged("CustomField");
                }
            }
        }
    }
}
