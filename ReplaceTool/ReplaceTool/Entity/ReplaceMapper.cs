using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace ReplaceTool.Entity
{
    [Serializable]
    public class ReplaceMapper
    {

        /// <summary>
        /// Find String 
        /// It should be from the Settings.AllReplaceStrings
        /// </summary>
        public string SourceString { get; set; }

        /// <summary>
        /// Replace String 
        /// </summary>
        public string ReplaceString { get; set; }
    }
}
