using System;
using System.Linq;
using Common;
using IServices.ISysServices;
using Models.SysModels;
using Services.Infrastructure;

namespace Services.SysServices
{
    public class SysMailService : RepositoryBase<SysMail>, ISysMailService
    {
        public SysMailService(IDatabaseFactory databaseFactory, IUserInfo userInfo)
            : base(databaseFactory, userInfo)
        {
        }


        public int SendMail()
        {
            var i = 0;

            foreach (var item in GetAllEnt().Where(a => !a.Sent))
            {
                try
                {
                    Common.Email.SendEmail(item.To, item.Subject, item.Body);
                    i++;
                    item.Sent = true;
                }
                catch (Exception e)
                {

                }
                
            }

            return i;
        }
    }
}