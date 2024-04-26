<?php 
	include("conn.php"); 
?>
				
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>provegEngineering</title>
<style type="text/css">
body { background-color:#CCC;
		background-image:url(img/yabig.png);
		background-repeat:no-repeat;
		background-position:center;
		}

table.login { background-color:#999;
		margin:0px auto;
		margin-top:250px;
		border-radius:5px;
		padding:8px;		
}

table.login td input{border-radius:5px; padding:2px;}
		

</style>
</head>

<body>
<form action="check_login.php" method="post" >
<table class="login">
<tr>
<td>Username:</td>
<td><input type="text" name="user_name" /></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>Password:</td>
<td><input type="password" name="user_pass" /></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="" value="Submit" /></td>
</tr>

</table>
</form>
</body>
</html>
