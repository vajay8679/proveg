<?php
error_reporting(E_ALL);

session_start(); 
include "conn.php";
?>
<?php
if(isset($_REQUEST['rst']))
{
	
$rst=$_GET['rst'];
$query ="select title FROM product where id='$rst'";

$res=mysql_query($query);

$xd=mysql_fetch_array($res);

$res1=$xd['title'];
}
?>
<?php
if(isset($_REQUEST['submit_category']))
{
	$title =$_POST['name'];
	
	$del=mysql_query("update product SET Title='$title' where id='$rst'");
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Subhash  Group</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
		<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
	<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
	</head>
	<body>
		
					<h1 id="head">Subhash  Group</h1>
		
<?php
include('header.php');
?>
  
    
    
    <div id="content" class="container_16 clearfix">
			<h1>Add MENU</h1>
			<form action="" enctype="multipart/form-data" method="post">
            <table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>ADD NEW MENU</td>
    <td><input name="name" type="text" style="width:233px;" value="<?php echo $res1;  ?>" required="required"/></td>
  </tr>
 
   <tr>
    <td>&nbsp;</td>
   	<td><input type="submit" name="submit_category" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="cancle" type="reset" value="reset" /></td>
  </tr>
</table>
            
            </form>
            <h1>Menu</h1>
            <table width="50%" border="1" cellspacing="0" cellpadding="0">
           
  <tr>
    <th scope="col">S.no</th>
    <th scope="col">Title</th>
    <th scope="col">Action</th>
    <th scope="col">Action</th>
  </tr>
  
  <?php
  $sql=mysql_query("select * from product");
  $a=1;
  while($sql1=mysql_fetch_array($sql))
  {
	  $id=$sql1['id'];
	  $title=$sql1['title'];
  ?>
  <tr style="border-bottom:#999 1px solid;">
    <td><?php echo $a; ?></td>
    <td><?php echo $title; ?></td>
    <td><a href="add.php?filter=<?php echo $id; ?>" style="padding:0;"><h4>Delete</h4></a></td>
    <td><a href="update.php?rst=<?php echo $id; ?>" style="padding:0;"><h4>add</h4></a></td>
  </tr>
  <?php
  $a++;
  }
  ?>
</table>

            </div>
            
            
            
            
            
<div id="foot">
				<a href="#">Contact Me</a>
				
	</div>
    <script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
    </script>
</body>
</html>