IF OBJECT_ID('MVCore_Market_Sold_Items', 'U') IS NOT NULL
  DROP TABLE MVCore_Market_Sold_Items
CREATE TABLE [MVCore_Market_Sold_Items](
	[hex] [varchar](64) NOT NULL,
	[memb___id] [varchar](50) NOT NULL,
	[name] [varchar](100) NOT NULL,
	[price] [varchar](50) NOT NULL,
	[type] [varchar](5) NOT NULL,
	[soldto] [varchar](50) NOT NULL,
	[date] [varchar](70) NOT NULL
) ON [PRIMARY]