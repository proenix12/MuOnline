IF OBJECT_ID('MVCore_Wshopp_Ertel', 'U') IS NOT NULL
  DROP TABLE MVCore_Wshopp_Ertel
CREATE TABLE [MVCore_Wshopp_Ertel](
	[ertel_id] [int] NOT NULL default 0,
	[ertel_name] [varchar](100) NOT NULL,
	[ertel_cat] [int] NOT NULL default 0,
	[ertel_type] [int] NOT NULL default 0
) ON [PRIMARY]