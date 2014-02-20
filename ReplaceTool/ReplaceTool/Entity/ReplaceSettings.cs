using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace ReplaceTool.Entity
{
    [Serializable]
    public class ReplaceSettings
    {
        /// <summary>
        /// 配置对应需要替换的字符串组映射
        /// </summary>
      public  List<ReplaceGroupSetting> GroupSettings { get;set;}

        /// <summary>
        /// 所有要替换的字符串信息
        /// </summary>
      public  List<string> AllReplaceStrings { get; set; }
        /// <summary>
        /// 要替换的列名称，一般为文件第一行
        /// </summary>
      public string ColumnHeader { get; set; }
        
    }
}
