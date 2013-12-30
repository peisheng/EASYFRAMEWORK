using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Windows.Media;
using System.Windows;
using System.Diagnostics;


namespace Wpf.Utils 
{
    public static class ControlsHelper
    {

        public static List<Visual> EnumVisual(Visual myVisual, ref List<Visual> EnumVisualList)
        {
            if (EnumVisualList == null) {
                EnumVisualList = new List<Visual>();
            }
            for (int i = 0; i < VisualTreeHelper.GetChildrenCount(myVisual); i++)
            {
                Visual childVisual = (Visual)VisualTreeHelper.GetChild(myVisual, i);
                if (childVisual != null)
                {
                    EnumVisualList.Add(childVisual);
                    EnumVisual(childVisual,ref EnumVisualList);
                    
                }
            }
            return EnumVisualList;
        }

       
        /// <summary>
        /// 获取DependencyObject的所以子元素的扩展
        /// </summary>
        /// <param name="root"></param>
        /// <returns></returns>
        public static IEnumerable<DependencyObject> GetVisuals(this DependencyObject root)
        {
            int count = VisualTreeHelper.GetChildrenCount(root);
            for (int i = 0; i < count; i++)
            {
                var child = VisualTreeHelper.GetChild(root, i);
                yield return child;
                foreach (var descendants in child.GetVisuals())
                {
                    yield return descendants;
                }
            }
        }

        public static IEnumerable<T> GetVisuals<T>(this DependencyObject root) where T:DependencyObject
        {
            int count = VisualTreeHelper.GetChildrenCount(root);
            for (int i = 0; i < count; i++)
            {
                var child = VisualTreeHelper.GetChild(root, i);
                if (child.GetType().ToString()==typeof(T).ToString())
                {
                     
                    yield return (T)child;
                }
                foreach (var descendants in child.GetVisuals<T>())
                {
                    yield return descendants;
                }
            }
        }
    }
}
