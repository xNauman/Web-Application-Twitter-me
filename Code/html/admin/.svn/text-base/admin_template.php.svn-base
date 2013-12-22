<? global $tls,$site_body,$site_title,$site_login; ?>
<html>
<head>
<title><? echo $site_title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="admin.css" />
<link rel="stylesheet" type="text/css" href="../<? spath()?>style.css" />
<style type="text/css">
<!--
body {background-image: url(images/admin_index_01.gif);text-align:center;}
-->
</style></head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" topmargin="0">
<!-- Save for Web Slices (index.psd) -->
<table id="Table_01" width="807" height="200" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="25" rowspan="3" valign="top" background="images/admin_index_01.gif">
</td>
		<td colspan="2">
			<img src="images/admin_index_02.gif" width="166" height="1" alt=""></td>
		<td rowspan="2">
			<img src="images/admin_index_03.gif" width="64" height="185" alt=""></td>
		<td colspan="2">
			<img src="images/admin_index_04.gif" width="543" height="1" alt=""></td>
		<td rowspan="2">
			<img src="images/admin_index_05.gif" width="9" height="185" alt=""></td>
  </tr>
	<tr>
		<td width="33" rowspan="2" valign="top" background="images/admin_index_06.gif"></td>
		<td height="184">
			<img src="images/admin_index_07.gif" width="133" height="184" alt=""></td>
		<td>
			<img src="images/admin_index_08.gif" alt="" width="458" height="184" border="0" usemap="#Map"></td>
		<td>
			<img src="images/admin_index_09.gif" alt="" width="85" height="184" border="0" usemap="#Map2"></td>
	</tr>
	<tr>
		<td width="458" height="15" colspan="3" valign="top" style="background:#FFF;">
    </td>
		<td width="85">&nbsp;</td>
		<td width="9">&nbsp;</td>
	</tr>
</table>
<!-- End Save for Web Slices -->
<div id="Main_frame"> <? echo $site_body?></div>
<map name="Map">
  <area shape="rect" coords="166,66,238,141" href="../index.php">
  <area shape="rect" coords="239,73,292,131" href="../cart.php">
  <area shape="rect" coords="371,47,429,97" href="../search.php">
  <area shape="rect" coords="332,97,394,147" href="../orders.php">
</map>

<map name="Map2">
  <area shape="rect" coords="4,87,52,136" href="../help.php">
</map>
</body>
</html>
<?
if ($tls->message!=""){
	?>
	<script language="javascript">
	alert("<? echo $tls->message;?>");
	</script>
	<?
}

?>