<?
require_once('../load.php');
checkAdmin();

$site_body="";
$site_login="";
$site_title=$tls->getOption("site_title");

$site_body.='
<div id="header">
 <h3><a href="../index.php">Home</a>  > System Management</h3>
</div>
<center>
<div id="options"><strong><a href="genReport_overdueItem.php">Overdue Item Report</a></strong></div>
<div id="options"><strong><a href="genReport_overduePayment.php">Overdue Payment Report</a></strong></div>
<div id="options"><strong><a href="#">Activity Report</a></strong></div>
</center>
';

require_once('admin_template.php');
?>
