<?
		$db_connect=mysql_connect('localhost','fee18399_303user','Isys303');
		mysql_query("use fee18399_303project");

mysql_query("drop table users");
mysql_query("drop table permission");
mysql_query("drop table messages");
mysql_query("drop table options");
mysql_query("drop table follows");

mysql_query("create table users (UserID INTEGER UNSIGNED NOT NULL auto_increment PRIMARY KEY,
								 UFullName varchar(40),
								 password varchar(40),
								 UEmail VARCHAR(50),
								 StrEmail varchar(40),
								 UPhone VARCHAR(50),
								 UDesc TEXT,
								 UAddress TEXT,
								 UCreateDate DATETIME,
								 PID INT(10),
								 SessionKey varchar(40),
								 imagesURL varchar(40)
			)AUTO_INCREMENT=1")or die("failed create users: " . mysql_error());

mysql_query("create table messages (MsgID INTEGER UNSIGNED NOT NULL auto_increment PRIMARY KEY,
							  	 AuthorUserID INT(10),
								 ToFllowerUserID INT(10),
								 MsgBody TEXT,
								 UCreateDate DATETIME
			)AUTO_INCREMENT=1")or die("failed create messages table: " . mysql_error());

mysql_query("create table follows (FID INTEGER UNSIGNED NOT NULL auto_increment PRIMARY KEY,
							  	 AuthorUserID INT(10),
								 ToFllowerUserID INT(10)
			)AUTO_INCREMENT=1")or die("failed create follows table: " . mysql_error());

$pw=md5("123456");
mysql_query("insert into users(UFullName,password,UEmail,UPhone,UDesc,UAddress,UCreateDate,PID) 
							   value('Felix Huang','$pw','felix_feel@hotmail.com','','','',Now(),1)")or die("Failed uer : " . mysql_error());
mysql_query("insert into users(UFullName,password,UEmail,UPhone,UDesc,UAddress,UCreateDate,PID) 
							   value('Jack','$pw','jack@hotmail.com','','','',Now(),1)")or die("Failed uer : " . mysql_error());

mysql_query("create table options(key_name varchar(20) PRIMARY KEY,key_value varchar(40))")or die("Failed 1: " . mysql_error());
mysql_query("insert into options value('skin','default')")or die("Failed2 : " . mysql_error());
mysql_query("insert into options value('site_title','303project')")or die("Failed2 : " . mysql_error());


//message test data

//follow test data
//$admin=new staff(0);

?>

