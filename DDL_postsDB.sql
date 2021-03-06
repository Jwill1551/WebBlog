/****** Object:  Table [dbo].[postsDB]    Script Date: 10/3/2020 10:50:42 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[postsDB](
	[POST_ID] [int] IDENTITY(1,1) NOT NULL,
	[POST_TITLE] [nvarchar](50) NOT NULL,
	[CATEGORY] [nchar](10) NULL,
	[POST_CONTENT] [nvarchar](500) NOT NULL,
	[POSTED_DATE] [timestamp] NOT NULL,
	[POSTED_BY] [int] NOT NULL,
	[DELETED_FLAG] [nchar](10) NOT NULL
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[postsDB] ADD  CONSTRAINT [DF_postsDB_DELETED_FLAG]  DEFAULT (N'n') FOR [DELETED_FLAG]
GO

ALTER TABLE [dbo].[postsDB]  WITH CHECK ADD FOREIGN KEY([POSTED_BY])
REFERENCES [dbo].[usersDB] ([USER_ID])
GO


