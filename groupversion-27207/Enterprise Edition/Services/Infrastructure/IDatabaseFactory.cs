namespace Services.Infrastructure
{
    public interface IDatabaseFactory
    {
        ApplicationCachingDb Get();
    }
}