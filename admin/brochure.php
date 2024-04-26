<?php 
error_reporting(1);
session_start(); 
//include "conn.php";
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
$query ="select title FROM brochure where id='$stv'";

$res=mysqli_query($con,$query);

$xd=mysqli_fetch_array($res);


$res1=$xd['title'];
}
if(isset($_REQUEST['edit']) && $_REQUEST['edit']!='')
{
	
$edit=$_GET['edit'];
$query ="select * FROM brochure where id='$edit'";
$res=mysqli_query($con,$query);
$xd=mysqli_fetch_array($res);
$title=$xd['title'];
$brochure=$xd['brochure'];
} 

if(isset($_POST['update_category']))
{

$id=$_REQUEST['edit'];
$title = $_REQUEST['title'];
$file_hidden = $_REQUEST['file_hidden'];

if(isset($_FILES['imagefile']) && $_FILES['imagefile']['name']!='')
{
	$brochure = date('YmdHis').'_'.str_replace(' ','_',basename($_FILES['imagefile']['name']));
	move_uploaded_file($_FILES['imagefile']['tmp_name'],'upload/brochure/'.$brochure);
}
else if($file_hidden!='' && $_FILES['imagefile']['name']=='')
{
	$brochure= $file_hidden;
}
else
{
	$brochure = date('YmdHis').'_'.str_replace(' ','_',basename($_FILES['imagefile']));
	move_uploaded_file($_FILES['imagefile']['tmp_name'],'upload/brochure/'.$brochure);
}

$sql = "UPDATE  `brochure` SET  `title` =  '$title',`brochure` =  '$brochure' WHERE `id` =1";

$res = mysqli_query($con,$sql);
//mysqli_close($conn);
        if ($res)
	              {
	                 
					 header('location: '.PROJECT_URL.'admin/brochure.php');
					 echo "<script>window.alert('Brochure Succesfully uploded')</script>";
                 } 
       
 

  else { echo "Try again"; } 	
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
<script type="text/javascript" src="editor/ckeditor/ckeditor.js"></script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>
<body>
<h1 id="head">ProvEngineering</h1>
<?php
include('header.php');
?>
<div id="content" class="container_16 clearfix">
  <h1>Brochure</h1>
  <form action="" enctype="multipart/form-data" method="post">
    <table width="50%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>Title</td>
        <td><input type="text" name="title" value="<?php if(isset($title) && $title!='') echo $title; ?>" required="required"/></td>
      </tr>
      <tr>
        <td>Brochure</td>
        <td><input type="file" name="imagefile"  <?php if(!isset($brochure) || $brochure=='') echo 'required="required"'; ?>/>
          <?php if(isset($brochure) && $brochure!='') ?>
          <a href="upload/brochure/<?php echo $brochure; ?>" target="_blank"><?php echo end(explode('/',$brochure)); ?></a></td>
      </tr>
      <input name="id" type="hidden" value="<?php echo $stv; ?>" />
      <input name="file_hidden" type="hidden" value="<?php echo $brochure; ?>"/>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="update_category" value="Update" />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="cancle" type="reset" value="reset" /></td>
      </tr>
    </table>
  </form>
  <h1>Manage Brochure</h1>
  <table width="50%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Title</th>
      <th scope="col">Brochure</th>
      <th scope="col">Action</th>
    </tr>
    <?php
  $sql=mysqli_query($con,"select * from brochure where id='1'");
  $a=1;
  while($sql1=mysqli_fetch_array($sql))
  {
	  $id=$sql1['id'];
    $title=$sql1['title'];
    $brochure=$sql1['brochure'];
  ?>
    <tr style="border-bottom:#999 1px solid;">
      <td><?php echo $a; ?></td>
      <td><?php echo $title; ?></td>
      <td><a href="upload/brochure/<?php echo $brochure; ?>" target="_blank"><?php echo $brochure; ?></a></td>
      <td><h5><a href="brochure.php?edit=<?php echo $id ?>" style="cursor:pointer;" id="<?php echo $id ?>"> Edit </a></h5>
    </tr>
    <?php
  $a++;
  }
  ?>
  </table>
</div>
<div id="foot"> <a href="#">Contact Me</a> </div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
    </script>
</body>
</html>