IF OBJECT_ID('MVCore_Wshopp_Socket', 'U') IS NOT NULL
  DROP TABLE MVCore_Wshopp_Socket
CREATE TABLE [MVCore_Wshopp_Socket](
	[sok_id] [varchar](5) NOT NULL,
	[sok_name] [varchar](50) NOT NULL,
	[type] [int] NOT NULL default 0,
	[sok_cost] [int] NOT NULL default 0,
	[sok_element] [varchar](5) NOT NULL,
	[sok_on_off] [int] NOT NULL default 0
) ON [PRIMARY]