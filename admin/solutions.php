<?php 
//echo ">>>>". $_SERVER['ROOT_DIR'];
error_reporting(1);
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
$query ="select title FROM solutions_cat where id='$stv'";

$res=mysqli_query($con,$query);

$xd=mysqli_fetch_array($res);


$res1=$xd['title'];
}
if(isset($_REQUEST['edit']) && $_REQUEST['edit']!='')
{
	
$edit=$_GET['edit'];
$query ="select * FROM solutions where id='$edit'";

$res=mysqli_query($con,$query);

$xd=mysqli_fetch_array($res);


$title=$xd['title'];
$description=$xd['description'];
$file=$xd['image'];
$thumb=$xd['thumb'];
} 

if(isset($_POST['submit_category']))    {
$oid=$_POST['id'];
$description = $_POST['description']; 
$title = $_REQUEST['title'];
$name = $_REQUEST['name'];
//$photo = "$name";
$photo = date('YmdHis').'_'.str_replace(' ','_',basename($_FILES['imagefile']['name']));
move_uploaded_file($_FILES['imagefile']['tmp_name'],'upload/solutions/'.$name.'/'.$photo);

//Upload thumbnail
$url = date('YmdHis').'_'.str_replace(' ','_',$_FILES['filename1']['name']);
//move_uploaded_file($_FILES['filename1']['tmp_name'],'upload/product/images/'.$url);
$filename = compress_image($_FILES["filename1"]["tmp_name"], "/home/provegengineerin/public_html/admin/upload/solutions/images/thumb/".$url, 80);
move_uploaded_file($_FILES['filename1']['tmp_name'],'upload/solutions/images/'.$url);
if($filename)
{
$sql = "insert into solutions values('','$oid','$photo','$description','$title','$url')"; 
$res = mysqli_query($con,$sql);
//mysqli_close($conn);
        if ($res)
	              {
					  header('location: '.PROJECT_URL.'admin/solutions.php?filter='.$_REQUEST['filter']);
	                 //echo "Product Succesfully uploded";
                 } 
				 else { echo "Try again"; } 
       
}

  else { echo "Try again"; } 
}
else if(isset($_POST['update_category']))
{
$id=$_REQUEST['edit'];
$description = $_POST['description']; 
$title = $_REQUEST['title'];
$name = $_REQUEST['name'];
$file_hidden = $_REQUEST['file_hidden'];
$thumb_hidden = $_REQUEST['thumb_hidden'];

if(isset($_FILES['imagefile']) && $_FILES['imagefile']['name']!='')
{
$photo = date('YmdHis').'_'.str_replace(' ','_',basename($_FILES['imagefile']['name']));
move_uploaded_file($_FILES['imagefile']['tmp_name'],'upload/solutions/'.$name.'/'.$photo);
}
else if($file_hidden!='' && $_FILES['imagefile']['name']=='')
{
	$photo= $file_hidden;
}
else
{
$photo = date('YmdHis').'_'.str_replace(' ','_',basename($_FILES['imagefile']));
move_uploaded_file($_FILES['imagefile']['tmp_name'],'upload/solutions/'.$name.'/'.$photo);
}

//Updating file thumb
if(isset($_FILES['filename1']) && $_FILES['filename1']['name']!='')
{
$url = date('YmdHis').'_'.str_replace(' ','_',$_FILES['filename1']['name']);

$filename = compress_image($_FILES["filename1"]["tmp_name"], '/home/provegengineerin/public_html/admin/upload/solutions/images/thumb/'.$url, 80);

move_uploaded_file($_FILES['filename1']['tmp_name'],'upload/solutions/images/'.$url);
}
else if($thumb_hidden!='' && $_FILES['filename1']['name']=='')
{
	$url= $thumb_hidden;
}
else
{
$url = date('YmdHis').'_'.str_replace(' ','_',$_FILES['filename1']['name']);
$filename = compress_image($_FILES["filename1"]["tmp_name"], '/home/provegengineerin/public_html/admin/upload/solutions/images/thumb/'.$url, 80);
move_uploaded_file($_FILES['filename1']['tmp_name'],'upload/solutions/images/'.$url);
}

$sql = "update solutions set image='$photo',description='".mysqli_real_escape_string($description)."',title='$title',thumb='$url' where id='$id'";

$res = mysqli_query($con,$sql);
//mysqli_close($conn);
        if ($res)
	              {
	                 //echo "solutions Succesfully uploded";
					 header('location: '.PROJECT_URL.'admin/solutions.php?filter='.$_REQUEST['filter']);
                 } 
       
 

  else { echo "Try again"; } 	
}
function compress_image($source_url, $destination_url, $quality) {

    $info = getimagesize($source_url);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source_url);

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source_url);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source_url);
    
	//echo '>>'.$source_url.'>>'.$destination_url.'>>'.$quality;
  
    list($width, $height) = getimagesize($source_url);
    $y = (200*$height/$width);
    $thumb = imagecreatetruecolor(200, $y);
    $source = $image;
    imagecopyresized($thumb, $source, 0, 0, 0, 0, 200,$y, $width, $height);
    imagejpeg($thumb, $destination_url, $quality);
   
    return $destination_url;
}
?>
<?php
if(isset($_REQUEST['delete']))
{
	$filter=$_GET['delete'];
	$dlt =mysqli_query($con,"select image FROM solutions where id='$filter'");
	$dlt1=mysqli_fetch_array($dlt);
	$tit=$dlt1['image'];
	unlink($tit);
	$del=mysqli_query($con,"delete from solutions where id='$filter'");
	
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
<?php if(isset($_REQUEST['edit'])){ ?>
      <h1>Update Solution</h1>
 <?php } else { ?>     
      <h1>Add <?php echo $res1; ?> Solution</h1>
<?php } ?>
      <form action="" enctype="multipart/form-data" method="post">
    <table width="50%" border="0" cellspacing="0" cellpadding="0">
          <tr>
        <td>Title</td>
        <td><input type="text" name="title" value="<?php if(isset($title) && $title!='') echo $title; ?>" required="required"/></td>
      </tr>
          <tr>
        <td>Thumb</td>
        <td><input type="file" name="filename1"  <?php if(!isset($thumb) || $thumb=='') echo 'required="required"'; ?>/>
        <?php if(isset($thumb) && $thumb!='') ?> <a href="upload/solutions/images/thumb/<?php echo $thumb; ?>" target="_blank"><?php echo end(explode('/',$thumb)); ?></a>
        </td>
      </tr>
          <tr>
        <td>File</td>
        <td><input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
              <input type="file" name="imagefile" <?php if(!isset($file) || $file=='') echo 'required="required"'; ?>/>
              <?php if(isset($file) && $file!='') ?> <a href="upload/solutions/<?php echo $res1.'/'.$file; ?>" target="_blank"><?php echo end(explode('/',$file)); ?></a></td>
      </tr>
          <input name="id" type="hidden" value="<?php echo $stv; ?>" />
          <input name="name" type="hidden" value="<?php echo $res1; ?>"/>
          <input name="file_hidden" type="hidden" value="<?php echo $file; ?>"/>
          <input name="thumb_hidden" type="hidden" value="<?php echo $thumb; ?>"/>
          <tr>
      <tr>
        <td>Description</td>
        <td><textarea class="ckeditor" rows="80" id="blogcontent" name="description"><?php if(isset($description) && $description!='') echo $description; ?></textarea>
          <script>
    CKEDITOR.replace('blogcontent', {
        filebrowserUploadUrl: "editor/ckeditor/ckupload.php",
        filebrowserBrowseUrl: "editor/ckeditor/browse.php?type=Images"
    });
    
</script></td>
      </tr>
          
        <td>&nbsp;</td>
        <td>
				<?php if(isset($_REQUEST['edit'])){ ?>
              <input type="submit" name="update_category" value="Update" />
         <?php } else { ?>     
              <input type="submit" name="submit_category" value="Submit" />
        <?php } ?>
        
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input name="cancle" type="reset" value="reset" /></td>
      </tr>
        </table>
  </form>
      <h1>Manage Products</h1>
      <table width="50%" border="1" cellspacing="0" cellpadding="0">
    <tr>
          <th scope="col">S.no</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Action</th>
        </tr>
    <?php
  $sql=mysqli_query($con,"select * from solutions where oid='$stv'");
  $a=1;
  while($sql1=mysqli_fetch_array($sql))
  {
	  $id=$sql1['id'];
    $title=$sql1['title'];
    $description=$sql1['description'];
  ?>
    <tr style="border-bottom:#999 1px solid;">
          <td><?php echo $a; ?></td>
          <td><?php echo $title; ?></td>
          <td><?php echo substr(strip_tags($description),0,150); ?></td>
          <td><h5><a href="solutions.php?filter=<?php echo $stv; ?>&edit=<?php echo $id ?>" style="cursor:pointer;" id="<?php echo $id ?>">
        Edit
        </a> &nbsp; <a href="solutions.php?delete=<?php echo $id ?>" style="cursor:pointer;" id="<?php echo $id ?>">
        Delete
        </a></h5>
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