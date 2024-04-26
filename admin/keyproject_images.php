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
if(isset($_REQUEST['filter']))
{
	
$stv=$_GET['filter'];
$query ="select title FROM keyproject where id='$stv'";

$res=mysql_query($query);

$xd=mysql_fetch_array($res);


$res1=$xd['title'];
} 

if(isset($_POST['submit_category']))    {

/*$imageName = $_FILES['imagefile']['name'];
$imagetmpName  = $_FILES['imagefile']['tmp_name'];
$imageSize = $_FILES['imagefile']['size'];
$imageType = $_FILES['imagefile']['type'];*/
$oid=$_POST['id'];
$desc = $_POST['desc']; 
$name = $_REQUEST['name'];
$photo = "upload/keyproject/$name/";
$photo = $photo.basename($_FILES['imagefile']['name']);
move_uploaded_file($_FILES['imagefile']['tmp_name'],$photo);



$sql = "insert into keyproject_image values('','$oid','$photo','$desc','$name')";
$res = mysql_query($sql);
//mysql_close($conn);
        if ($res)
	              {
	                 echo "Photo Succesfully uploded";
                 } 
       
 

  else { echo "Try again"; } }
?>

<?php
if(isset($_REQUEST['filter']))
{
	$filter=$_GET['filter'];
	$dlt =mysql_query("select image FROM keyproject_image where id='$filter'");
	$dlt1=mysql_fetch_array($dlt);
	$tit=$dlt1['image'];
	unlink($tit);
	$del=mysql_query("delete from keyproject_image where id='$filter'");
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>ProvEngineering</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
		<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
        <script type='text/javascript' src='jquery-1.9.1.js'></script>
	<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    <script type="text/javascript">
	function delete_data(el) {   
	var delid = el.id;
	
    
 	$.ajax({
    
     method : "POST",
     url  : "ajax_delete.php",
     data : "delid="+delid,
     success : function(msg)
     {
	
      if(msg>0)
      {
       location.reload();
      }
      else
      {
       alert("Something went wrong");
       
      }
     }
  });
	}
	</script>
	</head>
	<body>
		
		<h1 id="head">ProvEngineering</h1>
		
 <?php
include('header.php');
?>
  
    <div id="content" class="container_16 clearfix">
			<h1>Add <?php echo $res1; ?> Photo</h1>
			<form action="" enctype="multipart/form-data" method="post">
            <table width="50%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td>Image</td>
    <td><input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
	<input type="file" name="imagefile" required="required"/></td>
  </tr>

   <input name="id" type="hidden" value="<?php echo $stv; ?>" />
  
    <input name="name" type="hidden" value="<?php echo $res1; ?>" readonly="readonly" style="width:233px;" required="required"/>
 
 
   <tr>
   <tr>
    <td>Description</td>
    <td><input name="desc" type="text" style="width:233px;" /></td>
   </tr>
    <td>&nbsp;</td>
   	<td><input type="submit" name="submit_category" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="cancle" type="reset" value="reset" /></td>
  </tr>
</table>
            
            </form>
            <h1>Manage GALLERY</h1>
            <table width="50%" border="1" cellspacing="0" cellpadding="0">
           
  <tr>
    <th scope="col">S.no</th>
    <th scope="col">Title</th>
    <th scope="col">Image</th>
    <th scope="col">Description</th>
    <th scope="col">Action</th>
  </tr>
  
  <?php
  $sql=mysql_query("SELECT * from keyproject_image where oid='$stv'");
  $a=1;
  while($sql1=mysql_fetch_array($sql))
  {
	  $id=$sql1['id'];
	  $img=$sql1['image'];
    $title=$sql1['title'];
    $desc=$sql1['desc'];
  ?>
  <tr style="border-bottom:#999 1px solid;">
    <td><?php echo $a; ?></td>
    <td><?php echo $title; ?></td>
    <td><img src="<?php echo $img ?>" alt="<?php echo $title; ?>" width="200" height="100"/></td>
    <td><?php echo $desc; ?></td>
    
    <td><a href="keyproject_images.php?filter=<?php echo $id ?>" style="cursor:pointer;" id="<?php echo $id ?>" style="padding:0;"><h4>Delete</h4></a>
    
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