using System;
using System.Timers;
using IServices.ISysServices;
using IServices.Infrastructure;
using Models.SysModels;

namespace Web.Helper
{
    public interface IOnTimedEvent
    {
        void Run(object source, ElapsedEventArgs elapsedEventArgs);
    }

    public class OnTimedEvent : IOnTimedEvent
    {
        private readonly ISysLogService _sysLogService;
        private readonly ISysUserLogService _sysUserLogService;
        private readonly IUnitOfWork _unitOfWork;
        private readonly ITheIndexService _iTheIndexService;
        private ISysMailService _ISysMailService;

        public OnTimedEvent(IUnitOfWork unitOfWork, ISysUserLogService sysUserLogService, ISysLogService sysLogService, ITheIndexService iTheIndexService, ISysMailService iSysMailService)
        {
            _unitOfWork = unitOfWork;
            _sysUserLogService = sysUserLogService;
            _sysLogService = sysLogService;
            _iTheIndexService = iTheIndexService;
            _ISysMailService = iSysMailService;
        }

        public void Run(object source, ElapsedEventArgs elapsedEventArgs)
        {
            try
            {
                _sysUserLogService.DeleteExpiredData();
                _sysLogService.Add(new SysLog { Title = "成功清理过期用户日志。" });
                _unitOfWork.Commit();
            }
            catch (Exception e)
            {
                _sysLogService.Add(new SysLog { Title = e.Message });
                _unitOfWork.Commit();
            }

            try
            {
                _sysLogService.DeleteExpiredData();
                _sysLogService.Add(new SysLog { Title = "成功清理过期系统日志。" });
                _unitOfWork.Commit();
            }
            catch (Exception e)
            {
                _sysLogService.Add(new SysLog { Title = e.Message });
                _unitOfWork.Commit();
            }

            try
            {
                _iTheIndexService.OptimizeIndex();
                _sysLogService.Add(new SysLog { Title = "优化Lucene索引成功。" });
                _unitOfWork.Commit();
            }
            catch (Exception e)
            {
                _sysLogService.Add(new SysLog { Title = e.Message });
                _unitOfWork.Commit();
            }

            try
            {
                var sent = _ISysMailService.SendMail();
                _sysLogService.Add(new SysLog { Title = "邮件发送成功" + sent + "封。" });
                _unitOfWork.Commit();
            }
            catch (Exception e)
            {
                _sysLogService.Add(new SysLog { Title = e.Message });
                _unitOfWork.Commit();
            }
        }
    }
}