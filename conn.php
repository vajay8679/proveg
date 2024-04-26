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
    define('HTTPS_MODE', "on");
    define('PROJECT_URL', "http://" . $_SERVER["HTTP_HOST"] . ROOT_DIR);
} else {
    define('HTTPS_MODE', "off");
    define('PROJECT_URL', "http://" . $_SERVER["HTTP_HOST"] . ROOT_DIR);
}




#-------------------------------------------------------------------------------
# DEFINE DIFFERENT URLS
#-------------------------------------------------------------------------------
// define('CSS_URL', PROJECT_URL . CSS_DIR);

// $con=mysql_connect("localhost","root","") or die(mysql_error());
// mysql_select_db("proveg",$con) or die(mysql_error());


$host = "localhost";
$username = "u295964305_proveg";
$password = "4?mIRqI5SPs";
$database = "u295964305_proveg";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Your code here


// Close the connection when done
// $conn->close();

?>
