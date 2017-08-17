IF OBJECT_ID('MVCore_Event_Timer', 'U') IS NOT NULL
  DROP TABLE MVCore_Event_Timer
  CREATE TABLE [MVCore_Event_Timer](
	[event_name] [varchar](200) NOT NULL,
	[event_hour] [int] NOT NULL DEFAULT 0,
	[event_min] [int] NOT NULL DEFAULT 0,
	[event_interval] [int] NOT NULL DEFAULT 0,
	[event_run_time] [int] NOT NULL DEFAULT 0,
	[event_reward_info] [varchar](200) NOT NULL,
	[event_start_date] [varchar](200) NOT NULL,
	[type] [int] NOT NULL DEFAULT 0,
	[date] [varchar](100) NOT NULL
) ON [PRIMARY]