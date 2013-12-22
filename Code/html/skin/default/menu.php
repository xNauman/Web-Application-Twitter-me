<div id=menu>

<a href="home">Home</a>
<?
if($project->current_user->isLogin())
{
	?>
 &nbsp;&nbsp;
<a href="logout">Logout</a>

    <?
}else{
?>
 &nbsp;&nbsp;
<a href="javascript:showLogin()">Login</a>
 &nbsp;&nbsp;
<a href="javascript:showReg()">New User</a>

<?
}?>
</div>
