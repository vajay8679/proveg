<?php

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
// Set timezone 
date_default_timezone_set('Asia/Kolkata'); 
session_start(); 

if(isset($_SESSION['role'])&&($_SESSION['admin_name']))

{

include "conn.php"; 

}

else

{

header("location:index.php");



}



if(isset($_POST['submitform']))
		{
		    $title = $_POST['name'];
		    $desc = $_POST['desc'];
			$dir="upload/slider/";
			$image=$_FILES['uploadfile']['name'];
			$temp_name=$_FILES['uploadfile']['tmp_name'];

			if($image!="")
			{
				if(file_exists($dir.$image))
				{
					$image= time().'_'.$image;
				}

				$fdir= $dir.$image;
				move_uploaded_file($temp_name, $fdir);
			}

				$query="insert IGNORE into `slider` (`id`,`image`,`title`,`description`) values ('','$fdir','$title','$desc')";
				mysqli_query($con,$query) or die(mysqli_error($con));
				
				echo "File Uploaded Suucessfully ";

		}
    if(isset($_REQUEST['filter']))
        {
        	$filter=$_GET['filter'];
        	$del=mysqli_query($con,"delete from slider where id='$filter'");
        }
        
        if(isset($_POST['update_category']))
        {
            
            $title = $_POST['name'];
		    $desc = $_POST['desc'];
			$dir="upload/slider/";
			$image=$_FILES['uploadfile']['name'];
			$temp_name=$_FILES['uploadfile']['tmp_name'];

			if($image!="")
			{
				if(file_exists($dir.$image))
				{
					$image= time().'_'.$image;
				}

				$fdir= $dir.$image;
				move_uploaded_file($temp_name, $fdir);
			}
       
        $idd = $_GET['rst'];
        $add=mysqli_query($con,"update slider SET title='$title', description='$desc',image='$fdir' where id='$idd'");
            if($add)
            {
            echo "Slider Succesfully updated";
            }
            else { echo "Try again"; }
        } 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"

	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		

		<title>ProvEngineering</title>

		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />

		<!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->

		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />

		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />

		<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

	<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>

	</head>

	<body>

		

					<h1 id="head">ProvEngineering</h1>

		


<?php

include('header.php');
if(isset($_REQUEST['rst']))
{
$rst=$_GET['rst'];
$query ="select * FROM slider where id='$rst'";

$res=mysqli_query($con,$query);

$xd=mysqli_fetch_array($res);

$image=$xd['image'];
$title=$xd['title'];
$description=$xd['description'];
}
?>

    

    

    

    <div id="content" class="container_16 clearfix">

			<h1>Add Slider</h1>

			<form action="" method="post" enctype="multipart/form-data">

            <table width="50%" border="0" cellspacing="0" cellpadding="0">

  

  <tr>

    <td>Image</td>

    <td><input type="file" name="uploadfile"></td>
   

  </tr>

  <tr>

    <td>Title</td>

    <!--<td><input name="name" type="text" style="width:233px;" required="required"/></td>-->
    <td><input name="name" value="<?php if(isset($title) && $title!='') echo $title; ?>" type="text" style="width:233px;" required="required"/></td>

  </tr>

  <tr>

    <td>Description</td>

    <!--<td><input name="desc" type="text" style="width:233px;" required="required"/></td>-->
    <td><textarea name="desc" cols="40" rows="5" ><?php if(isset($description) && $description!='') echo $description; ?></textarea></td>

  </tr>

 

   <tr>

    <td>&nbsp;</td>

   	<!--<td><input type="submit" name="submitform" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="cancle" type="reset" value="reset" /></td>-->
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

            <h1>Manage Slider</h1>

            <table width="50%" border="1" cellspacing="0" cellpadding="0">

           

  <tr>

    <th scope="col">S.no</th>

    <th scope="col">Image</th>

    <th scope="col">Title</th>

    <th scope="col">Description</th>

    <th scope="col">Action</th>

  </tr>

  

  <?php

  $sql=mysqli_query($con,"select * from slider");

  $a=1;

  while($sql1=mysqli_fetch_array($sql))

  {

	  $id=$sql1['id'];

	  $img=$sql1['image'];

    $title=$sql1['title'];

    $description=$sql1['description'];

  ?>

  <tr style="border-bottom:#999 1px solid;">

    <td><?php echo $a; ?></td>

    <td><img src="<?php echo $img ?>" alt="<?php echo $title; ?>" width="200" height="100"/></td>

    <td><?php echo $title; ?></td>

    <td><?php echo $description; ?></td>

    <td><a href="mainpage.php?filter=<?php echo $id; ?>" style="padding:0;"><h4>Delete</h4></a>&nbsp;&nbsp;<a href="mainpage.php?rst=<?php echo $id; ?>"style="padding:0;"><h4>Edit</h4></a></td>

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