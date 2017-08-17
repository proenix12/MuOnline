IF OBJECT_ID('MVCore_Lottert_Data', 'U') IS NOT NULL
  DROP TABLE MVCore_Lottert_Data
CREATE TABLE [MVCore_Lottert_Data](
	[username] [varchar](50) NOT NULL,
	[ticket] [int] NOT NULL default 0,
	[lucky_number] [varchar](10) NOT NULL,
	[ticket_cost] [int] NOT NULL default 0
) ON [PRIMARY]