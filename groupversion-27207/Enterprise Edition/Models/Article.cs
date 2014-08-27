//------------------------------------------------------------------------------
// <auto-generated>
//    This code was generated from a template.
//
//    Manual changes to this file may cause unexpected behavior in your application.
//    Manual changes to this file will be overwritten if the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

namespace Models
{
    using System;
    using System.Collections.Generic;
    
    public partial class Article
    {
        public Article()
        {
            this.Article_Website = new HashSet<Article_Website>();
            this.Comment = new HashSet<Comment>();
        }
    
        public int ID { get; set; }
        public string Title { get; set; }
        public string Description { get; set; }
        public string Content { get; set; }
        public bool IsReady { get; set; }
        public int CategoryId { get; set; }
        public string Author { get; set; }
        public System.DateTime PublishedDate { get; set; }
        public string ArticleSource { get; set; }
        public string SourceUrl { get; set; }
        public bool IsImageaAticle { get; set; }
    
        public virtual Category Category { get; set; }
        public virtual ICollection<Article_Website> Article_Website { get; set; }
        public virtual ICollection<Comment> Comment { get; set; }
    }
}
