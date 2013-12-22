<? global $project; 
$project->page_title="Homepage";
?>


<? Skin("header"); ?> 

<div id='middle'>

    <div id='text_body'>
                    <table width="750" height="61" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                         <th>UFullName</th><th>UEmail</th><th>UPhone</th><th>UDesc</th><th>UAddress</th><th>P</th>
                    </tr>
                    <?
                    
                    $op=mysql_query("select * from users");
                    
                    while($row=mysql_fetch_row($op)){
                        
                        echo '<tr><form name="form1" id="update_user" method="post" action="admin_action.php?action=update_client&id='.$row[0].'&url=index.php">';
                        echo '<td><a>'.$row[1].'</a></td>';
                        echo '<td><a>'.$row[3].'</a></td>';
                        echo '<td><a>'.$row[4].'</a></td>';
                        echo '<td><a>'.$row[5].'</a></td>';
                        echo '<td><a>'.$row[6].'</a></td>';
                         echo '</form></tr>';
        
                    }
    				?>
              </table>
    </div>
          
</div>
        
        
        
<? Skin("footer"); ?>  