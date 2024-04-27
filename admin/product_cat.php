<?php
error_reporting(0);
session_start(); 
//include "conn.php";
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
$slug     = preg_replace('/[^A-Za-z0-9-]+/', '-', $name); 

$get_exist =mysqli_query($con,"select title FROM product_cat where title='$name'");
if(mysqli_num_rows($get_exist) < 1)
{
//Uploading thumb
$url = date('YmdHis').'_'.str_replace(' ','_',$_FILES['filename1']['name']);

$filename = compress_image($_FILES["filename1"]["tmp_name"], "/home/provegengineerin/public_html/admin/upload/product/images/thumb/".$url, 80);
//echo '>>>>>>>>>>'.$url; die;
move_uploaded_file($_FILES['filename1']['tmp_name'],'upload/product/images/thumb/'.$url);

if(is_dir("upload/product/".$name) || mkdir("upload/product/$name",0777,true))
{
//Uploading Brochure
$brochure = date('YmdHis').'_'.str_replace(' ','_',$_FILES['imagefile']['name']);
move_uploaded_file($_FILES['imagefile']['tmp_name'],'upload/product/'.$name.'/'.$brochure);

$sql1 = "insert into product_cat( `parent_id`, `title`,`slug`,`thumb`,`brochure`) values('$parent','$name','$slug','$url','$brochure')";
 
$res = mysqli_query($con,$sql1);
//mysqli_close($conn);
        if ($res)
	              {
	                 echo "Product Category Succesfully add";
                 } 
       else { echo "Try again"; }
 
}
 }
 else { echo 'Product Category already exists.'; }
}
 else if(isset($_POST['update_category']))
{
	$idd=$_POST['idd'];
	$parent     = $_REQUEST['parent'];
	$name     = trim($_REQUEST['name']);
  // Convert the string to lowercase
  $slug     = preg_replace('/[^A-Za-z0-9-]+/', '-', $name); 

	$old_name = $_REQUEST['old_name'];
	$thumb_hidden = $_REQUEST['thumb_hidden'];
	$brochure_hidden = $_REQUEST['brochure_hidden'];
	
//Updating file thumb
if(isset($_FILES['filename1']) && $_FILES['filename1']['name']!='')
{
$photo = date('YmdHis').'_'.str_replace(' ','_',$_FILES['filename1']['name']);

$filename = compress_image($_FILES["filename1"]["tmp_name"], '/home/provegengineerin/public_html/admin/upload/product/images/thumb/'.$photo, 80);

move_uploaded_file($_FILES['filename1']['tmp_name'],'upload/product/images/'.$photo);
}
else if($thumb_hidden!='' && $_FILES['filename1']['name']=='')
{
	$photo= $thumb_hidden;
}
else
{
$photo = date('YmdHis').'_'.str_replace(' ','_',$_FILES['filename1']['name']);
$filename = compress_image($_FILES["filename1"]["tmp_name"], '/home/provegengineerin/public_html/admin/upload/product/images/thumb/'.$photo, 80);
move_uploaded_file($_FILES['filename1']['tmp_name'],'upload/product/images/'.$photo);
}

//echo "upload/product/".$old_name,"upload/product/".$name;
	// if(is_dir("upload/product/".$name) || rename("upload/product/".$old_name,"upload/product/".$name))	
	// 	{
      // print_r($slug);die;
     
			if(isset($_FILES['imagefile']) && $_FILES['imagefile']['name']!='')
			{
			//Uploading Brochure
      
			$brochure = date('YmdHis').'_'.str_replace(' ','_',$_FILES['imagefile']['name']);
			move_uploaded_file($_FILES['imagefile']['tmp_name'],'upload/product/'.$name.'/'.$brochure);
			}
			else if($brochure_hidden!='' && $_FILES['imagefile']['name']=='')
			{
				$brochure= $brochure_hidden;
			}
			else
			{
			//Uploading Brochure
			$brochure = date('YmdHis').'_'.str_replace(' ','_',$_FILES['imagefile']['name']);
			move_uploaded_file($_FILES['imagefile']['tmp_name'],'upload/product/'.$name.'/'.$brochure);
			}
     

			//echo "update product_cat SET title='$name', parent_id='$parent',thumb='$photo',brochure='$brochure' where id='$idd'"; //die;
			$add=mysqli_query($con,"update product_cat SET title='$name',slug='$slug', parent_id='$parent',thumb='$photo',brochure='$brochure' where id='$idd'");
			if($add)
			{
				echo "Product Category Succesfully updated";
			}
    // }
		// 	 else { echo "Try again"; }
		
} 
		
function compress_image($source_url, $destination_url, $quality) {

    $info = getimagesize($source_url);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source_url);

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source_url);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source_url);
    
	//echo '>>'.$source_url.'>>'.$destination_url.'>>'.$quality;
  
    list($width, $height) = getimagesize($source_url);
    $y = (150*$height/$width);
    $thumb = imagecreatetruecolor(150, $y);
    $source = $image;
    imagecopyresized($thumb, $source, 0, 0, 0, 0, 150,$y, $width, $height);
    imagejpeg($thumb, $destination_url, $quality);
   
    return $destination_url;
}

