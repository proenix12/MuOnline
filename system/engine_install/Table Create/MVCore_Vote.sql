IF OBJECT_ID('MVCore_Vote', 'U') IS NOT NULL
  DROP TABLE MVCore_Vote
CREATE TABLE [MVCore_Vote](
	[name] [text] NOT NULL,
	[url] [text] NOT NULL,
	[img_url] [text] NOT NULL,
	[reward] [int] NOT NULL default 0,
	[un_id] [varchar](50) NOT NULL,
	[date_int] [varchar](350) NOT NULL
) ON [PRIMARY]