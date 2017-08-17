IF OBJECT_ID('MVCore_Earn_Logs', 'U') IS NOT NULL
  DROP TABLE MVCore_Earn_Logs
CREATE TABLE [MVCore_Earn_Logs](
	[earned_money] [int] NOT NULL default 0,
	[date] [varchar](70) NOT NULL
) ON [PRIMARY]