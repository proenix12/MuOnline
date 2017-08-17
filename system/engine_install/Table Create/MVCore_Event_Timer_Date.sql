IF OBJECT_ID('MVCore_Event_Timer_Date', 'U') IS NOT NULL
  DROP TABLE MVCore_Event_Timer_Date
  CREATE TABLE [MVCore_Event_Timer_Date](
	[event_timer_date] [varchar](200) NOT NULL,
	[id] [varchar](100) NOT NULL
) ON [PRIMARY]