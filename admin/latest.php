<?php
session_start(); 
include "conn.php";
if(isset($_SESSION['role'])&&($_SESSION['admin_name']))
{
include "conn.php"; 
}
else
{
header("location:../index.php");

}
?>
<?php 

if(isset($_POST['submit_category']) > 0)    {


$name     = $_REQUEST['name'];



$sql = "insert into product values('','$name') ";
  
$res = mysql_query($sql);
//mysql_close($conn);
        if ($res)
	              {
	                 echo "Menu Succesfully add";
                 } 
       
 

  else { echo "Try again"; } }
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
			<h1>MENU</h1>
			<form action="" enctype="multipart/form-data" method="post">
            <table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Add Menu</td>
    <td><input name="name" type="text" style="width:233px;" required="required"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
   	<td><input type="submit" name="submit_category" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="cancle" type="reset" value="reset" /></td>
  </tr>
</table>
            
            </form>
            <h1>Manage MENU</h1>
            <table width="50%" border="1" cellspacing="0" cellpadding="0">
           
  <tr>
    <th scope="col">S.no</th>
    <th scope="col">Title</th>
   	 <th scope="col">ACTION</th>
    
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