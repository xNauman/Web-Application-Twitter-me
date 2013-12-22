<?
// product -  class
// This class represent a product object
// product objecti include any information for the product
class post{
	var $PostID; // The product ID for the product
	var $P_Title; //The Brand name for the product
	var $P_Body; // the description for the product
	var $P_Author; // the price of the product
	var $P_Date;
	var $P_MDate;
	var $sql_condition;
	var $plist;
	var $size;
	function __construct($PID="",$sql_str="")
	{
		$this->sql_condition=$sql_str;
		if ($PID==""){
			$this->plist=mysql_query("select ProductID,Brand,ProductSDesc,Price,imageURL,Name,stype from products ".$this->sql_condition);
		}else{
			$this->plist=mysql_query("select ProductID,Brand,ProductSDesc,Price,imageURL,Name,stype from products WHERE ProductID=".$PID);
		}
		if($row=mysql_fetch_row($this->plist)){
			$this->ProductID=$row[0];
			$this->Brand=$row[1];
			$this->ProductSDesc=$row[2];
			$this->Price=$row[3];
			$this->imageURL=$row[4];
			$this->Name=$row[5];
			$this->size=$row[6];
		}else{
			$this->ProductID="";
			$this->Brand="";
			$this->ProductSDesc="";
			$this->Price="";
			$this->imageURL="";
			$this->Name="";
			$this->size="";
		}
	}
	
	/*
		Name:
		Description:
		Type/parameters:
		Preconditions:
		Post-conditions:
		Events transmitted to other objects:
		Other operations called:
		Attributes set:
		Response to exceptions:
		Non-functional requirements:
	*/
	function addItem($itemArray){
		
	}
	/*
		Name:
		Description:
		Type/parameters:
		Preconditions:
		Post-conditions:
		Events transmitted to other objects:
		Other operations called:
		Attributes set:
		Response to exceptions:
		Non-functional requirements:
	*/
	function deleteItem(){
	}
	/*
		Name:
		Description:
		Type/parameters:
		Preconditions:
		Post-conditions:
		Events transmitted to other objects:
		Other operations called:
		Attributes set:
		Response to exceptions:
		Non-functional requirements:
	*/
	function modifyItem($itemArray){
	}
	/*
		Name:
		Description:
		Type/parameters:
		Preconditions:
		Post-conditions:
		Events transmitted to other objects:
		Other operations called:
		Attributes set:
		Response to exceptions:
		Non-functional requirements:
	*/
	function getProdDesc(){
		return $this->ProductSDesc;
	}
	function hasProduct(){
		if ($this->ProductID!=""){
			return true;
		}else{
			return false;
		}
	}
	function moveNext(){
			if($row=mysql_fetch_row($this->plist)){
				$this->ProductID=$row[0];
				$this->Brand=$row[1];
				$this->ProductSDesc=$row[2];
				$this->Price=$row[3];
				$this->imageURL=$row[4];
				$this->Name=$row[5];
				return true;
			}else{
				$this->ProductID="";
				$this->Brand="";
				$this->ProductSDesc="";
				$this->Price="";
				$this->imageURL="";
				$this->Name="";
				return false;
			}
	}
}



?>