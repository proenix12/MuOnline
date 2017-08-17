IF OBJECT_ID('MVCore_Wshopp_Harmony', 'U') IS NOT NULL
  DROP TABLE MVCore_Wshopp_Harmony
CREATE TABLE [MVCore_Wshopp_Harmony](
	[joh_id] [varchar](5) NOT NULL,
	[joh_val] [varchar](5) NOT NULL,
	[joh_name] [varchar](50) NOT NULL,
	[joh_type] [varchar](5) NOT NULL,
	[joh_cost] [int] NOT NULL default 0,
	[joh_onoff] [int] NOT NULL default 0
) ON [PRIMARY]