if(isset($_REQUEST['filter']))
{
	$filter=$_GET['filter'];
	$dlt =mysqli_query($con,"SELECT title FROM product_cat where id='$filter'");
	$dlt1=mysqli_fetch_array($dlt);
	//$tit=str_replace(' ','_',$dlt1['title']);
	$tit=$dlt1['title'];
	//echo "upload/product/$tit";
	rmdir("upload/product/".$tit);
	$del=mysqli_query($con,"delete from product_cat where id='$filter'");
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
?>
<div id="content" class="container_16 clearfix">
  <?php
if(isset($_REQUEST['rst']))
{
	
  
$rst=$_GET['rst'];
$query ="select * FROM product_cat where id='$rst'";

$res=mysqli_query($con,$query);

$xd=mysqli_fetch_array($res);

$parent_id=$xd['parent_id'];
$title=$xd['title'];
$thumb=$xd['thumb'];
$brochure=$xd['brochure'];

?>
  <h1>Update Product Category</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <table width="50%" border="0" cellspacing="0" cellpadding="0">
      <input type="hidden" name="idd" value="<?php echo $rst; ?>" />
      <input type="hidden" name="old_name" value="<?php echo $title; ?>" />
      <input name="thumb_hidden" type="hidden" value="<?php echo $thumb; ?>"/>
      <input name="brochure_hidden" type="hidden" value="<?php echo $brochure; ?>"/>
      <tr>
        <td>Parent: </td>
        
        <td>
          <select name="parent" style="width:200px;">
            <option value="0">Root</option>
            <?php
    // Assuming you have already established a database connection
    // $connection = mysqli_connect("localhost", "root", "", "proveg");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $query = "SELECT * FROM product_cat";
    $res = mysqli_query($con, $query);
    
    while ($xd = mysqli_fetch_array($res)) {
        $selected = ($xd['id'] == $parent_id) ? 'selected="selected"' : '';
        echo '<option value="'.$xd['id'].'" '.$selected.'>'.$xd['title'].'</option>';
    }

    // Close the connection
    // mysqli_close($con);
?>

          </select>
        </td>

      </tr>
      
      <tr>
        <td>Thumb</td>
        <td><input type="file" name="filename1" />
          <?php if($thumb) { $tmp = explode('/', $thumb); ?>
          
          <a href="upload/product/images/thumb/<?php echo $thumb; ?>" target="_blank"><?php echo end($tmp); ?></a>
          <?php } ?>
          </td>
      </tr>
      
      <tr>
        <td>Brochure</td>
        <td><input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
          <input type="file" name="imagefile" <?php if(!isset($brochure) || $brochure=='') echo 'required="required"'; ?>/>
          <?php if(isset($brochure) && $brochure!='') {  $tmp = explode('/', $brochure); ?>
          <a href="upload/product/<?php echo $title.'/'.$brochure; ?>" target="_blank"><?php echo end($tmp); ?></a> <?php } ?></td>
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
  <?php } else { ?>

  <h1>Add Product Category</h1>
  <form action="" enctype="multipart/form-data" method="post">
    <table width="50%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>Parent: </td>
        <td><select name="parent" style="width:200px;">
            <option value="0">Root</option>
            <?php
			$query ="SELECT * FROM product_cat";

			$res=mysqli_query($con,$query);
			
			while($xd=mysqli_fetch_array($res)){
            echo '<option value="'.$xd['id'].'">'.$xd['title'].'</option>';
            
             } ?>
          </select></td>
      </tr>
        </tr>
      
      <tr>
        <td>Thumb</td>
        <td><input type="file" name="filename1" required="required"/>
        <?php if($thumb) {   $tmp = explode('/', $thumb); ?>
          <a href="upload/product/images/<?php echo $thumb; ?>" target="_blank"><?php echo end($tmp); ?></a>
      	<?php } ?>
       </td> </tr>
      <tr>
        <td>Brochure</td>
        <td><input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
          <input type="file" name="imagefile" required="required"/></td>
      </tr>
      <tr>
        <td>Title: </td>
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
      <th scope="col">Thumb</th>
      <th scope="col">Title</th>
      <th scope="col">Products</th>
      <th scope="col">Action</th>
    </tr>
    <?php
  $sql=mysqli_query($con,"SELECT * from product_cat");
  $a=1;
  while($sql1=mysqli_fetch_array($sql))
  {
	  $id=$sql1['id'];
	  $title=$sql1['title'];
	  $thumb=$sql1['thumb'];
	  
	  $sqll=mysqli_query($con,"SELECT * from products where oid='$id'");
    $num=mysqli_num_rows($sqll);  
  ?>
    <tr style="border-bottom:#999 1px solid;">
      <td><?php echo $a; ?></td>
      <td><?php if($thumb!='') { ?>
        <img src="upload/product/images/thumb/<?php echo $thumb; ?>" width="100" />
        <?php } ?></td>
      <td><?php echo $title; ?></td>
      <td><a href="products.php?filter=<?php echo $id; ?>"><?php echo $num; ?> products</a></td>
      <td><h5><a href="javascript:void(0);" onClick="DltFunction('<?php echo $id; ?>')">Delete</a> &nbsp;&nbsp;<a href="product_cat.php?rst=<?php echo $id; ?>">Edit</a></h5></td>
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