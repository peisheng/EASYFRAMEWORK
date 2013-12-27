using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BMC.Core
{
    public class ResolutionCompute
    {
        public const double DesignWidth = 1380;
        public const double DesignHeight = 775;
        public static double GetRatioX()
        {
            return PlatformUtil.GetResolutionWidth()/ DesignWidth;
        }

        public static double GetRatioY()
        {
            return PlatformUtil.GetResolutionHeight() / DesignHeight;
        }

        public static double GetRatio() {
            return (GetRatioX() < GetRatioY()) ? GetRatioX() : GetRatioY();
        }
    }
}
