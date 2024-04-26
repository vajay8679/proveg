<?php
include('conn.php');

	$filter=$_REQUEST['delid'];
	$dlt =mysql_query("select image FROM gallery_image where id='$filter'");
	$dlt1=mysql_fetch_array($dlt);
	$tit=$dlt1['image'];
	$del=mysql_query("delete from gallery_image where id='$filter'");
	if($del)
	{
		unlink($tit);
	}
	echo mysql_affected_rows();
?>