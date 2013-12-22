<?
require_once('../load.php');
checkAdmin();

$site_body="";
$site_login="";
$site_title=$tls->getOption("site_title");

$site_body.='

<div id="Main_frame">
<div id="header">
 <h3><a href="../index.php">Home</a>  > <a href="index.php">System Management</a> > Manage staff</h3>
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
                <strong>Add new client:</strong>
                <p><form name="form1" method="post" action="admin_action.php?action=add_staff&&url=admin_staff.php">
                        <table id="plist" width="750" height="61" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <th>UName</th><th>UFullName</th><th>UEmail</th><th>UPhone</th><th>UAddress</th><th>passwprd</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="UName" value=""></td>
                                <td><input type="text" name="UFullName"  value=""></td>
                                <td><input type="text" name="UEmail" value=""></td>
                                <td><input type="text" name="UPhone" value=""></td>
                                <td><input type="text" name="UAddress" value=""></td>
                                <td><input type="password" name="pw" value=""></td>
                            </tr>
                        </table>
                        <p>Description of staff:
                          <textarea name="desc" id="desc" cols="70" rows="5" 
                          style="display:block; border:1px; border-style:dashed; border-color:#999; padding:5px;"></textarea>
                          <input type="submit" name="button" id="button" value="Add staff">
                        </p>
                        </form>
				</p>

                <br><p><strong>The list of staff : </strong></p><br>
                <table id="plist" width="750" height="61" border="0" cellpadding="0" cellspacing="0">
                <tr>
                     <th>UName</th><th>UFullName</th><th>UEmail</th><th>UPhone</th><th>UDesc</th><th>UAddress</th><th>staffPos</th><th></th><th></th>
                </tr>';
				
				
                $op=mysql_query("select * from users WHERE PID=1");
                
                while($row=mysql_fetch_row($op)){
					
              $site_body.='<tr><form name="form1" id="update_user" method="post" action="admin_action.php?action=update_client&id='.$row[0].'&url=admin_staff.php">';
              $site_body.='<td><input type="text" name="UName" value="'.$row[1].'"></td>';
              $site_body.='<td><input type="text" name="UFullName"  value="'.$row[2].'"></td>';
              $site_body.='<td><input type="text" name="UEmail" value="'.$row[4].'"></td>';
              $site_body.='<td><input type="text" name="UPhone" value="'.$row[5].'"></td>';
              $site_body.='<td><input type="text" name="UDesc" value="'.$row[6].'"></td>';
              $site_body.='<td><input type="text" name="UAddress" value="'.$row[7].'"></td>';
                        
                        //Get rating information from customers table 
							$rating=mysql_query("select staffPos from staffs WHERE UserID=".$row[0]);
							$ratnum="None";
							if ($row2=mysql_fetch_row($rating)){
								$ratnum=$row2[0];
							}
						
						
                        $site_body.='<td><input type="text" name="staffPos" value="'.$ratnum.'"></td>';

                          $site_body.='<td><input type="submit" name="button" id="button" value="Update"></td>';
                         $site_body.='<td><a href="admin_action.php?action=del_staff&id='.$row[0].'&url=admin_staff.php"><img src="images/img_del.png"/></a></td></form></tr>';
	
                }
$site_body.='
          </table>
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

</div>
';

require_once('admin_template.php');
?>
