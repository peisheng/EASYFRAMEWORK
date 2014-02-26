using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Codeplex.SimpleCSV;
using System.Data;
namespace ReplaceTool.Hepler
{
    public class CSVHelper
    {
        public CSVHelper(string filePath, char spliter)
        {
            reader = new SimpleCSVReader(filePath);

            reader.Splitter = spliter;
            reader.ReadHeader();
            Header = new List<string>();
            foreach (var item in reader.HeaderMap)
            {
                Header.Add(item.Key.ToString());
            }

            DataTable dt = new DataTable();
            foreach (var item in Header)
            {
                if (!dt.Columns.Contains(item))
                    dt.Columns.Add(item, Type.GetType("System.String"));
            }
            while (reader.ReadLine())
            {
                DataRow dr = dt.NewRow();
                foreach (var item in Header)
                {
                    dr[item] = reader[item];
                }
                dt.Rows.Add(dr);
            }
            CsVTable = dt;
        }
        SimpleCSVReader reader = null;
        public List<string> Header = null;
        public DataTable CsVTable
        {
            get;
            set;
        }



        public void WriteDataTableToCsVFile(DataTable dt, string fileFullName)
        {
            using (SimpleCSVWriter writer = new SimpleCSVWriter(fileFullName))
            {
                writer.MaxColumns = dt.Columns.Count;
                writer.QuoteAll = false;
                writer.Splitter = '\t';
                List<string> listHeader = new List<string>();
                foreach (DataColumn dc in dt.Columns)
                {
                    listHeader.Add(dc.ColumnName);
                }
                writer.WriteHeader(listHeader.ToArray());
                foreach (DataRow item in dt.Rows)
                {
                    List<string> lineItem = new List<string>();
                    for (int i = 0; i < dt.Columns.Count; i++)
                    {
                        lineItem.Add(item[i].ToString());
                    }
                    writer.WriteLine(lineItem.ToArray());
                }
            }
            
        }


    }
}
