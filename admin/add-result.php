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

if (isset($_POST['submit'])) 
{
	$tbatch=$_POST['tbatch'];
	$tname=$_POST['tname'];
	$tdate=$_POST['tdate'];
	
	$insert="INSERT into result values('','$tname','$tbatch','$tdate')";
	$success=mysql_query($insert);
			
		$last_id=mysql_insert_id();
		
		if($success)
		{
			//Upload File
		 if (is_uploaded_file($_FILES['filename']['tmp_name'])) {

        echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";

       // echo "<h2>Displaying contents:</h2>";

      //  readfile($_FILES['filename']['tmp_name']);

    }

 

    //Import uploaded file to Database

    $handle = fopen($_FILES['filename']['tmp_name'], "r");
	$firstRow = true;
 

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		//exclude the first row

		if($firstRow) 
			{ 
			$firstRow = false; 
			}
		else
			{
			$import="INSERT into result_detail values('','$last_id','$data[1]','$data[4]','$data[5]','$data[6]')";
	 		mysql_query($import);
			}
 

       

    }

 

    fclose($handle);

 

    print "Import done";

 

    //view upload form

		}
	
}

?>
<?php
if(isset($_REQUEST['delete']))
{
	$filter=$_GET['delete'];
	$del=mysql_query("delete from result where id='$filter'");
	$del1=mysql_query("delete from result_detail where test_id='$filter'");	
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
    
    
    
    <div id="content" class="container_16 clearfix">
			<h1>Add Students</h1>
			<form action="" enctype="multipart/form-data" method="post">
            <table width="50%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td>CSV</td>
    <td>
	<input type="file" name="filename" required="required"/></td>
  </tr>
  <tr>
    <td>Batch</td>
    <td>
    <select name="tbatch"  required="required" >
    <option value="">Please select batch</option>
     <?php
  $sql=mysql_query("select DISTINCT batch from student");
  $a=1;
  while($sql1=mysql_fetch_array($sql))
  {
	  $batch=$sql1['batch'];
  ?>
  <option value="<?php echo $batch ?>"><?php echo $batch ?></option>
  <?php
  }
  ?>
    
    </select>
    </td>
  </tr>
  <tr>
    <td>Test Name</td>
    <td><input name="tname" type="text" style="width:233px;" required="required"/></td>
  </tr>
  <tr>
    <td>Date</td>
    <td><input name="tdate" type="text" style="width:233px;" required="required"/></td>
  </tr>
 
   <tr>
    <td>&nbsp;</td>
   	<td><input type="submit" name="submit" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="cancle" type="reset" value="reset" /></td>
  </tr>
</table>
            
            </form>
            <h1>Manage Batch</h1>
            <table width="50%" border="1" cellspacing="0" cellpadding="0">
           
  <tr>
    <th scope="col">S.no</th>
    <th scope="col">Batch</th>
    <th scope="col">Test Name</th>
    <th scope="col">Date</th>
    <th scope="col">Action</th>
  </tr>
  
  <?php
  $sql=mysql_query("select * from result");
  $a=1;
  while($sql1=mysql_fetch_array($sql))
  {
	  $batch=$sql1['batch'];
	  $test_name=$sql1['test_name'];
	  $date=$sql1['date'];
  ?>
  <tr style="border-bottom:#999 1px solid;">
    <td><?php echo $a; ?></td>
    <td><?php echo $batch; ?></td>
    <td><?php echo $test_name; ?></td>
    <td><?php echo $date; ?></td>
    <td><h4><a href="#" style="padding:0;">View</a> &nbsp; <a href="add-result.php?delete=<?php echo $sql1['id']; ?>" style="padding:0;">Delete</a></h4></td>
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