IF OBJECT_ID('MVCore_Rew_Data', 'U') IS NOT NULL
  DROP TABLE MVCore_Rew_Data
CREATE TABLE [MVCore_Rew_Data](
	[gm_nick] [varchar](350) NOT NULL,
	[reason] [varchar](50) NOT NULL,
	[information] [varchar](233) NOT NULL,
	[rew_to] [text] NOT NULL,
	[date] [varchar](350) NOT NULL,
	[rew_toch] [text] NOT NULL,
) ON [PRIMARY]