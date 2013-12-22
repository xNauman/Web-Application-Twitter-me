<?
require_once('../load.php');
checkAdmin();

$site_body="";
$site_login="";
$site_title=$tls->getOption("site_title");

$site_body.='

<div id="Main_frame">
<div id="header">
 <h3><a href="../index.php">Home</a>  > <a href="index.php">System Management</a> > Manage Payments</h3>
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

                <p><strong>Overdue Payments: </strong></p><br>
                <table id="plist" width="750" height="61" border="0" cellpadding="0" cellspacing="0">
                <tr>
                     <th>PaymentID</th><th>UserID</th><th>Total</th><th>State</th><th>LoanIDList</th><th> </th><th> </th><th>Receipt</th>
                </tr>';
				
				
                $op=mysql_query("select * from payment order by PaymentID DESC");
                
                while($row=mysql_fetch_row($op)){
					
              $site_body.='<tr><form name="form1" id="update_user" method="post" action="admin_action.php?action=update_payment&id='.$row[0].'&url=admin_payment.php">';
              $site_body.='<td><input type="text" name="PaymentID" value="'.$row[0].'"></td>';
              $site_body.='<td><input type="text" name="UserID"  value="'.$row[1].'"></td>';
              $site_body.='<td>$<input type="text" name="Total" value="'.$row[2].'"></td>';
              $site_body.='<td>
			  <select name="State" id="State">';
			  	$site_body.='<option value="'.$row[3].'">'.$row[3].'</option>';
			  	if($row[3]=="Paid"){
					$site_body.='<option value="Unpaid">Unpaid</option>';
				}
				if($row[3]=="Unpaid"){
					$site_body.='<option value="Paid">Paid</option>';
				}
				  
			$site_body.='</select></td>';
			
              $site_body.='<td><input type="text" name="LoanIDList" value="'.$row[4].'"></td>';

              $site_body.='<td><input type="submit" name="button" id="button" value="Update"></td>';
              $site_body.='<td><a href="admin_action.php?action=del_payment&id='.$row[0].'&url=admin_payment.php"><img src="images/img_del.png"/></a></td>';
			  $site_body.='<td><a href="../receipt.php?id='.$row[0].'" target="_blank">Receipt</a></td></form></tr>';
	
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
