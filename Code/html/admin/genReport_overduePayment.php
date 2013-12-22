<?
require_once('../load.php');
checkAdmin();

$site_body="";
$site_login="";


$site_body.='


 <h3><a href="../index.php">Home</a>  > <a href="index.php">System Management</a> > Overdue payments report</h3>

		<h2> Overdue payments report </h2>
		
		<table id="plist" width ="750" border="1">
                <tr>
                     <strong><th>Customer Name</th><th>User ID</th><th>Loan ID</th><th>State</th><th>Date Borrowed</th><th>Date Loan Ends</th><th>Quantity on loan</th><th></th></strong>
                </tr>
                <input type="button" value="Print Report" onclick="window.print()" /><br><br>
';
				
				$loanStatus = "unpaid";
                $op=mysql_query("select * from loan, users WHERE loan.State='$loanStatus' AND loan.UserID=users.UserID");
                
                while($row=mysql_fetch_row($op)){
                 	$site_body.='<tr>';
	               $site_body.='<td align=center>'.$row[9].'</td>';
	               $site_body.='<td align=center>'.$row[1].'</td>';
	               $site_body.='<td align=center>'.$row[0].'</td>';
	               $site_body.='<td align=center>'.$row[2].'</td>';
	               $site_body.='<td align=center>'.$row[3].'</td>';
	               $site_body.='<td align=center>'.$row[4].'</td>';	
	               $site_body.='<td align=center>'.$row[6].'</td>';
	               $site_body.='</tr>';				
                }
$site_body.=' </table>';
		

            /*
            	$loanStatus = "unpaid";
        		$op=mysql_query("select * from loan, users WHERE loan.State='$loanStatus' AND loan.UserID=users.UserID");  		
         
      			while($row=mysql_fetch_row($op)){
                            
                $site_body.='<b><tr>Customer Name: </b>'.$row[9].'</tr>';
      			$site_body.='<b><tr>User ID:'.$row[1].'</tr>';
                $site_body.='<b><tr>Loan ID:'.$row[0].'</tr>';
                $site_body.='<b><tr>State:'.$row[2].'</tr>';
                $site_body.='<b><tr>Date Borrowed: '.$row[3].'</tr>';
                $site_body.='<b><tr>Date Loan Ends:'.$row[4].'</tr>';               
                $site_body.='<b><tr>Quantity in loan'.$row[6].'</tr>';

        		}*/



require_once('admin_template.php');
?>

