IF OBJECT_ID('MVCore_Wshopp_Ancient_Opt', 'U') IS NOT NULL
  DROP TABLE MVCore_Wshopp_Ancient_Opt
CREATE TABLE [MVCore_Wshopp_Ancient_Opt](
	[anc_id] [int] NOT NULL,
	[anc_name] [varchar](50) NOT NULL,
	[options] [text] NOT NULL
) ON [PRIMARY]