<?php
session_start();
session_destroy();
session_unset();
unset($_SESSION[admin_pass]);
unset($_SESSION[admin_name]);
unset($_SESSION[role]);

header("Location:../index.php");

?>