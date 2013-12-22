<?
require_once('../load.php');
checkAdmin();

$site_body="";
$site_login="";
$site_title=$tls->getOption("site_title");
$site_body.='
<div id="Main_frame">
<div id="header">
 <h3><a href="../index.php">Home</a>  > <a href="index.php">System Management</a> > Options</h3>
</div>
        <table id="Table_01" width="750" height="61" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td width="20" height="19">
                    <img src="../skin/default/images/grey/frame_01.gif" width="20" height="19" alt=""></td>
                <td background="../skin/default/images/grey/frame_02.gif">&nbsp;</td>
                <td width="21" height="19">
                    <img src="../skin/default/images/grey/frame_03.gif" width="21" height="19" alt=""></td>
            </tr>
            <tr>
                <td background="../skin/default/images/grey/frame_04.gif">&nbsp;</td>
                <td bgcolor="#e4e4e4">
                <div ="options_list" style="padding:15px;">
                <p>
                Current Skin Name: [default] [cute]
                </p>';
                
				
                $op=mysql_query("select * from options");
                
                while($row=mysql_fetch_row($op)){
					
					$site_body.='<form name="form1" method="post" action="admin_action.php?action=update_option&key='.$row[0].'">';
					$site_body.='<strong>'.$row[0].'</strong>&nbsp;&nbsp;<input type="text" name="option_value" id="option_value" value="'.$row[1].'">&nbsp;&nbsp;';
					$site_body.='<input type="submit" name="button" id="button" value="Submit"></form>';
					
                }
$site_body.='
</div>
                </td>
                <td background="../skin/default/images/grey/frame_06.gif">&nbsp;</td>
            </tr>
            <tr>
                <td width="20" height="22">
                    <img src="../skin/default/images/grey/frame_07.gif" width="20" height="22" alt=""></td>
                <td background="../skin/default/images/grey/frame_08.gif">&nbsp;</td>
                <td width="21" height="22">
                    <img src="../skin/default/images/grey/frame_09.gif" width="21" height="22" alt=""></td>
            </tr>
		</table>

</div>';

require_once('admin_template.php');
?>
