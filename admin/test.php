<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
// Set timezone 
date_default_timezone_set('Asia/Kolkata'); 
		require_once("conn.php");

		if(isset($_POST['submitform']))
		{
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

				$query="insert IGNORE into `slider` (`id`,`image`) values ('','$image')";
				mysqli_query($con,$query) or die(mysqli_error($con));
				
				echo "File Uploaded Suucessfully ";

		}

?>

<!DOCTYPE html>
<html>
<head>
	<title>File Upload to Database</title>
</head>
<body>

			<div>
						<h1>File Upload with PHP and MySQLI</h1>

						<form action="" method="post" enctype="multipart/form-data">
							
							Upload Images/File : <input type="file" name="uploadfile">

						   </br>
						   
						    <button type="submit" name="submitform">Upload</button>
						</form>
			</div>


			<div>
					<h2>Show All Upload Images</h2>

					<table border="1" cellpadding="2" cellspacing="0">
							<tr>
									<th>Sr.NO</th>
									<th>Name</th>
							</tr>
					<?php
							$i=1;
							$sql="select * from `slider`";
							$qry=mysqli_query($con,$sql) or die(mysqli_error($con));

							while($row=mysqli_fetch_array($qry))
							{

					?>
							<tr>
									<td><?php  echo $i;?></td>
									<td><img src="<?php echo $row['image'];?>" width="100" height="100"></td>
							</tr>
				 <?php
				 			$i++;
				 		}
				 ?>
					</table>
			</div>

</body>
</html>