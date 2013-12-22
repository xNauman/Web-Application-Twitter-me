
//AJAX by Felix Huang









var url_;



var LoaingString="<table width='450' height='350' border='0' cellpadding='0' cellspacing='0'  align='center'><tr><td align='center' valign='middle' style='text-align:center;'><object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0' name='sampleFlaMovie2'  width='70' height='70' align='middle' style='vertical-align:middle; display:inline' ID='sampleFlaMovie2' ><param name='allowScriptAccess' value='sameDomain' /><param name='allowFullScreen' value='false' /><param name='movie' value='skin/cute/images/loading.swf' /><param name='quality' value='high' /><param name='bgcolor' value='#f7f7ef' /><param name='WMode' value='Transparent' /><embed src='skin/cute/images/loading.swf' quality='high' swliveconnect='true' bgcolor='#FFFFFF' width='70' height='70' align='middle' allowScriptAccess='sameDomain' allowFullScreen='false' type='application/x-shockwave-flash' name='sampleFlaMovie2' pluginspage='http://www.macromedia.com/go/getflashplayer' /></object></td></tr></table>";




var AJAXstatus;
var pagetag_id;


var formstr;


function stateHandler() 

{
	if (requester.readyState== 4) 
	{
		var responseData=requester.responseText;
		document.getElementById(pagetag_id).innerHTML=responseData; 
	} 

} 
function formstring() 

{ // gets the input from the form and returns a query string
/*
 	formstr='';
	if(url_=="getChooseUser.php")

	{
		formstr= 'pid=' + escape(document.getElementById("pid").value);
		formstr+='&pname=' + escape(document.getElementById("pname").value);
		formstr+='&pnum=' + escape(document.getElementById("pnum").value);

	}*/

}



function Openhttp(url,http_type,get_pagetag_id) 

{
	url_=url;

	if (get_pagetag_id!="")

	{

		formstring()

		document.getElementById(get_pagetag_id).innerHTML=LoaingString;

		pagetag_id=get_pagetag_id

		if (window.XMLHttpRequest) 

		{

			requester = new XMLHttpRequest();

		}

		else if (window.ActiveXObject) 

		{

			requester = new ActiveXObject("Microsoft.XMLHTTP");

		}

		

		if (http_type=="post")

		{

			requester.open('POST',url,true);

			requester.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // POST requires this setting

			requester.onreadystatechange= stateHandler;

			requester.send(formstr);

			

		}

		else

		{

			requester.open('GET',url,true);

			requester.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 

			requester.onreadystatechange= stateHandler;

			requester.send("NONE");

		}

	}

}
