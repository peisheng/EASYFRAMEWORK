using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;
using System.Xml;
using System.Collections;
using System.Text.RegularExpressions;


namespace BMC.Core
{


    public class TemplateUtil
    {
        
        /// <summary> 
        /// 模板Key表志，含有markPartten的内容
        /// 模板标签,例如：{{txtUserName[[用户名||frm_1]]}}  第一个表单的 txtUserName:TextBox  Label:用户名 
        ///                [[frm_1||请填写用户信息]]    第1个表单【step1】 表单抬头：请填写用户信息
        ///                {{chkSex[[性别||frm_1]]}}         第一个表单的 chkSex:CheckBox  Label:性别   
        ///               注意： frm_从1开始
        ///                
        /// </summary>
        string partten = @"{{(?<key>\w{2,}\[\[\w{1,}\|\|frm_\d{1,}\]\])}}(?<validate>\[\[[\w\|]*\]\])";
        string markPartten = @"\[\[[\w\|]*\]\]";  //@"\[\[(?<key>\w{1,}\|\|frm_\d{1,}\]\]";
        string formPartten = @"\[\[(?<key>frm_\d{1,}\|\|\w{2,})\]\]";
        string keyPartten = @"{{(?<key>\w{2,})}}";

        
        //干净的Key集合，不包含[[]]的内容
        private Hashtable TemplateKeys
        {
            get
            {
                Hashtable keys = new Hashtable();
                if (null != tempDoc)
                {
                    string cleanTemplate = GetClearTemplate();
                    Regex reg = new Regex(keyPartten, RegexOptions.IgnoreCase);                    
                    foreach (Match item in reg.Matches(cleanTemplate))
                    {
                        if (!keys.ContainsKey(item.Groups["key"].Value))
                        {
                            keys.Add(item.Groups["key"].Value, string.Empty);
                        }
                    }
                    return keys;
                }
                else
                {
                    //XTrace.WriteLine("模板文件不存在或者");
                    return null;
                }
            }
        }

        public string GetClearTemplate()
        {
            string template = tempDoc.InnerXml;
            //清除lable，frm标志
            string cleanTemplate = Regex.Replace(template, markPartten, string.Empty, RegexOptions.IgnoreCase);
            return cleanTemplate;
        }



        public List<string> FormKeys
        {
            get
            {
                List<string> list = new List<string>();
                if (null != tempDoc)
                {
                    string template = tempDoc.InnerXml;
                    Regex reg = new Regex(formPartten, RegexOptions.IgnoreCase);
                    foreach (Match item in reg.Matches(template))
                    {
                        list.Add(item.Groups["key"].Value);
                    }
                    return list;
                }
                else
                {
                    //XTrace.WriteLine("模板文件不存在或者");
                    return null;
                }
            }
        }

        public List<KeyValuePair<string,string>> TemplateDirtyKeys 
        {
            get
            {

                List<KeyValuePair<string, string>> list = new List<KeyValuePair<string, string>>();
                if (null != tempDoc)
                {
                    string template = tempDoc.InnerXml;
                    Regex reg = new Regex(partten, RegexOptions.IgnoreCase);
                    foreach (Match item in reg.Matches(template))
                    {
                        string txtDirtyKey = item.Groups["key"].Value;
                        string txtValidate = item.Groups["validate"].Value;
                        KeyValuePair<string, string> obj = new KeyValuePair<string, string>(txtDirtyKey, txtValidate);
                       list.Add(obj);
                    }
                    return list.OrderByDescending(p=>p.Key.ToString()).ToList();
                }
                else
                {
                    //XTrace.WriteLine("模板文件不存在或者");
                    return null;
                }
            }
        }
         

        /// <summary>
        /// 表单字段的值
        /// </summary>
        private Hashtable AssignValues { get; set; }
        private XmlDocument tempDoc = null;


        /// <summary>
        /// 根据AppName来找模板文件
        /// </summary>
        /// <param name="pluginName"></param>
        public TemplateUtil(string pluginName)
        {
            string tempPath = Path.Combine(AppUtil.GetAppDirectory(pluginName), AppUtil.GetApp(pluginName).MessageTemplate);
           
            if (File.Exists(tempPath))
            {
                try
                {
                    tempDoc = new XmlDocument();
                    tempDoc.Load(tempPath);
                }
                catch(Exception ex)
                {
                    Com.Logger.ExceptionLog(string.Empty,ex); 
                }
            }
            else
            {
                Com.Logger.ErrorLog(string.Format("消息模板{0}不存在。",tempPath),pluginName);
                //XTrace.WriteLine("消息模板文件不存在。");
            }
        }

        /// <summary>
        /// 根据模板文件的目录，模板文件名称来找模板
        /// </summary>
        /// <param name="directoryPath"></param>
        /// <param name="templateName"></param>
        public TemplateUtil(string directoryPath,string templateName)
        {
            string tempPath = Path.Combine(directoryPath,templateName);

            if (File.Exists(tempPath))
            {
                try
                {
                    tempDoc = new XmlDocument();
                    tempDoc.Load(tempPath);
                }
                catch(Exception ex) 
                {
                    Com.Logger.ExceptionLog(string.Empty,ex);
                }
            }
            else
            {

                Com.Logger.ErrorLog( string.Format("消息模板{0}不存在。", tempPath));
            }
        }


        /// <summary>
        /// Hashtable fieldname,fieldvalue
        /// </summary>
        /// <param name="templatevalues"></param>
        /// <returns></returns>
        public string GetMessage(Hashtable templatevalues)
        {
            //check the keys count and key are  equal or not
             
               
                foreach (DictionaryEntry de in this.TemplateKeys)
                {
                    if (!templatevalues.ContainsKey(de.Key))
                    {
                        Com.Logger.ErrorLog(string.Format("表单不存在模板关键字{0}", de.Key.ToString()));  
                    }
                }
                
            
            this.AssignValues = templatevalues;
            string template = GetClearTemplate();
            MatchEvaluator me = new MatchEvaluator(replaceMatch);
            sb.Append("模板字段：");
            string templateMsg= Regex.Replace(template, keyPartten, me, RegexOptions.IgnoreCase);
            sb.Append("没有在表单中不存在");
            Com.Logger.SystemLog(sb.ToString());
            return templateMsg;
        }


        StringBuilder sb = new StringBuilder();
        private string replaceMatch(Match m)
        {
            string key = m.Groups["key"].Value;
            if (!AssignValues.ContainsKey(key))
            {
                sb.Append(string.Format("【{0}】", key));
                
            }
            else
            {
                return AssignValues[key].ToString();
            }
            return string.Empty;
        }









    }
}
