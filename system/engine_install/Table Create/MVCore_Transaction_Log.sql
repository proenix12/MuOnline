IF OBJECT_ID('MVCore_Tran_Log', 'U') IS NOT NULL
  DROP TABLE MVCore_Tran_Log
CREATE TABLE [MVCore_Tran_Log](
	[business] [varchar](250) NOT NULL,
	[currency_code] [varchar](250) NOT NULL,
	[item_name] [varchar](250) NOT NULL,
	[custom] [varchar](250) NOT NULL,
	[invoice] [varchar](250) NOT NULL,
	[amount] [varchar](50) NOT NULL,
	[money] [int] NOT NULL default 0
) ON [PRIMARY]