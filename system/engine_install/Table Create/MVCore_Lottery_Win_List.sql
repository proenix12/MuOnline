IF OBJECT_ID('MVCore_Lottert_WinL', 'U') IS NOT NULL
  DROP TABLE MVCore_Lottert_WinL
CREATE TABLE [MVCore_Lottert_WinL](
	[username] [varchar](50) NOT NULL,
	[credits] [varchar](350) NOT NULL,
	[date] [varchar](350) NOT NULL,
	[l_num] [varchar](10) NOT NULL,
	[cost_type] [int] NOT NULL,
) ON [PRIMARY]