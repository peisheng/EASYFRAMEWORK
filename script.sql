USE [master]
GO
/****** Object:  Database [datacenterdb]    Script Date: 2014/8/16 0:11:22 ******/
CREATE DATABASE [datacenterdb]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'datacenterdb', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\datacenterdb.mdf' , SIZE = 4160KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'datacenterdb_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\datacenterdb_log.ldf' , SIZE = 1040KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [datacenterdb] SET COMPATIBILITY_LEVEL = 110
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [datacenterdb].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [datacenterdb] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [datacenterdb] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [datacenterdb] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [datacenterdb] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [datacenterdb] SET ARITHABORT OFF 
GO
ALTER DATABASE [datacenterdb] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [datacenterdb] SET AUTO_CREATE_STATISTICS ON 
GO
ALTER DATABASE [datacenterdb] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [datacenterdb] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [datacenterdb] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [datacenterdb] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [datacenterdb] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [datacenterdb] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [datacenterdb] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [datacenterdb] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [datacenterdb] SET  ENABLE_BROKER 
GO
ALTER DATABASE [datacenterdb] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [datacenterdb] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [datacenterdb] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [datacenterdb] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [datacenterdb] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [datacenterdb] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [datacenterdb] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [datacenterdb] SET RECOVERY FULL 
GO
ALTER DATABASE [datacenterdb] SET  MULTI_USER 
GO
ALTER DATABASE [datacenterdb] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [datacenterdb] SET DB_CHAINING OFF 
GO
ALTER DATABASE [datacenterdb] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [datacenterdb] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
EXEC sys.sp_db_vardecimal_storage_format N'datacenterdb', N'ON'
GO
USE [datacenterdb]
GO
/****** Object:  Table [dbo].[tbl_advertisement]    Script Date: 2014/8/16 0:11:23 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_advertisement](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[adname] [nvarchar](100) NOT NULL,
	[code] [text] NOT NULL,
	[width] [int] NOT NULL,
	[height] [int] NOT NULL,
	[adtype] [int] NOT NULL,
	[begindate] [datetime] NOT NULL,
	[enddate] [datetime] NOT NULL,
	[websiteid] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[tbl_article]    Script Date: 2014/8/16 0:11:23 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_article](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[title] [nvarchar](100) NOT NULL,
	[description] [nvarchar](800) NOT NULL,
	[content] [text] NOT NULL,
	[isready] [bit] NOT NULL,
	[categoryid] [int] NOT NULL,
	[author] [nvarchar](20) NOT NULL,
	[publisheddate] [datetime] NOT NULL,
	[articlesource] [nvarchar](200) NOT NULL,
	[sourceurl] [nvarchar](200) NOT NULL,
	[isimagearticle] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[tbl_article_website]    Script Date: 2014/8/16 0:11:23 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_article_website](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[articleid] [int] NOT NULL,
	[websiteid] [int] NOT NULL,
	[ispublished] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[tbl_category]    Script Date: 2014/8/16 0:11:23 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_category](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[catename] [nvarchar](30) NOT NULL,
	[description] [nvarchar](200) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[tbl_comment]    Script Date: 2014/8/16 0:11:23 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tbl_comment](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[articleid] [int] NOT NULL,
	[commentcontent] [nvarchar](2000) NOT NULL,
	[websiteid] [int] NOT NULL,
	[commenttime] [datetime] NOT NULL,
	[ipaddress] [varchar](50) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tbl_keyword]    Script Date: 2014/8/16 0:11:23 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_keyword](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[keyword] [nvarchar](200) NOT NULL,
	[createdate] [datetime] NOT NULL,
	[iscatched] [bit] NOT NULL,
	[isexpired] [bit] NOT NULL,
	[expireddate] [datetime] NOT NULL,
	[categoryid] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[tbl_spidercontent]    Script Date: 2014/8/16 0:11:23 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_spidercontent](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[title] [nvarchar](100) NOT NULL,
	[description] [nvarchar](800) NOT NULL,
	[htmlcontent] [text] NOT NULL,
	[textcontent] [text] NOT NULL,
	[sourceurl] [nvarchar](200) NOT NULL,
	[expireddate] [datetime] NOT NULL,
	[categoryid] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
/****** Object:  Table [dbo].[tbl_spiderlink]    Script Date: 2014/8/16 0:11:23 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_spiderlink](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[linkurl] [nvarchar](200) NOT NULL,
	[iscatched] [bit] NOT NULL,
	[categoryid] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[tbl_website]    Script Date: 2014/8/16 0:11:23 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_website](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](30) NOT NULL,
	[sitenamecn] [nvarchar](30) NOT NULL,
	[sitenameen] [nvarchar](30) NOT NULL,
	[siteurl] [nvarchar](50) NOT NULL,
	[createtime] [datetime] NOT NULL,
	[updatetime] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[tbl_website_category]    Script Date: 2014/8/16 0:11:23 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_website_category](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[categoryid] [int] NOT NULL,
	[websiteid] [int] NOT NULL,
	[mappingname] [nvarchar](50) NULL,
	[ispublished] [bit] NOT NULL,
	[ordernum] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[tbl_websitesetting]    Script Date: 2014/8/16 0:11:23 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tbl_websitesetting](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[parentid] [int] NOT NULL,
	[settinggroupname] [nvarchar](30) NOT NULL,
	[settingkey] [nvarchar](100) NOT NULL,
	[settingvalue] [nvarchar](500) NOT NULL,
	[description] [nvarchar](200) NOT NULL,
	[createtime] [datetime] NOT NULL,
	[websiteid] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
ALTER TABLE [dbo].[tbl_advertisement] ADD  DEFAULT ('') FOR [adname]
GO
ALTER TABLE [dbo].[tbl_advertisement] ADD  DEFAULT ('') FOR [code]
GO
ALTER TABLE [dbo].[tbl_advertisement] ADD  DEFAULT ((0)) FOR [width]
GO
ALTER TABLE [dbo].[tbl_advertisement] ADD  DEFAULT ((0)) FOR [height]
GO
ALTER TABLE [dbo].[tbl_advertisement] ADD  DEFAULT ((0)) FOR [adtype]
GO
ALTER TABLE [dbo].[tbl_advertisement] ADD  DEFAULT (getdate()) FOR [begindate]
GO
ALTER TABLE [dbo].[tbl_advertisement] ADD  DEFAULT (getdate()) FOR [enddate]
GO
ALTER TABLE [dbo].[tbl_advertisement] ADD  DEFAULT ((0)) FOR [websiteid]
GO
ALTER TABLE [dbo].[tbl_article] ADD  DEFAULT ('') FOR [title]
GO
ALTER TABLE [dbo].[tbl_article] ADD  DEFAULT ('') FOR [description]
GO
ALTER TABLE [dbo].[tbl_article] ADD  DEFAULT ('') FOR [content]
GO
ALTER TABLE [dbo].[tbl_article] ADD  DEFAULT ((1)) FOR [isready]
GO
ALTER TABLE [dbo].[tbl_article] ADD  DEFAULT ((0)) FOR [categoryid]
GO
ALTER TABLE [dbo].[tbl_article] ADD  DEFAULT ('') FOR [author]
GO
ALTER TABLE [dbo].[tbl_article] ADD  DEFAULT (getdate()) FOR [publisheddate]
GO
ALTER TABLE [dbo].[tbl_article] ADD  DEFAULT ('') FOR [articlesource]
GO
ALTER TABLE [dbo].[tbl_article] ADD  DEFAULT ('') FOR [sourceurl]
GO
ALTER TABLE [dbo].[tbl_article] ADD  DEFAULT ((0)) FOR [isimagearticle]
GO
ALTER TABLE [dbo].[tbl_article_website] ADD  DEFAULT ((0)) FOR [articleid]
GO
ALTER TABLE [dbo].[tbl_article_website] ADD  DEFAULT ((0)) FOR [websiteid]
GO
ALTER TABLE [dbo].[tbl_article_website] ADD  DEFAULT ((0)) FOR [ispublished]
GO
ALTER TABLE [dbo].[tbl_category] ADD  DEFAULT ('') FOR [catename]
GO
ALTER TABLE [dbo].[tbl_category] ADD  DEFAULT ('') FOR [description]
GO
ALTER TABLE [dbo].[tbl_comment] ADD  DEFAULT ((0)) FOR [articleid]
GO
ALTER TABLE [dbo].[tbl_comment] ADD  DEFAULT ('') FOR [commentcontent]
GO
ALTER TABLE [dbo].[tbl_comment] ADD  DEFAULT ('') FOR [websiteid]
GO
ALTER TABLE [dbo].[tbl_comment] ADD  DEFAULT (getdate()) FOR [commenttime]
GO
ALTER TABLE [dbo].[tbl_comment] ADD  DEFAULT ('') FOR [ipaddress]
GO
ALTER TABLE [dbo].[tbl_keyword] ADD  DEFAULT ('') FOR [keyword]
GO
ALTER TABLE [dbo].[tbl_keyword] ADD  DEFAULT (getdate()) FOR [createdate]
GO
ALTER TABLE [dbo].[tbl_keyword] ADD  DEFAULT ((0)) FOR [iscatched]
GO
ALTER TABLE [dbo].[tbl_keyword] ADD  DEFAULT ((0)) FOR [isexpired]
GO
ALTER TABLE [dbo].[tbl_keyword] ADD  DEFAULT (getdate()) FOR [expireddate]
GO
ALTER TABLE [dbo].[tbl_keyword] ADD  DEFAULT ((0)) FOR [categoryid]
GO
ALTER TABLE [dbo].[tbl_spidercontent] ADD  DEFAULT ('') FOR [title]
GO
ALTER TABLE [dbo].[tbl_spidercontent] ADD  DEFAULT ('') FOR [description]
GO
ALTER TABLE [dbo].[tbl_spidercontent] ADD  DEFAULT ('') FOR [htmlcontent]
GO
ALTER TABLE [dbo].[tbl_spidercontent] ADD  DEFAULT ('') FOR [textcontent]
GO
ALTER TABLE [dbo].[tbl_spidercontent] ADD  DEFAULT ('') FOR [sourceurl]
GO
ALTER TABLE [dbo].[tbl_spidercontent] ADD  DEFAULT ('') FOR [expireddate]
GO
ALTER TABLE [dbo].[tbl_spidercontent] ADD  DEFAULT ((0)) FOR [categoryid]
GO
ALTER TABLE [dbo].[tbl_spiderlink] ADD  DEFAULT ('') FOR [linkurl]
GO
ALTER TABLE [dbo].[tbl_spiderlink] ADD  DEFAULT ('') FOR [iscatched]
GO
ALTER TABLE [dbo].[tbl_spiderlink] ADD  DEFAULT ((0)) FOR [categoryid]
GO
ALTER TABLE [dbo].[tbl_website] ADD  DEFAULT ('') FOR [name]
GO
ALTER TABLE [dbo].[tbl_website] ADD  DEFAULT ('') FOR [sitenamecn]
GO
ALTER TABLE [dbo].[tbl_website] ADD  DEFAULT ('') FOR [sitenameen]
GO
ALTER TABLE [dbo].[tbl_website] ADD  DEFAULT ('') FOR [siteurl]
GO
ALTER TABLE [dbo].[tbl_website] ADD  DEFAULT (getdate()) FOR [createtime]
GO
ALTER TABLE [dbo].[tbl_website] ADD  DEFAULT (getdate()) FOR [updatetime]
GO
ALTER TABLE [dbo].[tbl_website_category] ADD  DEFAULT ((0)) FOR [categoryid]
GO
ALTER TABLE [dbo].[tbl_website_category] ADD  DEFAULT ((0)) FOR [websiteid]
GO
ALTER TABLE [dbo].[tbl_website_category] ADD  DEFAULT ('') FOR [mappingname]
GO
ALTER TABLE [dbo].[tbl_website_category] ADD  DEFAULT ((0)) FOR [ispublished]
GO
ALTER TABLE [dbo].[tbl_website_category] ADD  DEFAULT ((0)) FOR [ordernum]
GO
ALTER TABLE [dbo].[tbl_websitesetting] ADD  DEFAULT ((0)) FOR [parentid]
GO
ALTER TABLE [dbo].[tbl_websitesetting] ADD  DEFAULT ('') FOR [settinggroupname]
GO
ALTER TABLE [dbo].[tbl_websitesetting] ADD  DEFAULT ('') FOR [settingkey]
GO
ALTER TABLE [dbo].[tbl_websitesetting] ADD  DEFAULT ('') FOR [settingvalue]
GO
ALTER TABLE [dbo].[tbl_websitesetting] ADD  DEFAULT ('') FOR [description]
GO
ALTER TABLE [dbo].[tbl_websitesetting] ADD  DEFAULT (getdate()) FOR [createtime]
GO
ALTER TABLE [dbo].[tbl_websitesetting] ADD  DEFAULT ((0)) FOR [websiteid]
GO
ALTER TABLE [dbo].[tbl_advertisement]  WITH CHECK ADD  CONSTRAINT [FK_tbl_advertisement_tbl_website] FOREIGN KEY([websiteid])
REFERENCES [dbo].[tbl_website] ([id])
GO
ALTER TABLE [dbo].[tbl_advertisement] CHECK CONSTRAINT [FK_tbl_advertisement_tbl_website]
GO
ALTER TABLE [dbo].[tbl_article_website]  WITH CHECK ADD  CONSTRAINT [FK_tbl_article_website_tbl_article] FOREIGN KEY([articleid])
REFERENCES [dbo].[tbl_article] ([id])
GO
ALTER TABLE [dbo].[tbl_article_website] CHECK CONSTRAINT [FK_tbl_article_website_tbl_article]
GO
ALTER TABLE [dbo].[tbl_article_website]  WITH CHECK ADD  CONSTRAINT [FK_tbl_article_website_tbl_website] FOREIGN KEY([websiteid])
REFERENCES [dbo].[tbl_website] ([id])
GO
ALTER TABLE [dbo].[tbl_article_website] CHECK CONSTRAINT [FK_tbl_article_website_tbl_website]
GO
ALTER TABLE [dbo].[tbl_comment]  WITH CHECK ADD  CONSTRAINT [FK_tbl_comment_tbl_article] FOREIGN KEY([id])
REFERENCES [dbo].[tbl_article] ([id])
GO
ALTER TABLE [dbo].[tbl_comment] CHECK CONSTRAINT [FK_tbl_comment_tbl_article]
GO
ALTER TABLE [dbo].[tbl_comment]  WITH CHECK ADD  CONSTRAINT [FK_tbl_comment_tbl_website] FOREIGN KEY([websiteid])
REFERENCES [dbo].[tbl_website] ([id])
GO
ALTER TABLE [dbo].[tbl_comment] CHECK CONSTRAINT [FK_tbl_comment_tbl_website]
GO
ALTER TABLE [dbo].[tbl_keyword]  WITH CHECK ADD  CONSTRAINT [FK_tbl_keyword_tbl_category] FOREIGN KEY([categoryid])
REFERENCES [dbo].[tbl_category] ([id])
GO
ALTER TABLE [dbo].[tbl_keyword] CHECK CONSTRAINT [FK_tbl_keyword_tbl_category]
GO
ALTER TABLE [dbo].[tbl_spidercontent]  WITH CHECK ADD  CONSTRAINT [FK_tbl_spidercontent_tbl_category] FOREIGN KEY([categoryid])
REFERENCES [dbo].[tbl_category] ([id])
GO
ALTER TABLE [dbo].[tbl_spidercontent] CHECK CONSTRAINT [FK_tbl_spidercontent_tbl_category]
GO
ALTER TABLE [dbo].[tbl_spiderlink]  WITH CHECK ADD  CONSTRAINT [FK_tbl_spiderlink_tbl_category] FOREIGN KEY([categoryid])
REFERENCES [dbo].[tbl_category] ([id])
GO
ALTER TABLE [dbo].[tbl_spiderlink] CHECK CONSTRAINT [FK_tbl_spiderlink_tbl_category]
GO
ALTER TABLE [dbo].[tbl_website_category]  WITH CHECK ADD  CONSTRAINT [FK_tbl_website_category_tbl_category] FOREIGN KEY([categoryid])
REFERENCES [dbo].[tbl_category] ([id])
GO
ALTER TABLE [dbo].[tbl_website_category] CHECK CONSTRAINT [FK_tbl_website_category_tbl_category]
GO
ALTER TABLE [dbo].[tbl_website_category]  WITH CHECK ADD  CONSTRAINT [FK_tbl_website_category_tbl_website] FOREIGN KEY([websiteid])
REFERENCES [dbo].[tbl_website] ([id])
GO
ALTER TABLE [dbo].[tbl_website_category] CHECK CONSTRAINT [FK_tbl_website_category_tbl_website]
GO
ALTER TABLE [dbo].[tbl_websitesetting]  WITH CHECK ADD  CONSTRAINT [FK_tbl_websitesetting_tbl_website] FOREIGN KEY([websiteid])
REFERENCES [dbo].[tbl_website] ([id])
GO
ALTER TABLE [dbo].[tbl_websitesetting] CHECK CONSTRAINT [FK_tbl_websitesetting_tbl_website]
GO
USE [master]
GO
ALTER DATABASE [datacenterdb] SET  READ_WRITE 
GO
