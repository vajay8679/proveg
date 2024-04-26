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

$title = addslashes($_REQUEST['title']);
 $date = $_REQUEST['date'];


$sql = "insert into events values('','$title','$date')";
  
$res = mysql_query($sql);
//mysql_close($conn);
        if ($res)
	              {
	                 echo "Event Succesfully uploded";
                 } 
       
 

  else { echo "Try again"; } }
?>

<?php
if(isset($_REQUEST['dlt']))
{
	$dlt=$_GET['dlt'];
/*	$dlt =mysql_query("select image FROM events where id='$dlt'");
	$dlt1=mysql_fetch_array($dlt);
	$tit=$dlt1['image'];
	unlink($tit);*/
	$del=mysql_query("delete from events where id='$dlt'");
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
  
  
    <?php
if(isset($_POST['update']))
{
echo '>>>'.		$title =$_POST['title'];
	$date =$_POST['date'];
	$idd=$_POST['idd'];
	$add=mysql_query("update events SET title='$title' where id='$idd'");
	
}
?>
     
    
    
    <div id="content" class="container_16 clearfix">
     <?php
if(isset($_REQUEST['rst']))
{
	
$rst=$_GET['rst'];
$query ="select title FROM events where id='$rst'";

$res=mysql_query($query);

$xd=mysql_fetch_array($res);

$title=$xd['title'];
$date1=$xd['Date'];

?>
<h1>Update Events</h1>
<form action="" enctype="multipart/form-data" method="post">
            <table width="50%" border="0" cellspacing="0" cellpadding="0">
  
 <input type="text" name="idd" value="<?php echo $rst; ?>" required="required"/>
  <tr>
    <td>Title:</td>
    <td>
	<input type="text" name="title" value="<?php echo $title; ?>" required="required"/></td>
  </tr>

  
  <tr>
    <td>Date</td>
    <td>
	<input type="text" name="date" value="<?php echo $date1; ?>" required="required"/></td>
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
    
			<h1>Add Events</h1>
			<form action="" enctype="multipart/form-data" method="post">
            <table width="50%" border="0" cellspacing="0" cellpadding="0">
  
 
  <tr>
    <td>Title:</td>
    <td>
	<input type="text" name="title" required="required"/></td>
  </tr>

  
  <tr>
    <td>Date</td>
    <td>
	<input type="text" name="date" required="required"/></td>
  </tr>

   <input name="id" type="hidden" value="<?php echo $stv; ?>" />
  
    <input name="tab" type="hidden" value="<?php echo $res1; ?>" readonly="readonly" style="width:233px;" required="required"/>
 
 
   <tr>
    <td>&nbsp;</td>
   	<td><input type="submit" name="submit_category" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="cancle" type="reset" value="reset" /></td>
  </tr>
</table>
            
            </form>
            
            <?php
			}
			?>
            <h1>Manage Events</h1>
            <table width="50%" border="1" cellspacing="0" cellpadding="0">
           
  <tr>
    <th scope="col">S.no</th>
    <th scope="col">Title</th>
    <th scope="col">Date</th>
    <th scope="col">Action</th>
  </tr>
  
  <?php
  $sql=mysql_query("select * from events");
  $a=1;
  while($sql1=mysql_fetch_array($sql))
  {
	  $id=$sql1['id'];
	  $title=$sql1['title'];
	  $date=$sql1['Date'];
  ?>
  <tr style="border-bottom:#999 1px solid;">
    <td><?php echo $a; ?></td>
    <td><?php echo $title; ?></td>
    <td><?php echo $date; ?></td>
    
    <td><h4><a href="events.php?dlt=<?php echo $id; ?>" style="padding:0;">Delete</a> &nbsp;&nbsp;<!--<a href="events.php?rst=<?php// echo $id; ?>">Edit</a>--></h4></td>
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