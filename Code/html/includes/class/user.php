<?
class User{
	var $UserID;
	var $PID;
	var	$UFullName;
	
	var $UEmail;
	var $UPhone;
	var $UDesc;
	var $UAddress;
	var $UCreateDate;
	
	function __construct($in_UID)
	{
		$this->UserID=$in_UID;
		if ($this->UserID!=null){
			$this->updateCore();
		}
	}
	
	function isLogin(){
		if ($this->UserID==null){
			return false;
		}else
		{
			return true;
		}
	}
	
	function updateCore()
	{	
		$result=mysql_query("select UFullName,PID,UEmail,UPhone,UDesc,UAddress from users where UserID=".$this->UserID)or die("UpdateUser : " . mysql_error());
		$rr=mysql_fetch_row($result);
		$this->UFullName=$rr[0];
		$this->PID=$rr[1];
		$this->UEmail=$rr[2];
		$this->UPhone=$rr[3];
		$this->UDesc=$rr[4];
		$this->UAddress=$rr[5];
		
	}

	function setPID($PID){
		$this->PID=$PID;
		//update pid in mysql ............
		
		
		//end update
	}
	function isAdmin(){
		if ($this->PID==0){
			return false;
		}else if($this->PID==1){
			return true;
		}
	}
	function getRoleName(){
		if 	($this->isAdmin()){
			return "Admin";
		}else{
			return "User";
		}
	}
}


?>