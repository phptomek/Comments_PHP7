using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Trening_blog
{
    #region Articles
    public class Articles
    {
        #region Member Variables
        protected int _id;
        protected string _title;
        protected string _content;
        protected string _image;
        #endregion
        #region Constructors
        public Articles() { }
        public Articles(string title, string content, string image)
        {
            this._title=title;
            this._content=content;
            this._image=image;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Title
        {
            get {return _title;}
            set {_title=value;}
        }
        public virtual string Content
        {
            get {return _content;}
            set {_content=value;}
        }
        public virtual string Image
        {
            get {return _image;}
            set {_image=value;}
        }
        #endregion
    }
    #endregion
}