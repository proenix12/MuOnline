IF OBJECT_ID('MVCore_Banned_PPL', 'U') IS NOT NULL
  DROP TABLE MVCore_Banned_PPL
  CREATE TABLE [MVCore_Banned_PPL](
	[name] [varchar](60) NOT NULL,
	[type] [int] NOT NULL,
	[reason] [varchar](350) NOT NULL,
	[banned_by] [varchar](60) NOT NULL,
	[unban_date] [varchar](350) NOT NULL
) ON [PRIMARY]