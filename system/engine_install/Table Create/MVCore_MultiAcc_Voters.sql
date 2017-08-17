IF OBJECT_ID('MVCore_MultiAcc_Voters', 'U') IS NOT NULL
  DROP TABLE MVCore_MultiAcc_Voters
CREATE TABLE [MVCore_MultiAcc_Voters](
	[memb___id] [text] NOT NULL,
	[IP] [varchar] (20) NULL ,
	[votes] [int] NOT NULL default 0
) ON [PRIMARY]