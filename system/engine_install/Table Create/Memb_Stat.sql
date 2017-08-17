IF OBJECT_ID('MEMB_STAT', 'U') IS NOT NULL
  DROP TABLE MEMB_STAT
CREATE TABLE [MEMB_STAT] (
	[memb___id] [varchar] (10) NOT NULL ,
	[ConnectStat] [tinyint] NOT NULL CONSTRAINT [DF_MEMB_STAT_ConnectStat] DEFAULT (0),
	[ServerName] [varchar] (50) NULL ,
	[IP] [varchar] (20) NULL ,
	[ConnectTM] [smalldatetime] NULL ,
	[DisConnectTM] [smalldatetime] NULL ,
	[OnlineHours] [int] NOT NULL DEFAULT (0)
) ON [PRIMARY]