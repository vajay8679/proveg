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
if(isset($_REQUEST['filter'])){
$stv=$_GET['filter'];
$query ="select title FROM news where id='$stv'";
$res=mysqli_query($con,$query);
$xd=mysqli_fetch_array($res);
$res1=$xd['title'];
} 
if(isset($_POST['submit_category']))    {
/*$imageName = $_FILES['imagefile']['name'];
$imagetmpName  = $_FILES['imagefile']['tmp_name'];
$imageSize = $_FILES['imagefile']['size'];
$imageType = $_FILES['imagefile']['type'];*/

$desc = $_POST['desc']; 
$title = $_REQUEST['title'];
$date = date('Y-m-d H:i:s');
$photo = "upload/news/";
$photo = $photo.date('YmdHis').'_'.str_replace(' ','_',$_FILES['imagefile']['name']);
move_uploaded_file($_FILES['imagefile']['tmp_name'],$photo);
$sql = "insert into news values('','$photo','$title','$desc','$date')"; 
$res = mysqli_query($con,$sql);
if ($res){ echo "News Succesfully uploded"; } 
else { echo "Try again"; } }
else if(isset($_POST['update_category']))
{
$desc = $_POST['desc']; 
$title = $_REQUEST['title'];
$photo_hidden = $_REQUEST['photo_hidden'];
$date = date('Y-m-d H:i:s');
$idd = $_GET['rst'];


//Updating file thumb
if(isset($_FILES['imagefile']) && $_FILES['imagefile']['name']!='')
{
$photo = "upload/news/";
$photo = $photo.date('YmdHis').'_'.str_replace(' ','_',$_FILES['imagefile']['name']);
move_uploaded_file($_FILES['imagefile']['tmp_name'],$photo);
}
else if($photo_hidden!='' && $_FILES['imagefile']['name']=='')
{
	$photo= $photo_hidden;
}
else
{
$photo = "upload/news/";
$photo = $photo.date('YmdHis').'_'.str_replace(' ','_',$_FILES['imagefile']['name']);
move_uploaded_file($_FILES['imagefile']['tmp_name'],$photo);
}	
	 $add=mysqli_query($con,"update news SET title='$title', description='$desc',image='$photo' where id='$idd'");
			if($add)
			{
				echo "News Succesfully updated";
			}
			 else { echo "Try again"; }
} 

if(isset($_REQUEST['filter']))
{

	$filter=$_GET['filter'];

	$dlt =mysqli_query($con,"select image FROM news where id='$filter'");

	$dlt1=mysqli_fetch_array($dlt);

	$tit='admin/upload/news/'.$dlt1['image'];

	unlink($tit);

	$del=mysqli_query($con,"delete from news where id='$filter'");
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
		function DltFunction(id) {
			var txt;
			var r = confirm("Are you sure want to delete ?");
			if (r == true) {
				window.location = '?filter='+id;
			} 
			document.getElementById("demo").innerHTML = txt;
		}

	</script>
	</head>

	<body>
<h1 id="head">ProvEngineering</h1>
<?php

include('header.php');
if(isset($_REQUEST['rst']))
{
$rst=$_GET['rst'];
$query ="select * FROM news where id='$rst'";

$res=mysqli_query($con,$query);

$xd=mysqli_fetch_array($res);

$image=$xd['image'];
$title=$xd['title'];
$description=$xd['description'];
}
?>
<div id="content" class="container_16 clearfix">
      <h1>Add News</h1>
      <form action="" enctype="multipart/form-data" method="post">
    <table width="50%" border="0" cellspacing="0" cellpadding="0">
          <tr>
        <td>Image</td>
        <td><input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
              <input type="file" name="imagefile" <?php if(!isset($image) || $image=='') echo 'required="required"'; else ''; ?>/><?php if(isset($image) && $image!='') ?> <a href="<?php echo $image; ?>" target="_blank"><?php echo end(explode('/',$image)); ?></a></td>
      </tr>
          <input name="id" type="hidden" value="<?php echo $stv; ?>" />
          <input name="photo_hidden" type="hidden" value="<?php echo $image; ?>" />
          <input name="name" type="hidden" value="<?php echo $res1; ?>"/>
          <tr>
        <td>Title</td>
        <td><input name="title" value="<?php if(isset($title) && $title!='') echo $title; ?>" type="text" style="width:233px;" /></td>
      </tr>
          <tr>
        <td>Description</td>
        <td><textarea name="desc" cols="40" rows="5" ><?php if(isset($description) && $description!='') echo $description; ?></textarea></td>
      </tr>
          <tr>
        <td>&nbsp;</td>
        <td><?php if(isset($_REQUEST['rst'])){ ?>
        <input type="submit" name="update_category" value="Update" />
        <?php } else { ?>
        <input type="submit" name="submit_category" value="Submit" />
        <?php } ?>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input name="cancle" type="reset" value="reset" /></td>
      </tr>
        </table>
  </form>
      <h1>Manage News</h1>
      <table width="50%" border="1" cellspacing="0" cellpadding="0">
    <tr>
          <th scope="col">S.no</th>
          <th scope="col">Title</th>
          <th scope="col">Image</th>
          <th scope="col">Description</th>
          <th scope="col">Action</th>
        </tr>
    <?php

  $sql=mysqli_query($con,"select * from news");

  $a=1;

  while($sql1=mysqli_fetch_array($sql))

  {

	  $id=$sql1['id'];

	  $img=$sql1['image'];

    $title=$sql1['title'];

    $desc=$sql1['description'];

  ?>
    <tr style="border-bottom:#999 1px solid;">
          <td><?php echo $a; ?></td>
          <td><?php echo $title; ?></td>
          <td><img src="<?php echo $img ?>" alt="<?php echo $title; ?>" width="200" height="100"/></td>
          <td><?php echo $desc; ?></td>
          <td><h5><a onClick="DltFunction('<?php echo $id; ?>')" style="cursor:pointer;" id="<?php echo $id ?>" style="padding:0;">
        Delete </a>&nbsp;&nbsp;<a href="add_news.php?rst=<?php echo $id; ?>">Edit</a></h5>
        
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