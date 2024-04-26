<?php

function sess_start()
{
session_start();
}

function newsession1($admin_name,$admin_pass,$role)
{

$_SESSION['admin_name']=$admin_name;
$_SESSION['admin_pass']=$admin_pass;
$_SESSION['role']=$role;

}


?>