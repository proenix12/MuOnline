IF OBJECT_ID('MVCore_Register_Count', 'U') IS NOT NULL
  DROP TABLE MVCore_Register_Count
  CREATE TABLE [MVCore_Register_Count](
	[UserIp] [varchar](150) NOT NULL
) ON [PRIMARY]