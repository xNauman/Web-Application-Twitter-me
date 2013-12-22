<?
require_once('../load.php');
checkAdmin();

$site_body="";
$site_login="";


$site_body.='


 <h3><a href="../index.php">Home</a>  > <a href="index.php">System Management</a> > Overdue items report</h3>

		<h2> Overdue items report </h2>
		
		<table id="overdueItems" width="750" height="61" border="1">
                <tr>
                     <strong><th>Customer Name</th><th>User ID</th><th>Phone</th>
					 <th>Loan ID</th><th>State</th><th>Date Borrowed</th><th>Date Loan Ends</th>
					 <th>Product Name</th><th>Quantity on loan</th><th>Due days</th></strong>
                </tr><br>
                <input type="button" value="Print Report" onclick="window.print()" /><br><br>
';
				
				$overdueStatus = true;
                $op=mysql_query("select users.UFullName,users.UserID,users.UPhone,loan.LoanID,loan.State,loan.LoanDate,loan.LoanEndDate,products.Name,loan.Quantity from loan,users,products WHERE loan.UserID=users.UserID and loan.PID=products.ProductID");
                
                while($row=mysql_fetch_row($op)){
					$LoanEndDate = strtotime($row[6]); 
					$fd=time();
					$dateDiff =$fd - $LoanEndDate;
					$fullDays = floor($dateDiff/(60*60*24));
					
					if ($fullDays>0){
						$site_body.='<tr>';
						$site_body.='<td align=center>'.$row[0].'</td>';
						$site_body.='<td align=center>'.$row[1].'</td>';
						$site_body.='<td align=center>'.$row[2].'</td>';
						$site_body.='<td align=center>'.$row[3].'</td>';
						$site_body.='<td align=center>'.$row[4].'</td>';
						$site_body.='<td align=center>'.$row[5].'</td>';
						$site_body.='<td align=center>'.$row[6].'</td>';
						$site_body.='<td align=center>'.$row[7].'</td>';
						$site_body.='<td align=center>'.$row[8].'</td>';
						$site_body.='<td align=center>'.(string)$fullDays.'</td>';
						
						$site_body.='</tr>';				
					}
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

