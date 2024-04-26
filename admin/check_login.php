<?php

include "conn.php";

include "functions.php";





$admin_name=$_POST['user_name'];



$admin_pass=$_POST['user_pass'];







$admin_name=mysqli_real_escape_string($con,$admin_name);

$admin_pass=mysqli_real_escape_string($con,$admin_pass);



$query=mysqli_query($con,"SELECT * FROM admin WHERE username='$admin_name' and password='$admin_pass'");;



if(mysqli_num_rows($query)==0)

{



header("location:index.php");



}

else{

$query=mysqli_query($con,"SELECT * FROM admin WHERE username='$admin_name' and password='$admin_pass' ");	

if($row=mysqli_fetch_array($query))

{

$role=$row['role'];

session_start();

newsession1($admin_name,$admin_pass,$role);

header("location:mainpage.php");

}

}



?>
