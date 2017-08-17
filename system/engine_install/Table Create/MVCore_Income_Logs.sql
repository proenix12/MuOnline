IF OBJECT_ID('MVCore_Income_Logs', 'U') IS NOT NULL
  DROP TABLE MVCore_Income_Logs
CREATE TABLE [MVCore_Income_Logs](
	[Income_type] [varchar](50) NOT NULL,
	[cost_value] [varchar](50) NOT NULL
) ON [PRIMARY]