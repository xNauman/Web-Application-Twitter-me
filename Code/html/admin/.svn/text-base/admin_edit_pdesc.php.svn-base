<?
require_once('../load.php');
checkAdmin();

$site_body="";
$site_login="";
$site_title=$tls->getOption("site_title");

$site_body.='
<div id="Main_frame">
<div id="header">
 <h3><a href="../index.php">Home</a>  > <a href="index.php">System Management</a> > <a href="admin_products.php">Manage products</a> > Edit Product Description </h3>
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
                The list of products :
                </p>';
				

				
				if (isset($_GET["id"])){
					
					$op=mysql_query("select * from products Where ProductID=".$_GET["id"]);
					
					if($row=mysql_fetch_row($op)){
						
                        $site_body.='<form name="form1" method="post" action="admin_action.php?action=update_product&id='.$row[0].'&url=admin_products.php">';
                        $site_body.='<table id="plist" width="750" height="61" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Brand</th><th>Name</th><th>Price</th><th>Image-URL</th><th>P_price</th><th>Type</th><th>Size</th><th></th>
                        </tr>
						<tr>';
						
						$site_body.='<td><input type="text" name="Brand" value="'.$row[1].'"></td>';
						$site_body.='<td><input type="text" name="Name"  value="'.$row[2].'"></td>';
						$site_body.='<td><input type="text" name="Price" value="'.$row[5].'"></td>';
						$site_body.='<td><input type="text" name="Image" value="'.$row[6].'"></td>';
						$site_body.='<td><input type="text" name="P_Price" value="'.$row[7].'"></td>';
						$site_body.='<td><input type="text" name="ProductType" value="'.$row[3].'"></td>';
						$site_body.='<td><input type="text" name="stype" value="'.$row[8].'"></td>';
						$site_body.='<td><input type="submit" name="button" id="button" value="Update"></td>';
						
						$site_body.='
						</tr>
                        </table>
                        <p>Description of product:';
						
                        $site_body.='<textarea name="desc" id="desc" cols="70" rows="10" style="display:block; border:1px; border-style:dashed; border-color:#999; padding:5px;">'.$row[4].'</textarea>
                        </p>
                        </form>';
						
					}
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

</div>
';

require_once('admin_template.php');
?>
