IF OBJECT_ID('MVCore_Friend_List', 'U') IS NOT NULL
  DROP TABLE MVCore_Friend_List
CREATE TABLE [MVCore_Friend_List](
	[friend_uid] [varchar](350) NOT NULL,
	[to_who_uid] [varchar](350) NOT NULL,
	[friend_rewarded] [int] NOT NULL DEFAULT 0,
	[date] [varchar](350) NOT NULL
) ON [PRIMARY]