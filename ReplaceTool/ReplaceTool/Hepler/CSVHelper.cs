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
        public CSVHelper(string filePath,char spliter)
        { 
            reader=new SimpleCSVReader(filePath); 
            
            reader.Splitter=spliter;
             reader.ReadHeader();
            Header=new List<string>();
            foreach(var item in reader.HeaderMap)
            {
                Header.Add(item.Key.ToString());
            }
            
        }
       SimpleCSVReader reader=null;
       public List<string> Header=null;
       public DataTable CsVTable = null;
       char Splitter = ';';
        public DataTable GetCSVTable()
        {
            DataTable dt=new DataTable();
            foreach (var item in Header)
	            {
                if(!dt.Columns.Contains(item))
                   dt.Columns.Add(item,Type.GetType("System.String"));
	            }
            while(reader.ReadLine())
            {
               DataRow dr=dt.NewRow();
                foreach(var item in Header)
                {
                   dr[item]=reader[item];
                }
                dt.Rows.Add(dr);
            }
            CsVTable = dt;
            return dt;
        }
         
        
    }
}
