
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using ReplaceTool.Utils;
using ReplaceTool.Entity;
using ReplaceTool.Hepler;
using System.Diagnostics;

namespace ReplaceTool
{
    /// <summary>
    /// Interaction logic for Config.xaml
    /// </summary>
    public partial class Config : Window
    {
        public Config()
        {
            InitializeComponent();
        }

        private string tbNamePre = "_sys_tb_replace_";
        private string lblNamePre = "_sys_lbl_replace_";
        private string currentGroupName = string.Empty;
        private void removeSourceBtn_Click(object sender, RoutedEventArgs e)
        {
            int count = this.listSourceString.SelectedItems.Count;
            if (count > 0)
            {
                MessageBoxResult result = MessageBox.Show("是否要删除选中的项吗？", "警告", MessageBoxButton.YesNo);
                if (result == MessageBoxResult.Yes)
                {
                    List<string> removeList = new List<string>();
                    for (int i = 0; i < count; i++)
                    {
                        string s = this.listSourceString.SelectedItems[i].ToString();
                        if (ConfigHelper.ConfigSetting.AllReplaceStrings.Contains(s.ToString()))
                        {
                            ConfigHelper.ConfigSetting.AllReplaceStrings.Remove(s.ToString());
                            //this.listSourceString.Items.Remove(s.ToString());
                            removeList.Add(s.ToString());
                        }
                    }
                    for (int i = 0; i < removeList.Count; i++)
                    {
                        this.listSourceString.Items.Remove(removeList[i].ToString());
                    }
                }
            }
        }

        private void btnSaveAll_Click(object sender, RoutedEventArgs e)
        {
            lock (this)
            {
                this.Dispatcher.BeginInvoke(new Action(() => { ConfigHelper.SaveSetting(ConfigHelper.ConfigSetting); }), null);
            }
        }

        private void addSourceBtn_Click(object sender, RoutedEventArgs e)
        {
            string sourceString = this.txtSourceString.Text.Trim();
            if (!string.IsNullOrEmpty(sourceString))
            {
                if (!ConfigHelper.ConfigSetting.AllReplaceStrings.Contains(sourceString))
                {
                    ConfigHelper.ConfigSetting.AllReplaceStrings.Add(sourceString);
                    this.listSourceString.Items.Add(sourceString);

                }
            }
            this.txtSourceString.Text = "";

        }

        private void TabControl_SelectionChanged_1(object sender, SelectionChangedEventArgs e)
        {
            this.listGroupSetting.Items.Clear();
            foreach (var s in ConfigHelper.ConfigSetting.AllReplaceStrings)
            {
                ListBoxItem item = new ListBoxItem();
                StackPanel panel = new StackPanel();
                panel.Orientation = Orientation.Horizontal;
                panel.HorizontalAlignment = HorizontalAlignment.Center;
                Label lbl = new Label();
                lbl.Content = s;
                lbl.BorderThickness = new Thickness(1);
                lbl.Name = lblNamePre + s;

                TextBlock tb = new TextBlock();
                tb.Text = "   =>   ";

                TextBox tbox = new TextBox();
                tbox.Width = 200;
                tbox.Name = tbNamePre + s;

                panel.Children.Add(lbl);
                panel.Children.Add(tb);
                panel.Children.Add(tbox);
                item.Content = panel;
                this.listGroupSetting.Items.Add(item);
            }
        }

        private void txtSourceString_KeyUp(object sender, KeyEventArgs e)
        {
            var ch = (char)KeyInterop.VirtualKeyFromKey(e.Key);
            if (ch == 13)
            {
                addSourceBtn_Click(null, null);
            }

        }

        private void txtGroupName_KeyDown(object sender, KeyEventArgs e)
        {
            var ch = (char)KeyInterop.VirtualKeyFromKey(e.Key);
            if (ch == 13)
            {
                btnAddGroup_Click(null, null);
            }

        }

        private void btnAddGroup_Click(object sender, RoutedEventArgs e)
        {
            string groupName = this.txtGroupName.Text.Trim();
            if (!string.IsNullOrEmpty(groupName))
            {
                int count = ConfigHelper.ConfigSetting.GroupSettings.Where(p => p.GroupName == groupName).Count();
                if (count == 0)
                {
                    this.listGroup.Items.Add(groupName);
                    ConfigHelper.ConfigSetting.GroupSettings.Add(new ReplaceGroupSetting() { GroupName = groupName, GroupReplaceItems = new List<ReplaceMapper>() });
                }
                //if (!ConfigHelper.ConfigSetting.Setting.Where(p=>p.GroupName==groupName));
                //{
                //    ConfigHelper.ConfigSetting.AllReplaceStrings.Add(sourceString);
                //    this.listSourceString.Items.Add(sourceString);
                //}
            }
            this.txtGroupName.Text = "";
        }

        private void btnRemoveGroup_Click(object sender, RoutedEventArgs e)
        {
            int count = this.listGroup.SelectedItems.Count;
            if (count > 0)
            {
                MessageBoxResult result = MessageBox.Show("是否要删除选中的项吗？", "警告", MessageBoxButton.YesNo);
                if (result == MessageBoxResult.Yes)
                {
                    List<string> removeList = new List<string>();
                    for (int i = 0; i < count; i++)
                    {
                        var item = this.listGroup.SelectedItems[i].ToString();
                        //this.listGroup.Items.Remove(item.ToString());
                        removeList.Add(item.ToString());
                        ReplaceGroupSetting setting = new ReplaceGroupSetting();
                        var obj = ConfigHelper.ConfigSetting.GroupSettings.Where(p => p.GroupName == item.ToString()).FirstOrDefault();
                        if (obj != null)
                            ConfigHelper.ConfigSetting.GroupSettings.Remove(obj);
                    }
                    for (int i = 0; i < removeList.Count; i++)
                    {
                        this.listGroup.Items.Remove(removeList[i]);
                    }
                }
            }
        }

        private void listGroup_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            int count = this.listGroup.SelectedItems.Count;
            if (count == 1)
            {
                string groupName = this.listGroup.SelectedItems[0].ToString();
                currentGroupName = groupName;
                var group = ConfigHelper.ConfigSetting.GroupSettings.Where(p => p.GroupName == groupName).FirstOrDefault();
                if (group != null)
                {
                    foreach (var item in group.GroupReplaceItems)
                    {
                        TextBox tb = this.listGroupSetting.FindName(tbNamePre + item.SourceString) as TextBox;
                        tb.Text = item.ReplaceString;
                    }
                }
            }
        }

        private void btnMapAddAndModifile_Click(object sender, RoutedEventArgs e)
        {
            string source=this.tbSouceInput.Text.Trim();
            string replace = this.tbReplaceInput.Text.Trim();
            if (!ConfigHelper.ConfigSetting.AllReplaceStrings.Contains(source.ToString()))
            {
                MessageBoxResult result = MessageBox.Show(string.Format("配置的源字符列表中不包含{0} 字符串，请检查", source), "", MessageBoxButton.OK);
                if (result == MessageBoxResult.OK)
                {
                    this.tbSouceInput.Text = "";
                    return;
                }
            }
            else
            {
                TextBox tb = this.listGroupSetting.FindName(tbNamePre + source) as TextBox;
                tb.Text = replace;
                ConfigHelper.SetMaping(currentGroupName, source, replace);
            }
        }
    }
}
