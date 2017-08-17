IF OBJECT_ID('MVCore_Wshopp_Ancient', 'U') IS NOT NULL
  DROP TABLE MVCore_Wshopp_Ancient
CREATE TABLE [MVCore_Wshopp_Ancient](
	[anc_name] [varchar](50) NOT NULL,
	[anc_name2] [varchar](50) NOT NULL,
	[item_id] [int] NOT NULL,
	[item_cat] [int] NOT NULL
) ON [PRIMARY]