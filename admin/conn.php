<?php
#-------------------------------------------------------------------------------
# PATH SETTINGS
#-------------------------------------------------------------------------------
define('ROOT_DIR', "/");
define('ADMIN_DIR', "/admin");
define('IMAGES_DIR', "/images");
define('CSS_DIR', "/css");

#-------------------------------------------------------------------------------
# PROJECT ROOT
#-------------------------------------------------------------------------------
$lastchar = substr($_SERVER['DOCUMENT_ROOT'], -1, 1);
if ($lastchar == '/') {
    $root = substr($_SERVER['DOCUMENT_ROOT'], 0, -1);
    define('PROJECT_ROOT', $root . ROOT_DIR);
} else {
    define('PROJECT_ROOT', $_SERVER['DOCUMENT_ROOT'] . ROOT_DIR);
}



#-------------------------------------------------------------------------------
# DEFINE HOST NAME
#-------------------------------------------------------------------------------
define('HOST_NAME', $_SERVER['HTTP_HOST']);

#-------------------------------------------------------------------------------
# DEFINE TABLE PREFIX
#-------------------------------------------------------------------------------



#-------------------------------------------------------------------------------
# URL SETTINGS
#-------------------------------------------------------------------------------

if (!isset($_SERVER['HTTPS']) || ($_SERVER['HTTPS'] == "off")) {
    define('HTTPS_MODE', "off");
    define('PROJECT_URL', "http://" . $_SERVER["HTTP_HOST"] . ROOT_DIR);
} else {
    define('HTTPS_MODE', "on");
    define('PROJECT_URL', "https://" . $_SERVER["HTTP_HOST"] . ROOT_DIR);
}




#-------------------------------------------------------------------------------
# DEFINE DIFFERENT URLS
#-------------------------------------------------------------------------------
define('CSS_URL', PROJECT_URL . CSS_DIR);

$con = mysqli_connect("localhost","u295964305_proveg","4?mIRqI5SPs","u295964305_proveg");

// $con = mysqli_connect("localhost","root","root","proveg");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
