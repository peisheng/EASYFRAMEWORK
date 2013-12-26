using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using NPOI.SS.UserModel;
using NPOI.HSSF.UserModel;
using System.IO;
using NPOI.SS.Util;
using NPOI.HSSF.Util;

namespace 传统数码下单软件
{
    public class ExcelHelper
    {
        public HSSFWorkbook workBook = new HSSFWorkbook();    //相当于创建了一个内存中的Excel 只是还没有写到硬盘上

        /// <summary>
        /// 创建Excel工作薄
        /// </summary>
        public void CreateExcel(bool CellBorder, string FontName, short? FontSize)
        {
            workBook.CreateSheet("sheet1");   //创建Excel工作表
            workBook.CreateSheet("sheet2");   //创建Excel工作表
            workBook.CreateSheet("sheet3");   //创建Excel工作表

            defaultCellstyle = workBook.CreateCellStyle();
            defaultCellstyle.Alignment = HorizontalAlignment.CENTER;             //水平居中
            defaultCellstyle.VerticalAlignment = VerticalAlignment.CENTER;       //垂直居中
            if (CellBorder)
            {
                defaultCellstyle.BorderBottom = BorderStyle.THIN;                    //下边框
                defaultCellstyle.BorderLeft = BorderStyle.THIN;                      //左边框
                defaultCellstyle.BorderRight = BorderStyle.THIN;                     //右边框
                defaultCellstyle.BorderTop = BorderStyle.THIN;                       //上边框
            }
            IFont font = workBook.CreateFont();
            font.FontName = string.IsNullOrEmpty(FontName) ? defaultFontName : FontName;
            font.FontHeight = FontSize == null ? defaultFontSize : FontSize.Value;                                        //默认大小
            defaultCellstyle.SetFont(font);
        }

        /// <summary>
        /// 默认字体大小
        /// </summary>
        public readonly short defaultFontSize = 200;

        public readonly string defaultFontName = "微软雅黑";

        /// <summary>
        /// 单元格默认样式
        /// </summary>
        public ICellStyle defaultCellstyle;

        /// <summary>
        /// 设置行数和列数
        /// </summary>
        /// <param name="Rows">行</param>
        /// <param name="Cells">列</param>
        /// <param name="SetBorder">是否设置边框</param>
        public void SetRowAndCell(int Rows, int Cells)
        {
            HSSFSheet sheet1 = workBook.GetSheet("sheet1") as HSSFSheet;  //获取首个工作薄
            for (int i = 0; i < Rows; i++)
            {
                IRow row = sheet1.CreateRow(i);   //创建第i行
                for (int j = 0; j < Cells; j++)
                {
                    ICell CurrentCell = row.CreateCell(j);   //创建第j行
                    CurrentCell.CellStyle = defaultCellstyle;
                }
            }
        }

        /// <summary>
        /// 设置列宽
        /// </summary>
        /// <param name="Cell"></param>
        /// <param name="Width"></param>
        public void SetColumnWidth(int Cell, int Width)
        {
            HSSFSheet sheet1 = workBook.GetSheet("sheet1") as HSSFSheet;  //获取首个工作薄
            sheet1.SetColumnWidth(Cell, Width * 100);                     //设置列宽
        }

        /// <summary>
        /// 合并单元格
        /// </summary>
        /// <param name="rowFrom">第一个单元格所在的行数</param>
        /// <param name="cellFrom">第一个单元格所在的列数</param>
        /// <param name="rowTo">最后一个单元格所在的行数</param>
        /// <param name="cellTo">最后一个单元格所在的列数</param>
        public void AddMergedRegion(int rowFrom, int cellFrom, int rowTo, int cellTo)
        {
            HSSFSheet sheet1 = workBook.GetSheet("sheet1") as HSSFSheet;  //获取首个工作薄
            sheet1.AddMergedRegion(new Region(rowFrom, cellFrom, rowTo, cellTo));
        }

