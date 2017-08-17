IF OBJECT_ID('MVCore_Ancient_Exchange_Log', 'U') IS NOT NULL
  DROP TABLE MVCore_Ancient_Exchange_Log
CREATE TABLE [MVCore_Ancient_Exchange_Log](
	[ItemHex] [varchar](64) NOT NULL,
	[memb___id] [varchar](50) NOT NULL,
	[CreditsGot] [varchar](50) NOT NULL,
	[date] [varchar](70) NOT NULL
) ON [PRIMARY]