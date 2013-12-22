
<html>
<head>
<title><? echo $site_title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" topmargin="0">
<font face="Times New Roman">
<!-- Save for Web Slices (index.psd) -->
		
        <center><? echo $site_body?>	</center>

</font>
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