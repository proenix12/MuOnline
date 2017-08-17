IF OBJECT_ID('MVCore_Item_Upgrade', 'U') IS NOT NULL
  DROP TABLE MVCore_Item_Upgrade
CREATE TABLE [MVCore_Item_Upgrade](
	[item_original_hex] [varchar](64) NOT NULL,
	[item_hex] [varchar](64) NOT NULL,
	[memb___id] [varchar](12) NOT NULL,
	[int_time] [varchar](60) NOT NULL,
	[up_type] [varchar](10) NOT NULL
) ON [PRIMARY]