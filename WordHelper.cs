using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Web;

namespace ChengLiang_Front.Helpers
{
    public class WordHelper
    {
        private Microsoft.Office.Interop.Word.Application _wordApplication;

        /// <SUMMARY></SUMMARY>    
        /// word 文件对象    
        ///     
        private Microsoft.Office.Interop.Word.Document _wordDocument;

        public void CreateAWord(float hieght)
        {
            //实例化word应用对象    
            this._wordApplication = new Microsoft.Office.Interop.Word.ApplicationClass();
            Object myNothing = System.Reflection.Missing.Value;

            this._wordDocument = this._wordApplication.Documents.Add(ref myNothing, ref myNothing, ref myNothing, ref myNothing);
            _wordDocument.PageSetup.PageWidth = 220;
            _wordDocument.PageSetup.PageHeight = hieght;
            _wordDocument.PageSetup.LeftMargin = 5;
            _wordDocument.PageSetup.RightMargin = 5;
            _wordDocument.PageSetup.TopMargin = 0;
            _wordDocument.PageSetup.BottomMargin = 0;
        }

        /// <SUMMARY></SUMMARY>    
        /// 添加页眉    
        ///     
        /// <PARAM name="pPageHeader" />    
        public void SetPageHeader(string pPageHeader)
        {
            //添加页眉    
            this._wordApplication.ActiveWindow.View.Type = Microsoft.Office.Interop.Word.WdViewType.wdOutlineView;
            this._wordApplication.ActiveWindow.View.SeekView = Microsoft.Office.Interop.Word.WdSeekView.wdSeekPrimaryHeader;
            this._wordApplication.ActiveWindow.ActivePane.Selection.InsertAfter(pPageHeader);
            this._wordApplication.ActiveWindow.ActivePane.Selection.Font.Size = 14;
            this._wordApplication.ActiveWindow.ActivePane.Selection.Font.Bold = 5;
            //设置中间对齐    
            this._wordApplication.Selection.ParagraphFormat.Alignment = Microsoft.Office.Interop.Word.WdParagraphAlignment.wdAlignParagraphCenter;
            //跳出页眉设置    
            this._wordApplication.ActiveWindow.View.SeekView = Microsoft.Office.Interop.Word.WdSeekView.wdSeekMainDocument;
        }

        /// <SUMMARY></SUMMARY>    
        /// 插入文字    
        ///     
        /// <PARAM name="pText" />文本信息    
        /// <PARAM name="pFontSize" />字体打小    
        /// <PARAM name="pFontColor" />字体颜色    
        /// <PARAM name="pFontBold" />字体粗体    
        /// <PARAM name="ptextAlignment" />方向    
        public void InsertText(string pText, int pFontSize, Microsoft.Office.Interop.Word.WdColor pFontColor, int pFontBold, Microsoft.Office.Interop.Word.WdParagraphAlignment ptextAlignment)
        {
            //设置字体样式以及方向    
            this._wordApplication.Application.Selection.Font.Size = pFontSize;
            this._wordApplication.Application.Selection.Font.Bold = pFontBold;
            this._wordApplication.Application.Selection.Font.Color = pFontColor;
            this._wordApplication.Application.Selection.ParagraphFormat.Alignment = ptextAlignment;
            this._wordApplication.Application.Selection.TypeText(pText);
        }

        /// <SUMMARY></SUMMARY>    
        /// 换行    
        ///     
        public void NewLine()
        {
            //换行    
            this._wordApplication.Application.Selection.TypeParagraph();
        }

        /// <SUMMARY></SUMMARY>    
        /// 插入一个图片    
        ///     
        /// <PARAM name="pPictureFileName" />    
        public void InsertPicture(string pPictureFileName)
        {
            object myNothing = System.Reflection.Missing.Value;
            //图片居中显示    
            this._wordApplication.Selection.ParagraphFormat.Alignment = Microsoft.Office.Interop.Word.WdParagraphAlignment.wdAlignParagraphCenter;
            this._wordApplication.Application.Selection.InlineShapes.AddPicture(pPictureFileName, ref myNothing, ref myNothing, ref myNothing);
        }

        /// <SUMMARY></SUMMARY>    
        /// 保存文件     
        ///     
        /// <PARAM name="pFileName" />保存的文件名    
        public void SaveWord(string pFileName)
        {
            object myNothing = System.Reflection.Missing.Value;
            object myFileName = pFileName;
            object myWordFormatDocument = Microsoft.Office.Interop.Word.WdSaveFormat.wdFormatDocument;
            object myLockd = false;
            object myPassword = "";
            object myAddto = true;
            try
            {
                this._wordDocument.SaveAs(ref myFileName, ref myWordFormatDocument, ref myLockd, ref myPassword, ref myAddto, ref myPassword,
                    ref myLockd, ref myLockd, ref myLockd, ref myLockd, ref myNothing, ref myNothing, ref myNothing,
                    ref myNothing, ref myNothing, ref myNothing);
                _wordDocument.Close(ref myNothing, ref myNothing, ref myNothing);
            }
            catch (Exception ex)
            {
                File.WriteAllText("c://error.txt", ex.Message, Encoding.UTF8);
            }
        }
    }
}