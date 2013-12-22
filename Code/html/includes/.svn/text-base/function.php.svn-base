<?

//include a skin file
function Skin($filename){
	global $project;
	include($project->skinPath.$filename.".php");
}

//setcookie in 30min and root path
function setCOOKIE_($CKEY,$CVALUE){
	setcookie($CKEY, $CVALUE, time()+96400,"/","303project.feeltan.com.au");
}

/*
	Handle check admin action ,
	jump to home page if user dont have permission
	( not login or not an admin user)
*/
function checkAdmin(){
	global $project;
	if ($project->current_user->isLogin()!=true)
	{
		setCOOKIE_("message", "Please Login!");
		Header("Location:../index.php");
		die();
	}else if($project->current_user->isAdmin()==false){
		setCOOKIE_("message", "You are not an admin user!");
		Header("Location:../index.php");
		die();
	}
	
}
function spath(){
	global $project;
	echo $project->skinPath;
}
?>