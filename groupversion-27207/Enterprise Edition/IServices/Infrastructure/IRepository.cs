using System;
using System.Linq;
using System.Linq.Expressions;

namespace IServices
{
    public interface IRepository<T> where T : class
    {
        void Add(T entity);
        void Update(T entity);
        void Save(Guid? id, T entity);
        void Delete(Guid id);
        void Delete(T item);
        void Delete(Expression<Func<T, bool>> where);
        T GetById(Guid id);
        IQueryable<T> GetAllEnt();
        IQueryable<T> GetAllEnt(bool deleted);
        IQueryable<T> GetAll();
        IQueryable<T> GetAll(bool deleted);
        IQueryable<T> GetAll(Expression<Func<T, bool>> where);
    }
}
