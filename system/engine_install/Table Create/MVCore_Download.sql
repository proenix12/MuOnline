IF OBJECT_ID('MVCore_DWN', 'U') IS NOT NULL
  DROP TABLE MVCore_DWN
  CREATE TABLE [MVCore_DWN](
	[link] [text] NOT NULL,
	[name] [varchar](50) NOT NULL,
	[file_name] [varchar](50) NOT NULL,
	[add_date] [varchar](50) NOT NULL,
	[category] [varchar](2) NOT NULL
) ON [PRIMARY]