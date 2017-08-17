IF OBJECT_ID('MVCore_Rew_Player', 'U') IS NOT NULL
  DROP TABLE MVCore_Rew_Player
CREATE TABLE [MVCore_Rew_Player](
	[hex_code] [varchar](64) NOT NULL,
	[item_name] [text] NOT NULL
) ON [PRIMARY]