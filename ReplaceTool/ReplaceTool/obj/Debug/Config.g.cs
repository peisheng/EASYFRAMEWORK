﻿#pragma checksum "..\..\Config.xaml" "{406ea660-64cf-4c82-b6f0-42d48172a799}" "4C62BB85AAE57F1AF2CB3EDAC10E4936"
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
        
        
        #line 15 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.ListBox listSourceString;
        
        #line default
        #line hidden
        
        
        #line 20 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBox txtSourceString;
        
        #line default
        #line hidden
        
        
        #line 21 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button addSourceBtn;
        
        #line default
        #line hidden
        
        
        #line 23 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button removeSourceBtn;
        
        #line default
        #line hidden
        
        
        #line 24 "..\..\Config.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Button btnSaveAll;
        
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
            this.listSourceString = ((System.Windows.Controls.ListBox)(target));
            return;
            case 2:
            this.txtSourceString = ((System.Windows.Controls.TextBox)(target));
            return;
            case 3:
            this.addSourceBtn = ((System.Windows.Controls.Button)(target));
            
            #line 21 "..\..\Config.xaml"
            this.addSourceBtn.Click += new System.Windows.RoutedEventHandler(this.addSourceBtn_Click);
            
            #line default
            #line hidden
            return;
            case 4:
            this.removeSourceBtn = ((System.Windows.Controls.Button)(target));
            
            #line 23 "..\..\Config.xaml"
            this.removeSourceBtn.Click += new System.Windows.RoutedEventHandler(this.removeSourceBtn_Click);
            
            #line default
            #line hidden
            return;
            case 5:
            this.btnSaveAll = ((System.Windows.Controls.Button)(target));
            
            #line 24 "..\..\Config.xaml"
            this.btnSaveAll.Click += new System.Windows.RoutedEventHandler(this.btnSaveAll_Click);
            
            #line default
            #line hidden
            return;
            }
            this._contentLoaded = true;
        }
    }
}

