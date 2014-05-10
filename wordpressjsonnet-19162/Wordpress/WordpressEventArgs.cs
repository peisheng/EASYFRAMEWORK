namespace l3v5y.Wordpress
{
    using System;
    using System.Net;
    public class WordpressEventArgs:EventArgs
    {
        public WordpressEventArgs(WordpressDataType type,HttpStatusCode code, bool success)
        {
            ResponseCode = code;
            DataType = type;
            Success = success;
        }
        public WordpressEventArgs()
        {
            ResponseCode = HttpStatusCode.OK;
            DataType = WordpressDataType.SinglePost;
            Success = true;
        }
        public WordpressDataType DataType;
        public HttpStatusCode ResponseCode = HttpStatusCode.OK;
        public bool Success = false;
    }
    public enum WordpressDataType
    {
        Attachment,
        Author,
        AuthorIndex,
        Category,
        CategoryIndex,
        Comment,
        Controller,
        DateIndex,
        Image,
        Images,
        Info,
        Item,
        ListableItem,
        Nonce,
        Post,
        PostList,
        Response,
        SinglePost,
        Tag,
        TagIndex,
    }
}
