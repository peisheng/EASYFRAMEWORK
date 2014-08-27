using System;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Linq.Expressions;
using Common;
using Models;

namespace Services.Infrastructure
{
    public abstract class RepositoryBase<T> where T : class
    {
        private readonly IDbSet<T> _dbset;
        private ApplicationCachingDb _dataContext;
        private readonly IUserInfo _userInfo;

        protected RepositoryBase(IDatabaseFactory databaseFactory, IUserInfo userInfo)
        {
            DatabaseFactory = databaseFactory;
            _userInfo = userInfo;
            _dbset = DataContext.Set<T>();
        }

        private IDatabaseFactory DatabaseFactory { get; set; }

        private ApplicationCachingDb DataContext
        {
            get { return _dataContext ?? (_dataContext = DatabaseFactory.Get()); }
        }

        /// <summary>
        /// 添加
        /// </summary>
        /// <param name="entity"></param>
        public virtual void Add(T entity)
        {
            _dbset.Add(entity);
        }

        /// <summary>
        /// 更新
        /// </summary>
        /// <param name="entity"></param>
        public virtual void Update(T entity)
        {
            _dbset.Attach(entity);
            _dataContext.Entry(entity).State = EntityState.Modified;
        }

        /// <summary>
        /// 添加或者更新
        /// </summary>
        /// <param name="id"></param>
        /// <param name="entity"></param>
        public virtual void Save(Guid? id, T entity)
        {

            if (entity != null)
            { 

                if (id.HasValue)
                {
                    Update(entity as T);
                }
                else
                {
                    Add(entity as T);
                }
            }
            else
            {
                if (id.HasValue)
                {
                    Update(entity);
                }
                else
                {
                    Add(entity);
                }
            }
        }

        /// <summary>
        /// 标记删除
        /// </summary>
        /// <param name="id"></param>
        public virtual void Delete(Guid id)
        {
            var item = GetById(id);
            Delete(item);
        }

        /// <summary>
        /// 标记删除
        /// </summary>
        /// <param name="item"></param>
        public virtual void Delete(T item)
        {
            //var entity = item as IDbSetBase;
            //if (entity != null && entity.EnterpriseId.Equals(_userInfo.EnterpriseId))
            //    entity.Deleted = true;
            if (item != null)
            {
                _dataContext.Entry(item).State = EntityState.Deleted;
            }

        }

        /// <summary>
        /// 标记删除
        /// </summary>
        /// <param name="where"></param>
        public virtual void Delete(Expression<Func<T, bool>> where)
        {
            foreach (var item in GetAll(where))
            {
                Delete(item);
            }
        }

        /// <summary>
        /// 物理删除
        /// </summary>
        /// <param name="item"></param>
        public virtual void Remove(T item)
        {
            _dbset.Remove(item);
        }

        /// <summary>
        /// 获取单个记录
        /// </summary>
        /// <param name="id"></param>
        /// <returns></returns>
        public virtual T GetById(Guid id)
        {
            return _dbset.Find(id);
        }

       

        /// <summary>
        /// 获取用户所在企业数据
        /// </summary>
        /// <returns></returns>
        public virtual IQueryable<T> GetAll()
        {
            return _dbset.AsQueryable<T>();
        }

    
        /// <summary>
        /// 获取符合条件的用户所在企业数据
        /// </summary>
        /// <param name="where"></param>
        /// <returns></returns>
        public virtual IQueryable<T> GetAll(Expression<Func<T, bool>> where)
        {
            return _dbset.Where(where);
        }

    }
}