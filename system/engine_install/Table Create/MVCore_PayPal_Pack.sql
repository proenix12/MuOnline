IF OBJECT_ID('MVCore_PP_Packs', 'U') IS NOT NULL
  DROP TABLE MVCore_PP_Packs
CREATE TABLE [MVCore_PP_Packs](
	[pack_name] [varchar] (50) NOT NULL,
	[money] [int] NOT NULL default 0,
	[cost_eur] [text] NOT NULL,
	[cost_usd] [text] NOT NULL,
	[cost_gbp] [text] NOT NULL
) ON [PRIMARY]