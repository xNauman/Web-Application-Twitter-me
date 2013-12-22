<?
require_once('../load.php');
checkAdmin();

$site_body="";
$site_login="";
$site_title=$tls->getOption("site_title");

$site_body.='

<div id="Main_frame">
<div id="header">
 <h3><a href="../index.php">Home</a>  > <a href="index.php">System Management</a> > Manage products</h3>
</div>
        <table id="Table_01" width="600" height="61" border="0" cellpadding="0" cellspacing="0">
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
                <strong>Add new products:</strong><a href="../up.php" target="_blank"> [ Upload images ] </a>
                <p><form name="form1" method="post" action="admin_action.php?action=add_product&&url=admin_products.php">
                        <table id="plist" width="750" height="61" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <th>Brand</th><th>Name</th><th>Image-URL</th><th>Toy Price</th><th>ProductType</th><th></th><th></th>
                            </tr>
                            <tr>
                                <td><input type="text" name="Brand" value=""></td>
                                <td><input type="text" name="Name"  value=""></td>

                                <td><input type="text" name="Image" value=""></td>
                                <td><input type="text" name="P_Price" value=""></td>
								<td><input type="text" name="ProductType" value=""></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                        <p>Description of product:
                          <textarea name="desc" id="desc" cols="70" rows="5" 
                          style="display:block; border:1px; border-style:dashed; border-color:#999; padding:5px;"></textarea>
                          <input type="submit" name="button" id="button" value="Add product">
                        </p>
                        </form>
				</p>

                <br><p><strong>The list of products : </strong></p><br>
                <table id="plist" width="750" height="61" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <th>Brand</th><th>Name</th><th>Rent Price</th><th>Image-URL</th><th>Toy Price</th><th>ProductType</th><th>stype</th><th></th><th>Action</th><th></th>
                </tr>';
				
				
                $op=mysql_query("select * from products");
                
                while($row=mysql_fetch_row($op)){
					
              	$site_body.='<tr><form name="form1" method="post" action="admin_action.php?action=update_product&id='.$row[0].'&url=admin_products.php">';
                        $site_body.='<td><input type="text" name="Brand" value="'.$row[1].'"></td>';
                        $site_body.='<td><input type="text" name="Name"  value="'.$row[2].'"></td>';
                        $site_body.='<td><input type="text" name="Price" value="'.$row[5].'"></td>';
                        $site_body.='<td><input type="text" name="Image" value="'.$row[6].'"></td>';
                        $site_body.='<td><input type="text" name="P_Price" value="'.$row[7].'"></td>';
						
						
						$site_body.='<td>';
								$site_body.='<select name="ProductType" id="ProductType">';
								$site_body.='<option value="'.$row[3].'">'.$row[3].'</option>';
								$site_body.='<option value="OutsideToys">Outside Toys</option>';
								$site_body.='<option value="ElectronicToys">Electronic Toys</option>';
								$site_body.='<option value="EducationalToys">Educational Toys</option>';
								$site_body.='<option value="PoolToys">Pool Toys</option>';
								$site_body.='<option value="GirlsToys">Girls Toys</option>';
								$site_body.='<option value="BoysToys">Boys Toys</option>';
								$site_body.='</select>';
						
						$site_body.='</td>';
						
						
						
						$site_body.='<td><input type="text" name="stype" value="'.$row[8].'"></td>';
                        $site_body.='<td><input type="submit" name="button" id="button" value="Update"></td>';
                        $site_body.='<td><a href="admin_edit_pdesc.php?id='.$row[0].'"><img src="images/img_edit.png"/></a></td>';
                        $site_body.='<td><a href="admin_action.php?action=del_product&id='.$row[0].'&url=admin_products.php"><img src="images/img_del.png"/></a></td></form> </tr>';
					
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
