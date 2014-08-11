namespace Services.Infrastructure
{
    public class DatabaseFactory : Disposable, IDatabaseFactory
    {
        private ApplicationCachingDb _dataContext;

        public ApplicationCachingDb Get()
        {
            return _dataContext ?? (_dataContext = new ApplicationCachingDb());
        }

        protected override void DisposeCore()
        {
            if (_dataContext != null)
                _dataContext.Dispose();
        }
    }
}