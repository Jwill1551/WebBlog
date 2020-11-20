/****** Object:  Table [dbo].[categories]    Script Date: 10/10/2020 11:02:57 AM ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[categories](
	[CATEGORY_ID] [int] IDENTITY(1,1) NOT NULL,
	[CATEGORY_NAME] [nchar](50) NOT NULL,
	[CREATED_DATE] [timestamp] NOT NULL,
	[CREATED_BY] [int] NOT NULL,
	[ACTIVE_FLAG] [nchar](10) NOT NULL
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[categories] ADD  CONSTRAINT [DF_categories_ACTIVE_FLAG]  DEFAULT (N'y') FOR [ACTIVE_FLAG]
GO

ALTER TABLE [dbo].[categories]  WITH CHECK ADD FOREIGN KEY([CREATED_BY])
REFERENCES [dbo].[usersDB] ([USER_ID])
GO


