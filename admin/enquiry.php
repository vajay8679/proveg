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
$query ="SELECT * FROM `enquiry` where id='$stv'";
$res=mysqli_query($con,$query);
$xd=mysqli_fetch_array($res);
$res1=$xd['title'];
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
$query ="SELECT * FROM `enquiry` where id='$rst'";

$res=mysqli_query($con,$query);

$xd=mysqli_fetch_array($res);

$image=$xd['image'];
$title=$xd['title'];
$description=$xd['description'];
}
?>
<div id="content" class="container_16 clearfix">
     
      <h1>Manage News</h1>
      <table width="50%" border="1" cellspacing="0" cellpadding="0">
    <tr>
          <th scope="col">S.no</th>
          <th scope="col">Interest</th>
          <th scope="col">Name</th>
          <th scope="col">Company</th>
          <th scope="col">Address</th>
          <th scope="col">Country</th>
          <th scope="col">Phone</th>
          <th scope="col">Email</th>
          <th scope="col">Requirements</th>
        </tr>
    <?php

  $sql=mysqli_query($con,"SELECT * FROM `enquiry`");

  $a=1;

  while($sql1=mysqli_fetch_array($sql))

  {

	    $id=$sql1['id'];

	    $interest=$sql1['interest'];

        $name=$sql1['name'];

        $company = $sql1['company'];

        $address = $sql1['address'];

        $country =$sql1['country'];
        $phone =$sql1['phone'];
        $email =$sql1['email'];
        $requirements =$sql1['requirements'];

  ?>
    <tr style="border-bottom:#999 1px solid;">
          <td><?php echo $a; ?></td>
          <td><?php echo $interest; ?></td>
          <td><?php echo $name; ?></td>
          <td><?php echo $company; ?></td>
          <td><?php echo $address; ?></td>
          <td><?php echo $country; ?></td>
          <td><?php echo $phone; ?></td>
          <td><?php echo $email; ?></td>
          <td><?php echo $requirements; ?></td>
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
