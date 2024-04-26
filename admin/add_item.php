<?php
error_reporting(0);

?>

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
if(isset($_REQUEST['filter']))
{
	
$stv=$_GET['filter'];
$query ="select title FROM tabs where id='$stv'";

$res=mysql_query($query);

$xd=mysql_fetch_array($res);


$res1=$xd['title'];
}
?>
<?php 

if(isset($_POST['submit_category']))    {

/*$imageName = $_FILES['imagefile']['name'];
$imagetmpName  = $_FILES['imagefile']['tmp_name'];
$imageSize = $_FILES['imagefile']['size'];
$imageType = $_FILES['imagefile']['type'];*/
$oid=$_POST['id'];
$name = addslashes($_REQUEST['name']);
$class = addslashes($_REQUEST['class']);
$tab = $_REQUEST['tab'];
$photo = "upload/tabs/";
$photo = $photo.basename($_FILES['imagefile']['name']);
move_uploaded_file($_FILES['imagefile']['tmp_name'],$photo);


$sql = "insert into tabs_item values('','$photo','$name','$class','$tab')";
  
$res = mysql_query($sql);
//mysql_close($conn);
        if ($res)
	              {
	                 echo "Item Succesfully uploded";
                 } 
       
 

  else { echo "Try again"; } }
?>

<?php
if(isset($_REQUEST['dlt']))
{
	$dlt=$_GET['dlt'];
/*	$dlt =mysql_query("select image FROM tabs_item where id='$dlt'");
	$dlt1=mysql_fetch_array($dlt);
	$tit=$dlt1['image'];
	unlink($tit);*/
	$del=mysql_query("delete from tabs_item where id='$dlt'");
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
			<h1>Add <?php echo $res1; ?> Item</h1>
			<form action="" enctype="multipart/form-data" method="post">
            <table width="50%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td>Image:</td>
    <td><input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
	<input type="file" name="imagefile" required="required"/></td>
  </tr>

  
  <tr>
    <td>Name:</td>
    <td><input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
	<input type="text" name="name" required="required"/></td>
  </tr>

  
  <tr>
    <td>Class and School</td>
    <td><input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
	<input type="text" name="class" required="required"/></td>
  </tr>

   <input name="id" type="hidden" value="<?php echo $stv; ?>" />
  
    <input name="tab" type="hidden" value="<?php echo $res1; ?>" readonly="readonly" style="width:233px;" required="required"/>
 
 
   <tr>
    <td>&nbsp;</td>
   	<td><input type="submit" name="submit_category" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="cancle" type="reset" value="reset" /></td>
  </tr>
</table>
            
            </form>
            <h1>Manage Items</h1>
            <table width="50%" border="1" cellspacing="0" cellpadding="0">
           
  <tr>
    <th scope="col">S.no</th>
    <th scope="col">Image</th>
    <th scope="col">Name</th>
    <th scope="col">Class</th>
    <th scope="col">Action</th>
  </tr>
  
  <?php
  $sql=mysql_query("select * from tabs_item where tab='$res1'");
  $a=1;
  while($sql1=mysql_fetch_array($sql))
  {
	  $id=$sql1['id'];
	  $img=$sql1['image'];
	  $name=$sql1['name'];
	  $class=$sql1['class'];
	  $tab=$sql1['tab'];
  ?>
  <tr style="border-bottom:#999 1px solid;">
    <td><?php echo $a; ?></td>
    <td><img src="<?php echo $img ?>" alt="<?php echo $title; ?>" width="200" height="100"/></td>
    <td><?php echo $name; ?></td>
    <td><?php echo $class; ?></td>
    
    <td><a href="add_item.php?dlt=<?php echo $id; ?>&&filter=<?php echo $stv; ?>" style="padding:0;"><h4>Delete</h4></a></td>
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