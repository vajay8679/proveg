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
$query ="select url FROM urltable where id='$stv'";
$res=mysqli_query($con,$query);
$xd=mysqli_fetch_array($res);
$res1=$xd['url'];
} 
if(isset($_POST['submit_category']))    {
$url = $_REQUEST['url'];
$sql = "insert into urltable values('','$url')"; 
$res = mysqli_query($con,$sql);
if ($res){ echo "URL Succesfully uploded"; } 
else { echo "Try again"; } }
else if(isset($_POST['update_category']))
{
$url = $_REQUEST['url'];
$idd = $_GET['rst'];
$add=mysqli_query($con,"update `urltable` SET url='$url' where id='$idd'");
    if($add)
    {
        echo "URL Succesfully updated";
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
$query ="SELECT * FROM `urltable` where id='$rst'";

$res=mysqli_query($con,$query);
$xd=mysqli_fetch_array($res);

$url=$xd['url'];

}
?>
<div id="content" class="container_16 clearfix">
      <h1>Add URL</h1>
      <form action="" enctype="multipart/form-data" method="post">
    <table width="50%" border="0" cellspacing="0" cellpadding="0">
          
          <tr>
        <td>URL</td>
        <td><input name="url" value="<?php if(isset($url) && $url!='') echo $url; ?>" type="text" style="width:233px;" /></td>
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
      <h1>Manage URL</h1>
      <table width="50%" border="1" cellspacing="0" cellpadding="0">
    <tr>
          <th scope="col">S.no</th>
          <th scope="col">URL</th>
          <th scope="col">Action</th>
        </tr>
    <?php

  $sql=mysqli_query($con,"SELECT * FROM `urltable`");

  $a=1;

  while($sql1=mysqli_fetch_array($sql))

  {

	  $id=$sql1['id'];
    $url=$sql1['url'];

  ?>
    <tr style="border-bottom:#999 1px solid;">
          <td><?php echo $a; ?></td>
          <td><?php echo $url; ?></td>
          
          <td><h5><a onClick="DltFunction('<?php echo $id; ?>')" style="cursor:pointer;" id="<?php echo $id ?>" style="padding:0;">
        Delete </a>&nbsp;&nbsp;<a href="add_vedio.php?rst=<?php echo $id; ?>">Edit</a></h5>
        
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