<?php
include '../../conn.php';
$imagename = date('Ymdhis').'_'.$_FILES['upload']['name'];

$imagepath = PROJECT_ROOT . '/images/' . $imagename;

$imageurl = '';

if (file_exists($imagepath)) {

    $message = "File already exists..($imagename)";
} elseif (($_FILES['upload'] == "none") OR ( empty($_FILES['upload']['name']))) {

    $message = "No file uploaded.";
} else if ($_FILES['upload']["size"] == 0) {

    $message = "The file is of zero length.";
} else if (($_FILES['upload']["type"] != "image/pjpeg") AND ( $_FILES['upload']["type"] != "image/jpeg") AND ( $_FILES['upload']["type"] != "image/png" AND $_FILES['upload']['type'] != 'image/gif')) {

    $message = "The image must be in either JPG,GIF or PNG format.";
} else if (!is_uploaded_file($_FILES['upload']["tmp_name"])) {

    $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
} else {

    $message = "";

    $move = move_uploaded_file($_FILES['upload']['tmp_name'], $imagepath);

    if (!$move) {

        $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
    } else {

        $imageurl = 'images/' . rawurlencode($imagename);
    }
}

$funcNum = $_GET['CKEditorFuncNum'];

echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$imageurl', '$message');</script>";
?>