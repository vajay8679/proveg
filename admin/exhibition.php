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

// Assuming you've already established a MySQLi connection
$mysqli = new mysqli("localhost", "root", "", "proveg");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if(isset($_POST['submit_category']))    {





$name     = $_REQUEST['name'];

$desc     = $_REQUEST['desc'];



mkdir("upload/exhibition/$name");



$sql = "insert into exhibition values('','$name','$desc')";

  

$res = mysqli_query($con,$sql);

//mysqli_close($conn);

        if ($res)

	              {

	                 echo "Exhibition Succesfully add";

                 } 

       

 



  else { echo "Try again"; } }

?>

<?php

if(isset($_REQUEST['filter']))

{

	$filter=$_GET['filter'];

	$dlt =mysqli_query($con,"select title FROM exhibition where id='$filter'");

	$dlt1=mysqli_fetch_array($dlt);

	$tit=$dlt1['title'];

	

	rmdir("upload/gallery/$tit");

	

	$del=mysqli_query($con,"delete from exhibition where id='$filter'");

	

	

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

	<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>

	</head>

	<body>

		

					<h1 id="head">ProvEngineering</h1>

		

   <?php

include('header.php');

?>

  



    <?php

if(isset($_POST['update']))

{

	$title =$_POST['name'];

	$idd=$_POST['idd'];

	$desc=$_POST['desc'];

	$add=mysqli_query($con,"update exhibition SET title='$title', details='$des' where id='$idd'");

	

}

?>

    

    <div id="content" class="container_16 clearfix">

	    <?php

if(isset($_REQUEST['rst']))

{

	

$rst=$_GET['rst'];

$query ="select * FROM exhibition where id='$rst'";



$res=mysqli_query($con,$query);



$xd=mysqli_fetch_array($res);



$res1=$xd['title'];

$desc1=$xd['details'];



?>

		<h1>Update Exhibition</h1>

			<form action="" enctype="multipart/form-data" method="post">

            <table width="50%" border="0" cellspacing="0" cellpadding="0">

            <input type="hidden" name="idd" value="<?php echo $rst; ?>" />

  <tr>

    <td>Title</td>

    <td><input name="name" type="text" style="width:233px;" value="<?php echo $res1 ?>" required/></td>

  </tr>

 <tr>

    <td>Description</td>

    <td><textarea name="desc" cols="40" rows="5"><?php echo $desc1; ?></textarea></td>

   </tr>

   <tr>

    <td>&nbsp;</td>

   	<td><input type="submit" name="update" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="cancle" type="reset" value="reset" /></td>

  </tr>

</table>

            

            </form>

            <?php

            }

			else

			{

            ?>

            <h1>Add Exhibition</h1>

			<form action="" enctype="multipart/form-data" method="post">

            <table width="50%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td>Title: </td>

    <td><input name="name" type="text" style="width:233px;" value="" required/></td>

  </tr>

 

 <tr>

    <td>Description :</td>

    <td><textarea name="desc" cols="40" rows="5"></textarea></td>

   </tr>

   <tr>

    <td>&nbsp;</td>

   	<td><input type="submit" name="submit_category" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="cancle" type="reset" value="reset" /></td>

  </tr>

</table>

            

            </form>

            <?php

			}

			?>

            <h1>Menu</h1>

            <table width="50%" border="1" cellspacing="0" cellpadding="0">

           

  <tr>

    <th scope="col">S.no</th>

    <th scope="col">Title</th>

    <th scope="col">Photos</th>

    <th scope="col">Action</th>

  </tr>

  

  <?php

  $sql=mysqli_query($con,"select * from exhibition");

  $a=1;

  while($sql1=mysqli_fetch_array($sql))

  {

	  $id=$sql1['id'];

	  $title=$sql1['title'];

	  

	  $sqll=mysqli_query($con,"select * from exhibition_image where oid='$id'");

    $num=mysqli_num_rows($sqll);  



  ?>

  <tr style="border-bottom:#999 1px solid;">

    <td><?php echo $a; ?></td>

    <td><?php echo $title; ?></td>

    <td><?php echo $num; ?> photos &nbsp; &nbsp;<a href="exhibition_images.php?filter=<?php echo $id; ?>">Add Photos</a></td>

    <td><h5><a href="exhibition.php?filter=<?php echo $id; ?>">Delete</a> &nbsp;&nbsp;<!--<a href="turnexhibition.php?rst=<?php echo $id; ?>">Edit</a>--></h5></td>

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