<?
require_once('../load.php');
checkAdmin();

if (isset($_GET["action"])){
	$action=$_GET["action"];
	$jumpto="";
	
	if (isset($_GET["url"])){
		$jumpto=$_GET["url"];
	}else{
		$jumpto="index.php";
	}
	
	switch($action){
		case "update_option":
			doUpdate_option();
			break;
		case "update_product":
			doUpdate_product();
			break;
		case "update_client":
			doUpdate_user();
			break;
		case "update_staff":
			doUpdate_user();
			break;
		case "add_product":
			doAdd_product();
			break;
		case "add_client":
			doAdd_user(0);
			break;
		case "add_staff":
			doAdd_user(1);
			break;
		case "del_product":
			doDel_product();
			break;
		case "del_client":
			doDel_client();
			break;
		case "del_staff":
			doDel_staff();
			break;
		case "update_loan";
			update_loan();
			break;
		case "update_payment";
			update_payment();
			break;
		case "del_payment";
			del_payment();
			break;
		case "del_loan";
			del_loan();
			break;
	}
	
	Header("Location:$jumpto");
}
function update_loan(){
	if (isset($_POST["UserID"])&&isset($_POST["State"])&&isset($_POST["LoanDate"])&&isset($_POST["LoanEndDate"])&&isset($_POST["PID"])&&isset($_POST["Quantity"])&&isset($_GET["id"]))
	{
		$sqlstr="UPDATE loan SET ";
		
		$sqlstr.="UserID=".$_POST["UserID"];
		$sqlstr.=" , State='".$_POST["State"]."'";
		$sqlstr.=" , LoanDate='".$_POST["LoanDate"]."'";
		$sqlstr.=" , LoanEndDate='".$_POST["LoanEndDate"]."'";
		$sqlstr.=" , PID=".$_POST["PID"];
		$sqlstr.=" , Quantity=".$_POST["Quantity"];
		
		$sqlstr.=" WHERE LoanID=".$_GET["id"];
		
		mysql_query($sqlstr)or die(" failed : " . mysql_error()." | ".$sqlstr);

	}else{
		setCOOKIE_("message", "ERROR UPDATE");
	}
	
}
function update_payment(){
	if (isset($_POST["UserID"])&&isset($_POST["Total"])&&isset($_POST["State"])&&isset($_POST["LoanIDList"]))
	{
		
		
		$sqlstr="UPDATE payment SET ";
		
		$sqlstr.="UserID=".$_POST["UserID"];
		$sqlstr.=" , Total=".$_POST["Total"];
		$sqlstr.=" , State='".$_POST["State"]."'";
		$sqlstr.=" , LoanIDList='".$_POST["LoanIDList"]."'";
		
		$sqlstr.=" WHERE PaymentID=".$_GET["id"];
		
		mysql_query($sqlstr)or die(" failed : " . mysql_error()." | ".$sqlstr);
		
		
		//update state for loans
		$LoanIDList=unserialize($_POST["LoanIDList"]);
		foreach ($LoanIDList as $loanID => $pid){ 
		
			$sqlstr="UPDATE loan SET ";
		
			$sqlstr.="State='".$_POST["State"]."'";
			
			$sqlstr.=" WHERE LoanID=".$loanID;
			
			mysql_query($sqlstr)or die(" failed : " . mysql_error()." | ".$sqlstr);
		
		}
	}else{
		setCOOKIE_("message", "ERROR UPDATE");
	}
	
}

