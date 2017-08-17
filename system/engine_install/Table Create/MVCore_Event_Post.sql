IF OBJECT_ID('MVCore_Event_Post', 'U') IS NOT NULL
  DROP TABLE MVCore_Event_Post
  CREATE TABLE [MVCore_Event_Post](
	[title] [varchar](80) NOT NULL,
	[message] [varchar](350) NOT NULL,
	[game_master] [varchar](60) NOT NULL,
	[expire_date] [varchar](350) NOT NULL
) ON [PRIMARY]