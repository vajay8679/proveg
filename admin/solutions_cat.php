<?php

error_reporting(1);
session_start(); 
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

if(isset($_POST['submit_category']))    {


$parent     = $_REQUEST['parent'];
$name     = trim($_REQUEST['name']);

$get_exist =mysqli_query($con,"select title FROM solutions_cat where title='$name'");
if(mysqli_num_rows($get_exist) < 1)
{
//$name_fol= str_replace(' ','_',$name);
if(mkdir("upload/solutions/$name"))
{
$sql = "insert into solutions_cat( `parent_id`, `title`) values('$parent','$name')";
  
$res = mysqli_query($con,$sql);
//mysqli_close($conn);
        if ($res)
	              {
	                 echo "Solution Category Succesfully add";
                 } 
       else { echo "Try again"; }
 
}
else if(isset($_POST['update_category']))
{
	$idd=$_POST['idd'];
	$parent     = $_REQUEST['parent'];
	$name     = trim($_REQUEST['name']);
	$old_name = $_REQUEST['old_name'];
	//$name_fol= str_replace(' ','_',$name);
	
	//$old_name =  str_replace(' ','_',$old_name);
	
	if(rename("upload/solutions/".$old_name,"upload/solutions/".$name))	
		{
			$add=mysqli_query($con,"update solutions_cat SET title='$name', parent_id='$parent' where id='$idd'");
			if($add)
			{
				echo "Solution Category Succesfully updated";
			}
			 else { echo "Try again"; }
		}
} } else { echo 'Solution Category already exists.'; } }
?>
<?php
if(isset($_REQUEST['delete']))
{
	$filter=$_GET['delete'];
	$dlt =mysqli_query($con,"select title FROM solutions_cat where id='$filter'");
	$dlt1=mysqli_fetch_array($dlt);
	$tit=str_replace(' ','_',$dlt1['title']);
	
	rmdir("upload/solutions/$tit");
	
	$del=mysqli_query($con,"delete from solutions_cat where id='$filter'");
	
	
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
<script>
function DltFunction(id) {
    var txt;
    var r = confirm("Are you sure want to delete ?");
    if (r == true) {
        window.location = '?delete='+id;
    } 
    document.getElementById("demo").innerHTML = txt;
}
</script>
</head>
<body>
<h1 id="head">ProvEngineering</h1>
<?php
include('header.php');
?>
<div id="content" class="container_16 clearfix">
  <?php
if(isset($_REQUEST['rst']))
{
	
$rst=$_GET['rst'];
$query ="select * FROM solutions_cat where id='$rst'";

$res=mysqli_query($con,$query);

$xd=mysqli_fetch_array($res);

$parent_id=$xd['parent_id'];
$title=$xd['title'];

?>
  <h1>Update Solution Category</h1>
  <form action="" method="post">
    <table width="50%" border="0" cellspacing="0" cellpadding="0">
      <input type="hidden" name="idd" value="<?php echo $rst; ?>" />
      <input type="hidden" name="old_name" value="<?php echo $title; ?>" />
      <tr>
        <td>Parent: </td>
        <td><select name="parent" style="width:200px;">
            <option value="0">Root</option>
            <?php
			$query ="select * FROM solutions_cat";

			$res=mysqli_query($con,$query);
			
			while($xd=mysqli_fetch_array($res)){
				if($xd['id']==$parent_id) $selected= 'selected="selected"';  else $selected='';
            echo '<option value="'.$xd['id'].'" '.$selected.'>'.$xd['title'].'</option>';
            
             } ?>
          </select></td>
      </tr>
      <tr>
        <td>Title</td>
        <td><input name="name" type="text" style="width:233px;" value="<?php echo $title ?>" required/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="update_category" value="Update" />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="cancle" type="reset" value="reset" /></td>
      </tr>
    </table>
  </form>
  <?php
            }
			else
			{
            ?>
  <h1>Add Solution Category</h1>
  <form action="" enctype="multipart/form-data" method="post">
    <table width="50%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>Parent: </td>
        <td><select name="parent" style="width:200px;">
            <option value="0">Root</option>
            <?php
			$query ="select * FROM solutions_cat";

			$res=mysqli_query($con,$query);
			
			while($xd=mysqli_fetch_array($res)){
            echo '<option value="'.$xd['id'].'">'.$xd['title'].'</option>';
            
             } ?>
          </select></td>
      </tr>
      <tr>
        <td>Category: </td>
        <td><input name="name" type="text" style="width:233px;" value="" required/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="submit_category" value="Submit" />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="cancle" type="reset" value="reset" /></td>
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
      <th scope="col">Products</th>
      <th scope="col">Action</th>
    </tr>
    <?php
  $sql=mysqli_query($con,"select * from solutions_cat");
  $a=1;
  while($sql1=mysqli_fetch_array($sql))
  {
	  $id=$sql1['id'];
	  $title=$sql1['title'];
	  
	  $sqll=mysqli_query($con,"select * from solutions where oid='$id'");
    $num=mysqli_num_rows($sqll);  

  ?>
    <tr style="border-bottom:#999 1px solid;">
      <td><?php echo $a; ?></td>
      <td><?php echo $title; ?></td>
      <td><a href="solutions.php?filter=<?php echo $id; ?>"><?php echo $num; ?> products</a></td>
      <td><h5><a href="javascript:void(0);" onClick="DltFunction('<?php echo $id; ?>')">Delete</a> &nbsp;&nbsp;<a href="solutions_cat.php?rst=<?php echo $id; ?>">Edit</a></h5></td>
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