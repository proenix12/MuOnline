IF OBJECT_ID('MVCore_Money_Data', 'U') IS NOT NULL
  DROP TABLE MVCore_Money_Data
CREATE TABLE [MVCore_Money_Data](
	[Username] [varchar] (50) NOT NULL,
	[Credits] [int] NOT NULL default 0,
	[GoldCredits] [int] NOT NULL default 0,
	[Description] [text] NOT NULL,
	[Date] [varchar] (50) NOT NULL,
	[VoteType] [int] NOT NULL default 0
) ON [PRIMARY]