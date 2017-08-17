IF OBJECT_ID('MVCore_Wshopp', 'U') IS NOT NULL
  DROP TABLE MVCore_Wshopp
CREATE TABLE [MVCore_Wshopp](
	[item_name] [varchar](50) NULL,
	[item_cost] [int] NULL,
	[zen_cost] [int] NULL,
	[category] [int] NOT NULL,
	[id] [int] NOT NULL,
	[x] [int] NOT NULL,
	[y] [int] NOT NULL,
	[max_level] [int] NOT NULL,
	[has_luck] [int] NOT NULL,
	[has_skill] [int] NOT NULL,
	[is_ancient] [int] NOT NULL,
	[is_harmony] [int] NOT NULL,
	[is_socket] [int] NOT NULL,
	[has_refinery] [int] NOT NULL,
	[max_excellent] [int] NULL,
	[clases] [varchar](50) NULL,
	[durability] [int] NULL,
	[equip_level] [int] NULL,
	[can_buy] [int] NULL,
	[can_buy_w_money1] [int] NULL,
	[can_buy_w_money2] [int] NULL,
	[can_buy_w_zen] [int] NULL,
	[bought_count] [int] NULL
) ON [PRIMARY]