<?php
error_reporting(0);
session_start(); 
include "conn.php";

if(isset($_SESSION['role'])&&($_SESSION['admin_name'])){
include "conn.php"; 
}
else{
header("location:index.php");
}
if(isset($_REQUEST['filter'])){
$stv=$_GET['filter'];
$query ="SELECT * FROM `help_enquiry` where id='$stv'";
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
$query ="SELECT * FROM `help_enquiry` where id='$rst'";
$res=mysqli_query($con,$query);
$xd=mysqli_fetch_array($res);
}
?>
<div id="content" class="container_16 clearfix">
     
      <h1>Manage News</h1>
      <table width="50%" border="1" cellspacing="0" cellpadding="0">
    <tr>
          <th scope="col">S.no</th>
          <th scope="col">Name</th>
          <th scope="col">Company Name</th>
          <th scope="col">Phone No.</th>
          <th scope="col">Email</th>
          <th scope="col">CC to</th>
          <th scope="col">Machine Name</th>
          <th scope="col">Purchase Year</th>
          <th scope="col">Ticket Type</th>
          <th scope="col">Subject</th>
          <th scope="col">Description</th>
        </tr>
<?php
  $sql=mysqli_query($con,"SELECT * FROM `help_enquiry`");
  $a=1;
  while($sql1=mysqli_fetch_array($sql))
  {
    
        $id=$sql1['id'];
        $name=$sql1['name'];
        $company_name = $sql1['company_name'];
        $phone_no = $sql1['phone_no'];
        $email =$sql1['email'];
        $cc_to =$sql1['cc_to'];
        $machine_name =$sql1['machine_name'];
        $purchase_year =$sql1['purchase_year'];
        $ticket_type =$sql1['ticket_type'];
        $subject =$sql1['subject'];
        $description =$sql1['description'];
  ?>
    <tr style="border-bottom:#999 1px solid;">
          <td><?php echo $a; ?></td>
          <td><?php echo $name; ?></td>
          <td><?php echo $company_name; ?></td>
          <td><?php echo $phone_no; ?></td>
          <td><?php echo $email; ?></td>
          <td><?php echo $cc_to; ?></td>
          <td><?php echo $machine_name; ?></td>
          <td><?php echo $purchase_year; ?></td>
          <td><?php echo $ticket_type; ?></td>
          <td><?php echo $subject; ?></td>
          <td><?php echo $description; ?></td>
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
