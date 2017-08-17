IF OBJECT_ID('MVCore_Market_Items', 'U') IS NOT NULL
  DROP TABLE MVCore_Market_Items
CREATE TABLE [MVCore_Market_Items](
	[hex] [varchar](64) NOT NULL,
	[serial] [varchar](50) NOT NULL,
	[date] [varchar](50) NOT NULL,
	[soldby] [varchar](50) NOT NULL,
	[cost] [varchar](50) NOT NULL,
	[cate] [varchar](50) NOT NULL,
	[ptype] [varchar](2) NOT NULL
) ON [PRIMARY]