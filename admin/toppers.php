<?php
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

if(isset($_POST['submit_category']) > 0)    {

/*$imageName = $_FILES['imagefile']['name'];
$imagetmpName  = $_FILES['imagefile']['tmp_name'];
$imageSize = $_FILES['imagefile']['size'];
$imageType = $_FILES['imagefile']['type'];*/

$name     = $_REQUEST['name'];
$about     = $_REQUEST['about'];

$photo = "upload/toppers/";
$photo = $photo.basename($_FILES['imagefile']['name']);
move_uploaded_file($_FILES['imagefile']['tmp_name'],$photo);


$sql = "insert into toppers values('','$photo','$name','$about')";
  
$res = mysql_query($sql);
//mysql_close($conn);
        if ($res)
	              {
	                 echo "Toppers Succesfully uploded";
                 } 
       
 

  else { echo "Try again"; } }
?>
<?php
if(isset($_REQUEST['filter']))
{
	$filter=$_GET['filter'];
	$del=mysql_query("delete from toppers where id='$filter'");
	
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
			<h1>Add Topper</h1>
			<form action="toppers.php" enctype="multipart/form-data" method="post">
            <table width="50%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td>Image</td>
    <td><input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
	<input type="file" name="imagefile" required="required"/></td>
  </tr>
  <tr>
    <td>Title</td>
    <td><input name="name" type="text" style="width:233px;" required="required"/></td>
  </tr>
 
  <tr>
    <td>About</td>
    <td><input name="about" type="text" style="width:233px;" required="required"/></td>
  </tr>
 
   <tr>
    <td>&nbsp;</td>
   	<td><input type="submit" name="submit_category" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="cancle" type="reset" value="reset" /></td>
  </tr>
</table>
            
            </form>
            <h1>Manage Slider</h1>
            <table width="50%" border="1" cellspacing="0" cellpadding="0">
           
  <tr>
    <th scope="col">S.no</th>
    <th scope="col">Image</th>
    <th scope="col">Name</th>
    <th scope="col">About</th>
    <th scope="col">Action</th>
  </tr>
  
  <?php
  $sql=mysql_query("select * from toppers");
  $a=1;
  while($sql1=mysql_fetch_array($sql))
  {
	  $id=$sql1['id'];
	  $img=$sql1['image'];
	  $title=$sql1['name'];
	  $about=$sql1['about'];
  ?>
  <tr style="border-bottom:#999 1px solid;">
    <td><?php echo $a; ?></td>
    <td><img src="<?php echo $img ?>" alt="<?php echo $title; ?>" width="150" height="100"/></td>
    <td><?php echo $title; ?></td>
    <td><?php echo $about; ?></td>
    <td><a href="toppers.php?filter=<?php echo $id; ?>" style="padding:0;"><h4>Delete</h4></a></td>
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