        /// <summary>
        /// 设置单元格值(文本)
        /// </summary>
        /// <param name="Row">行</param>
        /// <param name="Cell">列</param>
        /// <param name="Value">值</param>
        /// <param name="NewStyle">是否使用新样式</param>
        /// <param name="CellBorder">是否具有边框</param>
        /// <param name="FontSize">字体大小</param>
        /// <param name="FontName">字体名称</param>
        /// <param name="IsNumber">单元格是否为数字</param>
        public void SetCellValue(int Row, int Cell, string Value, bool NewStyle, bool CellBorder, short? FontSize, string FontName)
        {
            HSSFSheet sheet1 = workBook.GetSheet("sheet1") as HSSFSheet;  //获取首个工作薄
            ICell CurrentCell = sheet1.GetRow(Row).GetCell(Cell);
            if (NewStyle)
            {
                ICellStyle celltyle = workBook.CreateCellStyle();
                if (CellBorder)
                {
                    celltyle.BorderBottom = BorderStyle.THIN;                    //下边框
                    celltyle.BorderLeft = BorderStyle.THIN;                      //左边框
                    celltyle.BorderRight = BorderStyle.THIN;                     //右边框
                    celltyle.BorderTop = BorderStyle.THIN;                       //上边框
                }

                celltyle.Alignment = HorizontalAlignment.CENTER;             //水平居中
                celltyle.VerticalAlignment = VerticalAlignment.CENTER;       //垂直居中
                IFont font = workBook.CreateFont();
                font.FontName = string.IsNullOrEmpty(FontName) ? defaultFontName : FontName;   //字体
                font.FontHeight = FontSize == null ? defaultFontSize : FontSize.Value;         //字体大小
                celltyle.SetFont(font);
                CurrentCell.CellStyle = celltyle;
            }
            CurrentCell.SetCellValue(Value);                              //设置值
        }

        /// <summary>
        /// 设置单元格值(数值)
        /// </summary>
        /// <param name="Row">行</param>
        /// <param name="Cell">列</param>
        /// <param name="Value">值</param>
        /// <param name="NewStyle">是否使用新样式</param>
        /// <param name="CellBorder">是否具有边框</param>
        /// <param name="FontSize">字体大小</param>
        /// <param name="FontName">字体名称</param>
        /// <param name="IsNumber">单元格是否为数字</param>
        public void SetCellValue(int Row, int Cell, double Value, bool NewStyle, bool CellBorder, short? FontSize, string FontName)
        {
            HSSFSheet sheet1 = workBook.GetSheet("sheet1") as HSSFSheet;  //获取首个工作薄
            ICell CurrentCell = sheet1.GetRow(Row).GetCell(Cell);
            if (NewStyle)
            {
                ICellStyle celltyle = workBook.CreateCellStyle();
                if (CellBorder)
                {
                    celltyle.BorderBottom = BorderStyle.THIN;                    //下边框
                    celltyle.BorderLeft = BorderStyle.THIN;                      //左边框
                    celltyle.BorderRight = BorderStyle.THIN;                     //右边框
                    celltyle.BorderTop = BorderStyle.THIN;                       //上边框
                }

                celltyle.Alignment = HorizontalAlignment.CENTER;             //水平居中
                celltyle.VerticalAlignment = VerticalAlignment.CENTER;       //垂直居中
                IFont font = workBook.CreateFont();
                font.FontName = string.IsNullOrEmpty(FontName) ? defaultFontName : FontName;   //字体
                font.FontHeight = FontSize == null ? defaultFontSize : FontSize.Value;         //字体大小
                celltyle.SetFont(font);
                CurrentCell.CellStyle = celltyle;
            }
            CurrentCell.SetCellValue(Value);                              //设置值
        }


        /// <summary>
        /// 保存到本地
        /// </summary>
        /// <returns></returns>
        public void SaveToFile(string fileName)
        {
            using (MemoryStream ms = new MemoryStream())
            {
                workBook.Write(ms);
                using (FileStream fs = new FileStream(fileName, FileMode.Create, FileAccess.Write))
                {
                    byte[] data = ms.ToArray();
                    fs.Write(data, 0, data.Length);
                    fs.Flush();
                    data = null;
                }
            }
        }
    }
}