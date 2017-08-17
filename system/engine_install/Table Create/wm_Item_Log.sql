IF OBJECT_ID('MVCore_Wshopp_Item_Log', 'U') IS NOT NULL
  DROP TABLE MVCore_Wshopp_Item_Log
CREATE TABLE [MVCore_Wshopp_Item_Log](
	[name] [varchar](70) NOT NULL,
	[hex] [varchar](64) NOT NULL,
	[cost] [varchar](70) NOT NULL,
	[boughtby] [varchar](70) NOT NULL,
	[date] [varchar](70) NOT NULL,
	[type] [varchar](70) NOT NULL
) ON [PRIMARY]