
var action_box_state="";

function showObj(obj_id){
	obj=document.getElementById(obj_id);
	//obj.style.display='block';
	obj.style.visibility='visible';
}
function hideObj(obj_id){
	obj=document.getElementById(obj_id);
	obj.style.visibility='hidden';
	//obj.style.display='block';
}
function isBoxOn(){
	if(	document.getElementById('action_box').style.visibility!='hidden'){
		return true;	
	}else{
		return false;	
	}
}
function closeBox(){
	hideObj('action_box');
}


function showReg(){
	if(action_box_state=='reg')
	{
		hideObj('action_box');
		action_box_state="";
	}else{
		document.getElementById('action_box').style.height='240px';
		
		showObj('action_box');
		Openhttp('reg.php','GET','action_box');
		action_box_state="reg";
	}
}
function showLogin(){
	if(action_box_state=='login')
	{
		hideObj('action_box');
		action_box_state="";
	}else{
		document.getElementById('action_box').style.height='80px';
		Openhttp('login.php','GET','action_box');
		showObj('action_box');
		action_box_state="login";
	}
}



function ResetPage()
{	w=document.body.clientWidth;
	h=document.body.clientHeight;
	divWidth=600;
	obj=document.getElementById('action_box');

	d1Top=200;
	obj.style.top=document.body.scrollTop+d1Top;
	obj.style.left=(w-divWidth)/2;
	
}