IF OBJECT_ID('MVCore_Vote_Log', 'U') IS NOT NULL
  DROP TABLE MVCore_Vote_Log
CREATE TABLE [MVCore_Vote_Log](
	[un_id] [varchar](50) NOT NULL,
	[vote_date] [varchar](350) NOT NULL,
	[username] [varchar](350) NOT NULL,
	[vote_ip] [varchar](350) NOT NULL,
	[votes] [int] NOT NULL default 0
) ON [PRIMARY]