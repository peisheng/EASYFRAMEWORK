﻿#pragma checksum "..\..\Config.xaml" "{406ea660-64cf-4c82-b6f0-42d48172a799}" "D80A67ECFDA374C1B23C74E1018489C0"
//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated by a tool.
//     Runtime Version:4.0.30319.18052
//
//     Changes to this file may cause incorrect behavior and will be lost if
//     the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

using System;
using System.Diagnostics;
using System.Windows;
using System.Windows.Automation;
using System.Windows.Controls;
using System.Windows.Controls.Primitives;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Ink;
using System.Windows.Input;
using System.Windows.Markup;
using System.Windows.Media;
using System.Windows.Media.Animation;
using System.Windows.Media.Effects;
using System.Windows.Media.Imaging;
using System.Windows.Media.Media3D;
using System.Windows.Media.TextFormatting;
using System.Windows.Navigation;
using System.Windows.Shapes;


namespace ReplaceTool {
    
    
    /// <summary>
    /// Config
    /// </summary>
    public partial class Config : System.Windows.Window, System.Windows.Markup.IComponentConnector {
        
        
        #line 8 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TabItem tabSource;
        
        #line default
        #line hidden
        
        
        #line 16 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.ListBox listSourceString;
        
        #line default
        #line hidden
        
        
        #line 21 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBox txtSourceString;
        
        #line default
        #line hidden
        
        
        #line 22 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button addSourceBtn;
        
        #line default
        #line hidden
        
        
        #line 24 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button removeSourceBtn;
        
        #line default
        #line hidden
        
        
        #line 25 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btnSaveAll;
        
        #line default
        #line hidden
        
        
        #line 30 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TabItem mapperTab;
        
        #line default
        #line hidden
        
        
        #line 36 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.ListBox listGroup;
        
        #line default
        #line hidden
        
        
        #line 40 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBox txtGroupName;
        
        #line default
        #line hidden
        
        
        #line 41 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btnAddGroup;
        
        #line default
        #line hidden
        
        
        #line 43 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btnRemoveGroup;
        
        #line default
        #line hidden
        
        
        #line 44 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btnSaveAllSetting;
        
        #line default
        #line hidden
        
        
        #line 46 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.ListBox listGroupSetting;
        
        #line default
        #line hidden
        
        private bool _contentLoaded;
        
        /// <summary>
        /// InitializeComponent
        /// </summary>
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "4.0.0.0")]
        public void InitializeComponent() {
            if (_contentLoaded) {
                return;
            }
            _contentLoaded = true;
            System.Uri resourceLocater = new System.Uri("/ReplaceTool;component/config.xaml", System.UriKind.Relative);
            
            #line 1 "..\..\Config.xaml"
            System.Windows.Application.LoadComponent(this, resourceLocater);
            
            #line default
            #line hidden
        }
        
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "4.0.0.0")]
        [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Never)]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Design", "CA1033:InterfaceMethodsShouldBeCallableByChildTypes")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Maintainability", "CA1502:AvoidExcessiveComplexity")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1800:DoNotCastUnnecessarily")]
        void System.Windows.Markup.IComponentConnector.Connect(int connectionId, object target) {
            switch (connectionId)
            {
            case 1:
            
            #line 7 "..\..\Config.xaml"
            ((System.Windows.Controls.TabControl)(target)).SelectionChanged += new System.Windows.Controls.SelectionChangedEventHandler(this.TabControl_SelectionChanged_1);
            
            #line default
            #line hidden
            return;
            case 2:
            this.tabSource = ((System.Windows.Controls.TabItem)(target));
            return;
            case 3:
            this.listSourceString = ((System.Windows.Controls.ListBox)(target));
            return;
            case 4:
            this.txtSourceString = ((System.Windows.Controls.TextBox)(target));
            
            #line 21 "..\..\Config.xaml"
            this.txtSourceString.KeyUp += new System.Windows.Input.KeyEventHandler(this.txtSourceString_KeyUp);
            
            #line default
            #line hidden
            return;
            case 5:
            this.addSourceBtn = ((System.Windows.Controls.Button)(target));
            
            #line 22 "..\..\Config.xaml"
            this.addSourceBtn.Click += new System.Windows.RoutedEventHandler(this.addSourceBtn_Click);
            
            #line default
            #line hidden
            return;
            case 6:
            this.removeSourceBtn = ((System.Windows.Controls.Button)(target));
            
            #line 24 "..\..\Config.xaml"
            this.removeSourceBtn.Click += new System.Windows.RoutedEventHandler(this.removeSourceBtn_Click);
            
            #line default
            #line hidden
            return;
            case 7:
            this.btnSaveAll = ((System.Windows.Controls.Button)(target));
            
            #line 25 "..\..\Config.xaml"
            this.btnSaveAll.Click += new System.Windows.RoutedEventHandler(this.btnSaveAll_Click);
            
            #line default
            #line hidden
            return;
            case 8:
            this.mapperTab = ((System.Windows.Controls.TabItem)(target));
            return;
            case 9:
            this.listGroup = ((System.Windows.Controls.ListBox)(target));
            return;
            case 10:
            this.txtGroupName = ((System.Windows.Controls.TextBox)(target));
            return;
            case 11:
            this.btnAddGroup = ((System.Windows.Controls.Button)(target));
            return;
            case 12:
            this.btnRemoveGroup = ((System.Windows.Controls.Button)(target));
            return;
            case 13:
            this.btnSaveAllSetting = ((System.Windows.Controls.Button)(target));
            
            #line 44 "..\..\Config.xaml"
            this.btnSaveAllSetting.Click += new System.Windows.RoutedEventHandler(this.btnSaveAll_Click);
            
            #line default
            #line hidden
            return;
            case 14:
            this.listGroupSetting = ((System.Windows.Controls.ListBox)(target));
            return;
            }
            this._contentLoaded = true;
        }
    }
}

