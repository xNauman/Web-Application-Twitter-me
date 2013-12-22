<?
/*
	Class Name: project
	
	This class will represent a 303project object,
	The implementation of the any database will implement from this object

*/
class project{
	var $skinname;
	var $skinPath;
	
	var $current_user;
	
	var $message;
	var $reportHandler;
	var $overDueHandler;
	var $products;
	
	var $page_title;
	//var $products;
	
	
	/*
		Name:getSkin()
		Description: return the skin name for the website
		Type/parameters:NONE
		Preconditions:create pro object;
		Post-conditions:NONE
		Events transmitted to other objects:
		Other operations called:getOption()
		Attributes set:$this->skinname
		Response to exceptions:MYSQL ERROR
		Non-functional requirements:NONE
	*/
	function getSkin()
	{
		$this->skinname=$this->getOption('skin');
	}
	/*
		Name:__construct()
		Description: the construct of the tls object
		Type/parameters:NONE
		Preconditions:create tls object;
		Post-conditions:NONE
		Events transmitted to other objects:
		Other operations called:mysql_connect(),mysql_query(),setCOOKIE_()
		Attributes set:$db_connec
		Response to exceptions:MYSQL ERROR
		Non-functional requirements:NONE
	*/
	function __construct() {
		$db_connect=mysql_connect('localhost','fee18399_303user','Isys303');
		mysql_query("use fee18399_303project");
		
		if(isset($_COOKIE["message"])){
			$this->message=$_COOKIE["message"];
			setCOOKIE_("message", "");
		}else{
			$this->message="";
		}
		
		
		$this->getSkin();
		$this->skinPath="skin/".$this->skinname."/";
		$this->checkLogin();


		

	}
	/*
		Name:getOption()
		Description: return  the option value from database
		Type/parameters:   string:$key
		Preconditions:NONE
		Post-conditions:NONE
		Events transmitted to other objects:
		Other operations called:
		Attributes set:$db_connec
		Response to exceptions:MYSQL ERROR
		Non-functional requirements:NONE
	*/
	function getOption($key){
		$result=mysql_query("select key_value from options where key_name='".$key."'")or die("failed : " . mysql_error());
		
		if (mysql_num_rows($result)>0){
			$rr=mysql_fetch_row($result);
			return $rr[0];
		}else{
			return "default";
		}
	}
	/*
		Name:checkLogin()
		Description:check the cookie ,create a user object
		Type/parameters:NONE
		Preconditions:NONE
		Post-conditions:NONE
		Events transmitted to other objects:
		Other operations called:
		Attributes set:$db_connec
		Response to exceptions:MYSQL ERROR
		Non-functional requirements:NONE
	*/
	function checkLogin(){
		if(isset($_COOKIE["project_session"])&&$_COOKIE["project_session"]!="NULL"){
			$sessionkey=$_COOKIE["project_session"];
			$result=mysql_query("select UserID,PID from users where SessionKey='".$sessionkey."'")or die("failed : " . mysql_error());
			if (mysql_num_rows($result)>0){
				$rr=mysql_fetch_row($result);
					$this->current_user= new User($rr[0]);
					//$this->message="logined:".$rr[0];
			}else{
				$this->current_user= new User(null);
			}
		}else{
			$this->current_user= new User(null);
		}

	}
	
	function getProduct($sql=""){
		$this->products= new product("",$sql);
	}
	function getProductByID($PID){
		$this->products= new product($PID);
	}
	
	//	var $current_client;
	function set_current_client($cid){
			$current_client=new customer($cid);
			setCOOKIE_("current_client",$cid);
	}
	function hasCurrent_client(){
		return $this->current_client->isLogin();
	}

}

//create project object
$project=new project();

/*
		if(isset($_COOKIE["current_client"])&&$_COOKIE["current_client"]!=""){
			$id=(int)$_COOKIE["current_client"];
			$project->current_user=new User($id);
		}else{
			$project->current_user=new User(null);
		}*/
?>