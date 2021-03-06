USE [master]
GO
/****** Object:  Database [datacenter]    Script Date: 2014/9/1 8:20:17 ******/
CREATE DATABASE [datacenter]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'datacenter', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\datacenter.mdf' , SIZE = 4160KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'datacenter_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\datacenter_log.ldf' , SIZE = 1040KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [datacenter] SET COMPATIBILITY_LEVEL = 110
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [datacenter].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [datacenter] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [datacenter] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [datacenter] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [datacenter] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [datacenter] SET ARITHABORT OFF 
GO
ALTER DATABASE [datacenter] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [datacenter] SET AUTO_CREATE_STATISTICS ON 
GO
ALTER DATABASE [datacenter] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [datacenter] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [datacenter] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [datacenter] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [datacenter] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [datacenter] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [datacenter] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [datacenter] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [datacenter] SET  ENABLE_BROKER 
GO
ALTER DATABASE [datacenter] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [datacenter] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [datacenter] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [datacenter] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [datacenter] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [datacenter] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [datacenter] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [datacenter] SET RECOVERY FULL 
GO
ALTER DATABASE [datacenter] SET  MULTI_USER 
GO
ALTER DATABASE [datacenter] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [datacenter] SET DB_CHAINING OFF 
GO
ALTER DATABASE [datacenter] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [datacenter] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
EXEC sys.sp_db_vardecimal_storage_format N'datacenter', N'ON'
GO
USE [datacenter]
GO
/****** Object:  Table [dbo].[Advertisement]    Script Date: 2014/9/1 8:20:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Advertisement](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[AdName] [nvarchar](100) NOT NULL,
	[Code] [text] NOT NULL,
	[Width] [int] NOT NULL,
	[Height] [int] NOT NULL,
	[AdType] [int] NOT NULL,
	[BeginDate] [datetime] NOT NULL,
	[EndDate] [datetime] NOT NULL,
	[WebsiteId] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Article]    Script Date: 2014/9/1 8:20:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Article](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[Title] [nvarchar](100) NOT NULL,
	[Description] [nvarchar](800) NOT NULL,
	[Content] [text] NOT NULL,
	[IsReady] [bit] NOT NULL,
	[CategoryId] [int] NOT NULL,
	[Author] [nvarchar](20) NOT NULL,
	[PublishedDate] [datetime] NOT NULL,
	[ArticleSource] [nvarchar](200) NOT NULL,
	[SourceUrl] [nvarchar](200) NOT NULL,
	[IsImageaAticle] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Article_Website]    Script Date: 2014/9/1 8:20:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Article_Website](
	[ID] [int] IDENTITY(1,1) NOT NULL,
	[ArticleId] [int] NOT NULL,
	[WebsiteId] [int] NOT NULL,
	[IsPublished] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[BaseAction]    Script Date: 2014/9/1 8:20:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[BaseAction](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[ActionName] [nvarchar](50) NOT NULL,
	[ActionUrl] [nvarchar](200) NOT NULL,
	[CreateDate] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[BaseRole]    Script Date: 2014/9/1 8:20:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[BaseRole](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[RoleName] [nvarchar](50) NOT NULL,
	[RoleValue] [int] NOT NULL,
	[CreateDate] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[BaseRoleAction]    Script Date: 2014/9/1 8:20:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[BaseRoleAction](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[ActionId] [int] NOT NULL,
	[RoleId] [int] NOT NULL,
	[CreateDate] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[BaseUser]    Script Date: 2014/9/1 8:20:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[BaseUser](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[UserName] [nvarchar](50) NOT NULL,
	[Password] [nvarchar](50) NOT NULL,
	[Email] [nvarchar](50) NOT NULL,
	[Mobile] [nvarchar](20) NOT NULL,
	[LastLoginTime] [datetime] NOT NULL,
	[CreateDate] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[BaseUserRole]    Script Date: 2014/9/1 8:20:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[BaseUserRole](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[UserId] [int] NOT NULL,
	[RoleId] [int] NOT NULL,
	[CreateDate] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Category]    Script Date: 2014/9/1 8:20:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Category](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[CateName] [nvarchar](30) NOT NULL,
	[Description] [nvarchar](200) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Comment]    Script Date: 2014/9/1 8:20:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Comment](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[ArticleId] [int] NOT NULL,
	[CommentContent] [nvarchar](2000) NOT NULL,
	[WebsiteId] [int] NOT NULL,
	[CommentTime] [datetime] NOT NULL,
	[IpAddress] [varchar](50) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[KeyWord]    Script Date: 2014/9/1 8:20:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[KeyWord](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[KeyWord] [nvarchar](200) NOT NULL,
	[CreateDate] [datetime] NOT NULL,
	[IsCatched] [bit] NOT NULL,
	[IsExpired] [bit] NOT NULL,
	[ExpiredDate] [datetime] NOT NULL,
	[CategoryId] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[SpiderContent]    Script Date: 2014/9/1 8:20:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[SpiderContent](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Title] [nvarchar](100) NOT NULL,
	[Description] [nvarchar](800) NOT NULL,
	[HtmlContent] [text] NOT NULL,
	[TextContent] [text] NOT NULL,
	[SourceUrl] [nvarchar](200) NOT NULL,
	[ExpiredDate] [datetime] NOT NULL,
	[CategoryId] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[SpiderLink]    Script Date: 2014/9/1 8:20:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[SpiderLink](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[LinkUrl] [nvarchar](200) NOT NULL,
	[IsCatched] [bit] NOT NULL,
	[CategoryId] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Website]    Script Date: 2014/9/1 8:20:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Website](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Name] [nvarchar](30) NOT NULL,
	[SiteNameCn] [nvarchar](30) NOT NULL,
	[SiteNameEn] [nvarchar](30) NOT NULL,
	[SiteUrl] [nvarchar](50) NOT NULL,
	[CreateTime] [datetime] NOT NULL,
	[UpdateTime] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Website_Category]    Script Date: 2014/9/1 8:20:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Website_Category](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[CategoryId] [int] NOT NULL,
	[WebsiteId] [int] NOT NULL,
	[MappingName] [nvarchar](50) NULL,
	[IspuPlished] [bit] NOT NULL,
	[OrderNum] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[WebsiteSetting]    Script Date: 2014/9/1 8:20:17 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[WebsiteSetting](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[ParentId] [int] NOT NULL,
	[SettingGroupName] [nvarchar](30) NOT NULL,
	[SettingKey] [nvarchar](100) NOT NULL,
	[SettingValue] [nvarchar](500) NOT NULL,
	[Description] [nvarchar](200) NOT NULL,
	[CreateTime] [datetime] NOT NULL,
	[WebsiteId] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
ALTER TABLE [dbo].[Advertisement] ADD  DEFAULT ('') FOR [AdName]
GO
ALTER TABLE [dbo].[Advertisement] ADD  DEFAULT ('') FOR [Code]
GO
ALTER TABLE [dbo].[Advertisement] ADD  DEFAULT ((0)) FOR [Width]
GO
ALTER TABLE [dbo].[Advertisement] ADD  DEFAULT ((0)) FOR [Height]
GO
ALTER TABLE [dbo].[Advertisement] ADD  DEFAULT ((0)) FOR [AdType]
GO
ALTER TABLE [dbo].[Advertisement] ADD  DEFAULT (getdate()) FOR [BeginDate]
GO
ALTER TABLE [dbo].[Advertisement] ADD  DEFAULT (getdate()) FOR [EndDate]
GO
ALTER TABLE [dbo].[Advertisement] ADD  DEFAULT ((0)) FOR [WebsiteId]
GO
ALTER TABLE [dbo].[Article] ADD  DEFAULT ('') FOR [Title]
GO
ALTER TABLE [dbo].[Article] ADD  DEFAULT ('') FOR [Description]
GO
ALTER TABLE [dbo].[Article] ADD  DEFAULT ('') FOR [Content]
GO
ALTER TABLE [dbo].[Article] ADD  DEFAULT ((1)) FOR [IsReady]
GO
ALTER TABLE [dbo].[Article] ADD  DEFAULT ((0)) FOR [CategoryId]
GO
ALTER TABLE [dbo].[Article] ADD  DEFAULT ('') FOR [Author]
GO
ALTER TABLE [dbo].[Article] ADD  DEFAULT (getdate()) FOR [PublishedDate]
GO
ALTER TABLE [dbo].[Article] ADD  DEFAULT ('') FOR [ArticleSource]
GO
ALTER TABLE [dbo].[Article] ADD  DEFAULT ('') FOR [SourceUrl]
GO
ALTER TABLE [dbo].[Article_Website] ADD  DEFAULT ((0)) FOR [ArticleId]
GO
ALTER TABLE [dbo].[Article_Website] ADD  DEFAULT ((0)) FOR [WebsiteId]
GO
ALTER TABLE [dbo].[Article_Website] ADD  DEFAULT ((0)) FOR [IsPublished]
GO
ALTER TABLE [dbo].[BaseAction] ADD  DEFAULT ('') FOR [ActionName]
GO
ALTER TABLE [dbo].[BaseAction] ADD  DEFAULT ('') FOR [ActionUrl]
GO
ALTER TABLE [dbo].[BaseAction] ADD  DEFAULT (getdate()) FOR [CreateDate]
GO
ALTER TABLE [dbo].[BaseRole] ADD  DEFAULT ('') FOR [RoleName]
GO
ALTER TABLE [dbo].[BaseRole] ADD  DEFAULT ((0)) FOR [RoleValue]
GO
ALTER TABLE [dbo].[BaseRole] ADD  DEFAULT (getdate()) FOR [CreateDate]
GO
ALTER TABLE [dbo].[BaseRoleAction] ADD  DEFAULT ((0)) FOR [ActionId]
GO
ALTER TABLE [dbo].[BaseRoleAction] ADD  DEFAULT ((0)) FOR [RoleId]
GO
ALTER TABLE [dbo].[BaseRoleAction] ADD  DEFAULT (getdate()) FOR [CreateDate]
GO
ALTER TABLE [dbo].[BaseUser] ADD  DEFAULT ('') FOR [UserName]
GO
ALTER TABLE [dbo].[BaseUser] ADD  DEFAULT ('') FOR [Password]
GO
ALTER TABLE [dbo].[BaseUser] ADD  DEFAULT ('') FOR [Email]
GO
ALTER TABLE [dbo].[BaseUser] ADD  DEFAULT ('') FOR [Mobile]
GO
ALTER TABLE [dbo].[BaseUser] ADD  DEFAULT (getdate()) FOR [LastLoginTime]
GO
ALTER TABLE [dbo].[BaseUser] ADD  DEFAULT (getdate()) FOR [CreateDate]
GO
ALTER TABLE [dbo].[BaseUserRole] ADD  DEFAULT ((0)) FOR [UserId]
GO
ALTER TABLE [dbo].[BaseUserRole] ADD  DEFAULT ((0)) FOR [RoleId]
GO
ALTER TABLE [dbo].[BaseUserRole] ADD  DEFAULT (getdate()) FOR [CreateDate]
GO
ALTER TABLE [dbo].[Category] ADD  DEFAULT ('') FOR [CateName]
GO
ALTER TABLE [dbo].[Category] ADD  DEFAULT ('') FOR [Description]
GO
ALTER TABLE [dbo].[Comment] ADD  DEFAULT ((0)) FOR [ArticleId]
GO
ALTER TABLE [dbo].[Comment] ADD  DEFAULT ('') FOR [CommentContent]
GO
ALTER TABLE [dbo].[Comment] ADD  DEFAULT ('') FOR [WebsiteId]
GO
ALTER TABLE [dbo].[Comment] ADD  DEFAULT (getdate()) FOR [CommentTime]
GO
ALTER TABLE [dbo].[Comment] ADD  DEFAULT ('') FOR [IpAddress]
GO
ALTER TABLE [dbo].[KeyWord] ADD  DEFAULT ('') FOR [KeyWord]
GO
ALTER TABLE [dbo].[KeyWord] ADD  DEFAULT (getdate()) FOR [CreateDate]
GO
ALTER TABLE [dbo].[KeyWord] ADD  DEFAULT ((0)) FOR [IsCatched]
GO
ALTER TABLE [dbo].[KeyWord] ADD  DEFAULT ((0)) FOR [IsExpired]
GO
ALTER TABLE [dbo].[KeyWord] ADD  DEFAULT (getdate()) FOR [ExpiredDate]
GO
ALTER TABLE [dbo].[KeyWord] ADD  DEFAULT ((0)) FOR [CategoryId]
GO
ALTER TABLE [dbo].[SpiderContent] ADD  DEFAULT ('') FOR [Title]
GO
ALTER TABLE [dbo].[SpiderContent] ADD  DEFAULT ('') FOR [Description]
GO
ALTER TABLE [dbo].[SpiderContent] ADD  DEFAULT ('') FOR [HtmlContent]
GO
ALTER TABLE [dbo].[SpiderContent] ADD  DEFAULT ('') FOR [TextContent]
GO
ALTER TABLE [dbo].[SpiderContent] ADD  DEFAULT ('') FOR [SourceUrl]
GO
ALTER TABLE [dbo].[SpiderContent] ADD  DEFAULT ('') FOR [ExpiredDate]
GO
ALTER TABLE [dbo].[SpiderContent] ADD  DEFAULT ((0)) FOR [CategoryId]
GO
ALTER TABLE [dbo].[SpiderLink] ADD  DEFAULT ('') FOR [LinkUrl]
GO
ALTER TABLE [dbo].[SpiderLink] ADD  DEFAULT ('') FOR [IsCatched]
GO
ALTER TABLE [dbo].[SpiderLink] ADD  DEFAULT ((0)) FOR [CategoryId]
GO
ALTER TABLE [dbo].[Website] ADD  DEFAULT ('') FOR [Name]
GO
ALTER TABLE [dbo].[Website] ADD  DEFAULT ('') FOR [SiteNameCn]
GO
ALTER TABLE [dbo].[Website] ADD  DEFAULT ('') FOR [SiteNameEn]
GO
ALTER TABLE [dbo].[Website] ADD  DEFAULT ('') FOR [SiteUrl]
GO
ALTER TABLE [dbo].[Website] ADD  DEFAULT (getdate()) FOR [CreateTime]
GO
ALTER TABLE [dbo].[Website] ADD  DEFAULT (getdate()) FOR [UpdateTime]
GO
ALTER TABLE [dbo].[Website_Category] ADD  DEFAULT ((0)) FOR [CategoryId]
GO
ALTER TABLE [dbo].[Website_Category] ADD  DEFAULT ((0)) FOR [WebsiteId]
GO
ALTER TABLE [dbo].[Website_Category] ADD  DEFAULT ('') FOR [MappingName]
GO
ALTER TABLE [dbo].[Website_Category] ADD  DEFAULT ((0)) FOR [OrderNum]
GO
ALTER TABLE [dbo].[WebsiteSetting] ADD  DEFAULT ((0)) FOR [ParentId]
GO
ALTER TABLE [dbo].[WebsiteSetting] ADD  DEFAULT ('') FOR [SettingGroupName]
GO
ALTER TABLE [dbo].[WebsiteSetting] ADD  DEFAULT ('') FOR [SettingKey]
GO
ALTER TABLE [dbo].[WebsiteSetting] ADD  DEFAULT ('') FOR [SettingValue]
GO
ALTER TABLE [dbo].[WebsiteSetting] ADD  DEFAULT ('') FOR [Description]
GO
ALTER TABLE [dbo].[WebsiteSetting] ADD  DEFAULT (getdate()) FOR [CreateTime]
GO
ALTER TABLE [dbo].[WebsiteSetting] ADD  DEFAULT ((0)) FOR [WebsiteId]
GO
ALTER TABLE [dbo].[Advertisement]  WITH CHECK ADD  CONSTRAINT [FK_Advertisement_Website] FOREIGN KEY([WebsiteId])
REFERENCES [dbo].[Website] ([Id])
GO
ALTER TABLE [dbo].[Advertisement] CHECK CONSTRAINT [FK_Advertisement_Website]
GO
ALTER TABLE [dbo].[Article]  WITH CHECK ADD  CONSTRAINT [FK_Article_Category] FOREIGN KEY([CategoryId])
REFERENCES [dbo].[Category] ([Id])
GO
ALTER TABLE [dbo].[Article] CHECK CONSTRAINT [FK_Article_Category]
GO
ALTER TABLE [dbo].[Article_Website]  WITH CHECK ADD  CONSTRAINT [FK_Article_Website_Article] FOREIGN KEY([ArticleId])
REFERENCES [dbo].[Article] ([ID])
GO
ALTER TABLE [dbo].[Article_Website] CHECK CONSTRAINT [FK_Article_Website_Article]
GO
ALTER TABLE [dbo].[Article_Website]  WITH CHECK ADD  CONSTRAINT [FK_Article_Website_Website] FOREIGN KEY([WebsiteId])
REFERENCES [dbo].[Website] ([Id])
GO
ALTER TABLE [dbo].[Article_Website] CHECK CONSTRAINT [FK_Article_Website_Website]
GO
ALTER TABLE [dbo].[BaseAction]  WITH CHECK ADD  CONSTRAINT [FK_BaseSystemAction_BaseSystemAction] FOREIGN KEY([Id])
REFERENCES [dbo].[BaseAction] ([Id])
GO
ALTER TABLE [dbo].[BaseAction] CHECK CONSTRAINT [FK_BaseSystemAction_BaseSystemAction]
GO
ALTER TABLE [dbo].[BaseRoleAction]  WITH CHECK ADD  CONSTRAINT [FK_BaseRoleAction_BaseAction] FOREIGN KEY([ActionId])
REFERENCES [dbo].[BaseAction] ([Id])
GO
ALTER TABLE [dbo].[BaseRoleAction] CHECK CONSTRAINT [FK_BaseRoleAction_BaseAction]
GO
ALTER TABLE [dbo].[BaseRoleAction]  WITH CHECK ADD  CONSTRAINT [FK_BaseRoleAction_BaseRole] FOREIGN KEY([RoleId])
REFERENCES [dbo].[BaseRole] ([Id])
GO
ALTER TABLE [dbo].[BaseRoleAction] CHECK CONSTRAINT [FK_BaseRoleAction_BaseRole]
GO
ALTER TABLE [dbo].[BaseUserRole]  WITH CHECK ADD  CONSTRAINT [FK_BaseUserRole_BaseRole] FOREIGN KEY([RoleId])
REFERENCES [dbo].[BaseRole] ([Id])
GO
ALTER TABLE [dbo].[BaseUserRole] CHECK CONSTRAINT [FK_BaseUserRole_BaseRole]
GO
ALTER TABLE [dbo].[BaseUserRole]  WITH CHECK ADD  CONSTRAINT [FK_BaseUserRole_BaseUser] FOREIGN KEY([UserId])
REFERENCES [dbo].[BaseUser] ([Id])
GO
ALTER TABLE [dbo].[BaseUserRole] CHECK CONSTRAINT [FK_BaseUserRole_BaseUser]
GO
ALTER TABLE [dbo].[Comment]  WITH CHECK ADD  CONSTRAINT [FK_Comment_Article] FOREIGN KEY([ArticleId])
REFERENCES [dbo].[Article] ([ID])
GO
ALTER TABLE [dbo].[Comment] CHECK CONSTRAINT [FK_Comment_Article]
GO
ALTER TABLE [dbo].[Comment]  WITH CHECK ADD  CONSTRAINT [FK_Comment_Website] FOREIGN KEY([WebsiteId])
REFERENCES [dbo].[Website] ([Id])
GO
ALTER TABLE [dbo].[Comment] CHECK CONSTRAINT [FK_Comment_Website]
GO
ALTER TABLE [dbo].[KeyWord]  WITH CHECK ADD  CONSTRAINT [FK_KeyWord_Category] FOREIGN KEY([CategoryId])
REFERENCES [dbo].[Category] ([Id])
GO
ALTER TABLE [dbo].[KeyWord] CHECK CONSTRAINT [FK_KeyWord_Category]
GO
ALTER TABLE [dbo].[SpiderContent]  WITH CHECK ADD  CONSTRAINT [FK_SpiderContent_Category] FOREIGN KEY([CategoryId])
REFERENCES [dbo].[Category] ([Id])
GO
ALTER TABLE [dbo].[SpiderContent] CHECK CONSTRAINT [FK_SpiderContent_Category]
GO
ALTER TABLE [dbo].[SpiderLink]  WITH CHECK ADD  CONSTRAINT [FK_SpiderLink_Category] FOREIGN KEY([CategoryId])
REFERENCES [dbo].[Category] ([Id])
GO
ALTER TABLE [dbo].[SpiderLink] CHECK CONSTRAINT [FK_SpiderLink_Category]
GO
ALTER TABLE [dbo].[Website_Category]  WITH CHECK ADD  CONSTRAINT [FK_Website_Category_Category] FOREIGN KEY([CategoryId])
REFERENCES [dbo].[Category] ([Id])
GO
ALTER TABLE [dbo].[Website_Category] CHECK CONSTRAINT [FK_Website_Category_Category]
GO
ALTER TABLE [dbo].[Website_Category]  WITH CHECK ADD  CONSTRAINT [FK_Website_Category_Website] FOREIGN KEY([WebsiteId])
REFERENCES [dbo].[Website] ([Id])
GO
ALTER TABLE [dbo].[Website_Category] CHECK CONSTRAINT [FK_Website_Category_Website]
GO
ALTER TABLE [dbo].[WebsiteSetting]  WITH CHECK ADD  CONSTRAINT [FK_WebsiteSetting_Website] FOREIGN KEY([WebsiteId])
REFERENCES [dbo].[Website] ([Id])
GO
ALTER TABLE [dbo].[WebsiteSetting] CHECK CONSTRAINT [FK_WebsiteSetting_Website]
GO
USE [master]
GO
ALTER DATABASE [datacenter] SET  READ_WRITE 
GO
