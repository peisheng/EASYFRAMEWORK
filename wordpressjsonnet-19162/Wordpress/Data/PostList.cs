namespace l3v5y.Wordpress.Data
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel;
    using System.Runtime.Serialization;
    [DataContract]
    public class PostList : ListableItem
    {
        private int _count_total;
        /// <summary>
        /// Total number of posts on blog
        /// </summary>
        [DataMember(Name="count_total")]
        public int TotalCount
        {
            get
            {
                return _count_total;
            }
            set
            {
                if (value != _count_total)
                {
                    _count_total = value;
                    NotifyPropertyChanged("TotalCount");
                }
            }
        }

        private int _pages;
        /// <summary>
        /// Number of pages on blog
        /// </summary>
        [DataMember(Name="pages")]
        public int Pages
        {
            get
            {
                return _pages;
            }
            set
            {
                if (value != _pages)
                {
                    _pages = value;
                    NotifyPropertyChanged("Pages");
                }
            }
        }

        private List<Post> _posts;
        /// <summary>
        /// A list of posts (of size Count)
        /// </summary>
        [DataMember(Name = "posts")]
        public List<Post> Posts
        {
            get
            {
                return _posts;
            }
            set
            {
                if (value != _posts)
                {
                    _posts = value;
                    NotifyPropertyChanged("Posts");
                }
            }
        }

        private Author _author;
        /// <summary>
        /// The post list author (only valud on get_author_posts
        /// </summary>
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
                {
                    _author = value;
                    NotifyPropertyChanged("Author");
                }
            }
        }
    }
}
