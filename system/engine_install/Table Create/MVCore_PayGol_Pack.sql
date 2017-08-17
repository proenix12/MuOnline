IF OBJECT_ID('MVCore_PG_Packs', 'U') IS NOT NULL
  DROP TABLE MVCore_PG_Packs
CREATE TABLE [MVCore_PG_Packs](
	[p_name] [varchar](50) NOT NULL,
	[currency] [varchar](50) NOT NULL,
	[money] [int] NOT NULL default 0,
	[cost_eur] [text] NOT NULL
) ON [PRIMARY]