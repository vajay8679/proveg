
<?php
include 'conn.php'; // Include your database connection file

if(isset($_POST['categoryId'])) {
    $categoryId = $_POST['categoryId'];
} else {
    $sq2 = mysqli_query($conn, "SELECT * FROM gallery_menu limit 1");
    $row = mysqli_fetch_assoc($sq2);
    $categoryId = $row['id'];
}

// if(isset($_POST['categoryId'])) {
//     $categoryId = $_POST['categoryId'];

        $sql = mysqli_query($conn, "SELECT * FROM gallery_image where oid = '$categoryId'");
        while ($sql1 = mysqli_fetch_array($sql)) {
            $id = $sql1['id'];
            $oid = $sql1['oid'];
            $img = $sql1['image'];
            $title = $sql1['title'];
            $desc = $sql1['desc'];
            $category = isset($sql1['category']) ? $sql1['category'] : '';     
        ?>
            <div class="col-md-4 <?php echo $category; ?>" style="margin: 0 auto;">
                <div class="content gallsec">
                    <img src="admin/<?php echo $category . '/' . $img ?>" alt="<?php echo $title ?>" class="img-gallery">
                </div>
            </div>
        <?php } 
// }
     ?>