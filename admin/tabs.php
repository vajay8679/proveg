<?php
error_reporting(0);
session_start(); 
include "conn.php";
if(isset($_SESSION['role'])&&($_SESSION['admin_name']))
{
include "conn.php"; 
}
else
{
header("location:index.php");

}
?>
<?php 

if(isset($_POST['submit_category']))    {


$name     = $_REQUEST['name'];

mkdir("upload/gallery/$name");

$sql = "insert into tabs values('','$name')";
  
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
  

    <?php
if(isset($_POST['update']))
{
	$title =$_POST['name'];
	$idd=$_POST['idd'];
	$add=mysql_query("update tabs SET title='$title' where id='$idd'");
	
}
?>
    
    <div id="content" class="container_16 clearfix">
	    <?php
if(isset($_REQUEST['rst']))
{
	
$rst=$_GET['rst'];
$query ="select title FROM tabs where id='$rst'";

$res=mysql_query($query);

$xd=mysql_fetch_array($res);

$res1=$xd['title'];

?>
		<h1>Update Tab</h1>
			<form action="" enctype="multipart/form-data" method="post">
            <table width="50%" border="0" cellspacing="0" cellpadding="0">
            <input type="hidden" name="idd" value="<?php echo $rst; ?>" />
  <tr>
    <td>Edit Tab</td>
    <td><input name="name" type="text" style="width:233px;" value="<?php echo $res1 ?>" required/></td>
  </tr>
 
   <tr>
    <td>&nbsp;</td>
   	<td><input type="submit" name="update" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="cancle" type="reset" value="reset" /></td>
  </tr>
</table>
            
            </form>
            <?php
            }
			
			?>
            <h1>Tabs</h1>
            <table width="50%" border="1" cellspacing="0" cellpadding="0">
           
  <tr>
    <th scope="col">S.no</th>
    <th scope="col">Title</th>
    <th scope="col">Manage</th>
    <th scope="col">Action</th>
  </tr>
  
  <?php
  $sql=mysql_query("select * from tabs");
  $a=1;
  while($sql1=mysql_fetch_array($sql))
  {
	  $id=$sql1['id'];
	  $title=$sql1['title'];
	  
	  $sqll=mysql_query("select * from tabs_item where tab='$title'");
    $num=mysql_num_rows($sqll);  

  ?>
  <tr style="border-bottom:#999 1px solid;">
    <td><?php echo $a; ?></td>
    <td><?php echo $title; ?></td>
    <td><?php echo $num; ?> Item &nbsp; &nbsp;<a href="add_item.php?filter=<?php echo $id; ?>">Add Item</a></td>
    <td><h5> &nbsp;&nbsp;<a href="tabs.php?rst=<?php echo $id; ?>">Edit</a></h5></td>
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