function doUpdate_user(){
	if (isset($_POST["UName"])&&isset($_POST["UFullName"])&&isset($_POST["UEmail"])&&isset($_POST["UPhone"])&&isset($_POST["UAddress"])&&isset($_POST["UDesc"]))
	{
		$sqlstr="UPDATE users SET ";
		
		$sqlstr.="UName='".$_POST["UName"]."'";
		$sqlstr.=" , UFullName='".$_POST["UFullName"]."'";
		$sqlstr.=" , UEmail='".$_POST["UEmail"]."'";;
		$sqlstr.=" , UPhone='".$_POST["UPhone"]."'";
		$sqlstr.=" , UAddress='".$_POST["UAddress"]."'";
		$sqlstr.=" , UDesc='".$_POST["UDesc"]."'";
		
		$sqlstr.=" WHERE UserID=".$_GET["id"];
		
		
		mysql_query($sqlstr)or die(" failed : " . mysql_error());
		//echo $sqlstr;
		
		if (isset($_POST["custRating"])){
			$re=mysql_query("select * from customers WHERE UserID=".$_GET["id"])or die(" failed : " . mysql_error());
			if(mysql_num_rows($re)==0){
				mysql_query("insert into customers(UserID,custRating) value(".$_GET["id"].",".$_POST["custRating"].")");
			}else{
				mysql_query("UPDATE customers SET custRating=".$_POST["custRating"]." WHERE UserID=".$_GET["id"]);
			}
			
		}else if(isset($_POST["staffPos"])){
			$re=mysql_query("select * from staffs WHERE UserID=".$_GET["id"])or die(" failed : " . mysql_error());
			if(mysql_num_rows($re)==0){
				mysql_query("insert into staffs(UserID,staffPos) value(".$_GET["id"].",'".$_POST["staffPos"]."')");
			}else{
				mysql_query("UPDATE staffs SET staffPos='".$_POST["staffPos"]."' WHERE UserID=".$_GET["id"]);
			}
		}
		

	}else{
		setCOOKIE_("message", "ERROR UPDATE");
	}
}
function doAdd_user($pid){
	if (isset($_POST["UName"])&&isset($_POST["UFullName"])&&isset($_POST["UEmail"])&&isset($_POST["UPhone"])&&isset($_POST["UAddress"])&&isset($_POST["desc"])&&isset($_POST["pw"]))
	{
		$sqlstr="insert into users(UName,UFullName,password,UEmail,UPhone,UDesc,UAddress,UCreateDate,PID) value('";
		$sqlstr.=$_POST["UName"];
		$sqlstr.="','";
		$sqlstr.=$_POST["UFullName"];
		$sqlstr.="','";
		$sqlstr.=md5($_POST["pw"]);
		$sqlstr.="','";
		$sqlstr.=$_POST["UEmail"];
		$sqlstr.="','";
		$sqlstr.=$_POST["UPhone"];
		$sqlstr.="','";
		$sqlstr.=$_POST["desc"];
		$sqlstr.="','";
		$sqlstr.=$_POST["UAddress"];
		$sqlstr.="',";
		$sqlstr.="Now()";
		$sqlstr.=",";
		$sqlstr.=$pid;
		$sqlstr.=")";

		$result=mysql_query($sqlstr)or die("Add user : " . mysql_error());

	}else{
		setCOOKIE_("message", "ERROR Add product");
	}
}
function doDel_client(){
	if (isset($_GET["id"]))
	{
		$result=mysql_query("DELETE FROM users WHERE UserID=".$_GET["id"])or die("failed : " . mysql_error());
		$result=mysql_query("DELETE FROM customers WHERE UserID=".$_GET["id"])or die("failed : " . mysql_error());

	}else{
		setCOOKIE_("message", "ERROR doDel_client");
	}
}
function doDel_staff(){
	if (isset($_GET["id"]))
	{
		$result=mysql_query("DELETE FROM users WHERE UserID=".$_GET["id"])or die("failed : " . mysql_error());
		$result=mysql_query("DELETE FROM staffs WHERE UserID=".$_GET["id"])or die("failed : " . mysql_error());

	}else{
		setCOOKIE_("message", "ERROR doDel_staff");
	}
}

