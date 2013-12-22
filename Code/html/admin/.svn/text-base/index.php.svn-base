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

<div id="options"><strong><a href="admin_products.php">Manage Products</a></strong></div>
<div id="options"><strong><a href="admin_client.php">Manage Clients</a></strong></div>
<div id="options"><strong><a href="admin_staff.php">Manage Staff</a></strong></div>
<div id="options"><strong><a href="admin_loan.php">Manage Loans</a></strong></div>
<div id="options"><strong><a href="admin_payment.php">Manage Payments</a></strong></div>
<div id="options"><strong><a href="admin_genReport.php">Generate Reports</a></strong></div>
<div id="options"><strong><a href="admin_options.php">System Option</a></strong></div>
';

require_once('admin_template.php');
?>
