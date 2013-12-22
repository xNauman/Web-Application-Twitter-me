<?
require_once('load.php');
$jumpto="";
if (isset($_GET["action"])){
	$action=$_GET["action"];
	
	
	if (isset($_GET["url"])){
		$jumpto=$_GET["url"];
	}else{
		$jumpto="http://303project.feeltan.com.au";
	}
	
	switch($action){
		case "login":
			 doLogin();
			break;
		case "logout":
			doLogout();
			break;
		case "reg_user":
			$reg_result=reg_user();
			if($reg_result==""){
				setCOOKIE_("message", "Succeed register!!");
			}else{
				setCOOKIE_("message", $reg_result);
			}
			break;
		default:
			setCOOKIE_("message", "Empty Action!!");
			break;
	}
	
	Header("Location:$jumpto");
}
function reg_user(){
	if (isset($_POST["UFullName"])&&isset($_POST["UEmail"])&&isset($_POST["UPhone"])&&isset($_POST["UAddress"])&&isset($_POST["pw0"])&&isset($_POST["pw1"])){

			
			$pw0=$_POST["pw0"];
			$pw1=$_POST["pw1"];
			
			
			if($pw0==$pw1)
			{
				$UFullName=$_POST["UFullName"];
				$UEmail=$_POST["UEmail"];
				$UPhone=$_POST["UPhone"];
				$UAddress=$_POST["UAddress"];
				if ( $UFullName=="" || $UEmail=="" || $UPhone="" || $UAddress="")
				{
					return "Please fill all";
				}
				mysql_query("insert into users(UFullName,password,UEmail,UPhone,UDesc,UAddress,UCreateDate,PID) 
								   value('".$UFullName."','".md5($pw0)."','".$UEmail."','".$UPhone."','".$UAddress."','',Now(),0)")or die("Failed uer : " . mysql_error());
				return "";
			}else{
				return "password is different".$pw0."|".$pw1;	
			}
	}else{
		return "Please fill all";
		
	}
	
}
function checkcart($list){
	$MAX_big=1;
	$MAX_small=3;
	
	$big=0;
	$small=0;
	foreach ($list as $pid => $pnum){
		$result=mysql_query("select stype from products where ProductID=".$pid)or die("failed : " . mysql_error());
		if ($row=mysql_fetch_row($result)){
			if ($row[0]=="BIG"){
				$big+=(int)$pnum;
			}else if($row[0]=="SMALL"){
				$small+=(int)$pnum;
			}

		}else{
			return false;	
		}
		
	}
	
	if ($big>$MAX_big || $small>$MAX_small){
		return false;
	}else{
		return true;
	}
	
}

function doLogin(){
	global $project;
	if (isset($_POST["email"])&&isset($_POST["pw"]))
	{
		$pw=md5($_POST["pw"]);
		$email=$_POST["email"];
		
		$result=mysql_query("select UserID from users where UEmail='".$email."' and password='".$pw."'")or die("failed : " . mysql_error());
		if (mysql_num_rows($result)>0){
			$rr=mysql_fetch_row($result);
			$sesskey=$email;
			$sesskey.=mt_rand(0, 9999999);
			mysql_query("update users SET SessionKey='".$sesskey."' WHERE UserID=".$rr[0])or die("failed : " . mysql_error());
			setCOOKIE_("project_session",$sesskey);
		}else{
			//setcookie("message",$pw.$user);
			setCOOKIE_("message", "Please enter correct user name and password!");
		}
		//
		
	}else{
		setCOOKIE_("message", "login Fail!");
	}
}

function doLogout(){
	global $project;
	$uid=$project->current_user->UserID;
	if ($uid!=null)
	{
		mysql_query("update users SET SessionKey='NULL' WHERE UserID=".$uid)or die("Logout Error : " . mysql_error());
		setCOOKIE_("project_session","NULL");
	}else{
		setCOOKIE_("message", "logout Fail!");
	}
	
}
function doAddFollow(){
	
}
function postMsg(){
	if (isset($_POST["msg_body"])){
		
	}
}

?>