function doUpdate_option(){
	if (isset($_POST["option_value"])&&isset($_GET["key"]))
	{
		$result=mysql_query("UPDATE options SET key_value='".$_POST["option_value"]."' WHERE key_name='".$_GET["key"]."'")or die("failed : " . mysql_error());

	}else{
		setCOOKIE_("message", "ERROR UPDATE");
	}
}
function doDel_product(){
	if (isset($_GET["id"]))
	{
		$result=mysql_query("DELETE FROM products WHERE ProductID=".$_GET["id"])or die("failed : " . mysql_error());

	}else{
		setCOOKIE_("message", "ERROR UPDATE");
	}
}
function doAdd_product(){

	if (isset($_POST["Brand"])&&isset($_POST["Name"])&&isset($_POST["Image"])&&isset($_POST["desc"])&&isset($_POST["P_Price"])&&isset($_POST["ProductType"]))
	{

		
		$sqlstr="insert into products(Name,Brand,ProductSDesc,Price,ImageURL,PurchasePrice,stype,ProductType) value('";
		$sqlstr.=$_POST["Name"];
		$sqlstr.="','";
		$sqlstr.=$_POST["Brand"];
		$sqlstr.="','";
		$sqlstr.=$_POST["desc"];
		$sqlstr.="',";
		$sqlstr.=((float)$_POST["P_Price"])*0.1;
		$sqlstr.=",'";
		$sqlstr.=$_POST["Image"];
		$sqlstr.="',";
		$sqlstr.=$_POST["P_Price"];
		$sqlstr.=",'";
		if ((float)$_POST["P_Price"]>=1000.0){
			$sqlstr.="BIG";
		}else{
			$sqlstr.="SMALL";
		}
		
		
		$sqlstr.="','";
		$sqlstr.=$_POST["ProductType"];
		$sqlstr.="')";

		$result=mysql_query($sqlstr)or die("Add product : " . mysql_error());

	}else{
		setCOOKIE_("message", "ERROR Add product");
	}
}
function doUpdate_product(){

	if (isset($_GET["id"])&&isset($_POST["Brand"])&&isset($_POST["Name"])&&isset($_POST["Price"])&&isset($_POST["Image"])&&isset($_POST["P_Price"])&&isset($_POST["ProductType"])&&isset($_POST["stype"]))
	{
		$sqlstr="UPDATE products SET ";
		
		$sqlstr.="Brand='".$_POST["Brand"]."'";
		$sqlstr.=" , Name='".$_POST["Name"]."'";
		$sqlstr.=" , Price=".$_POST["Price"];
		$sqlstr.=" , PurchasePrice=".$_POST["P_Price"];
		$sqlstr.=" , ImageURL='".$_POST["Image"]."'";
		$sqlstr.=" , ProductType='".$_POST["ProductType"]."'";
		$sqlstr.=" , stype='".$_POST["stype"]."'";
		
		if (isset($_POST["desc"])){
			$sqlstr.=" , ProductSDesc='".$_POST["desc"]."' ";
		}
		
		$sqlstr.=" WHERE ProductID=".$_GET["id"];
		
		
		mysql_query($sqlstr)or die(" failed : " . mysql_error());
		//echo $sqlstr;

	}else{
		setCOOKIE_("message", "ERROR UPDATE");
	}
}

function del_payment(){
	if (isset($_GET["id"]))
	{
		
		
		$re=mysql_query("select LoanIDList FROM payment WHERE PaymentID=".$_GET["id"])or die("failed : " . mysql_error());
		if($row=mysql_fetch_row($re)){
			$LoanIDList=unserialize($row[0]);
			foreach ($LoanIDList as $loanID => $pid){ 
			
				mysql_query("DELETE FROM loan WHERE loanID=".$loanID)or die("failed : " . mysql_error());
			
			}
	
			mysql_query("DELETE FROM payment WHERE PaymentID=".$_GET["id"])or die("failed : " . mysql_error());
		}else{
			setCOOKIE_("message", "ERROR UPDATE - wrony ID");
		}
	}else{
		setCOOKIE_("message", "ERROR UPDATE");
	}
}
function del_loan(){
	if (isset($_GET["id"])){
		mysql_query("DELETE FROM loan WHERE loanID=".$_GET["id"])or die("failed : " . mysql_error());
	}
}
?>