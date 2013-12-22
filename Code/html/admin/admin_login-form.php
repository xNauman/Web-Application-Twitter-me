<? global $tls,$site_body,$site_title,$site_login; ?>
<? 
	
	if ($tls->current_user->isLogin()==true)
	{
        $site_login.='<div id="displayUser">';
        $site_login.='Welcome <strong>'.$tls->current_user->UFullName.'</strong>! </BR></BR>';
        $site_login.='Your are <strong>'.$tls->current_user->getRoleName().'</strong> of the website !</BR>';
		
		if ($tls->current_user->isAdmin()){
			$site_login.='<a href="admin/index.php" > [ Site Admin ] </a></BR>';
			$site_login.='<a href="up.php" > [ Upload File ] </a></BR>';
		}
		
        $site_login.='<a href="action.php?action=logout" > [ Logout ] </a></BR>';
        $site_login.='</div>';
	}else{

		$site_login.="<form id='form1' name='form1' method='post' action='action.php?action=login'>
		UserName: <input type='text' name='username' id='username' />
		Password:<input type='password' name='pw' id='pw' />
		<input type='submit' name='button' id='button' value='Login' />
    		<a href='reg.php'> New User</a>
		</form>";

 } 