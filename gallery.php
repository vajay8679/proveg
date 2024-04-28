<?php include('headernew.php'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

img.img-gallery { 
    width: 100%; 
    height: 350px; 
    object-fit: cover; 
}

body {
  background-color: #f1f1f1;
  padding: 0;
  margin:0;
  font-family: Arial;
}

/* Center website */
.main {
  max-width: 1000px;
  margin: auto;
}

h1 {
  font-size: 50px;
  word-break: break-all;
}

.row {
  margin: 10px -16px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
  padding: 8px;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  display: none; /* Hide all elements by default */
}

/* Clear floats after rows */ 
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Content */
.content {
  padding: 10px;
}

/* The "show" class is added to the filtered elements */
.show {
  display: block;
}

/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: white;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}
</style>

<div class="main">
    <header class="entry-header">
        <h1 class="entry-title">Gallery</h1>
    </header>

    <div id="myBtnContainer text-center">
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM gallery_menu;");
        while ($sql1 = mysqli_fetch_array($sql)) {
            $id = $sql1['id'];
            $title = $sql1['title'];
        ?>
            <button class="btn" onclick="filterSelection('<?php echo $id; ?>')"><?php echo $title ?></button>
        <?php } ?>

    </div>
    <div class="row" id="default_data">
    <?php 
   
    $sq2 = mysqli_query($conn, "SELECT * FROM gallery_menu limit 1");
    $row = mysqli_fetch_assoc($sq2);
    $categoryId = $row['id'];

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
     ?>
</div>
    <div class="row" id="imageContainer">
    <!-- Images will be displayed here -->
    </div>
    
</div>

<script>
    function filterSelection(categoryId) {

      document.getElementById('default_data').style.display = 'none';

        // Make an AJAX request to fetch images based on the selected category
        $.ajax({
            url: 'get_images.php',
            method: 'POST',
            data: {categoryId: categoryId},
            success: function(response) {
                $('#imageContainer').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
    
            }
        });
    }
</script>
<script>
// filterSelection("all")
// function filterSelection(c) {
//   var x, i;
//   x = document.getElementsByClassName("column");
//   if (c == "all") c = "";
//   for (i = 0; i < x.length; i++) {
//     w3RemoveClass(x[i], "show");
//     if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
//   }
// }

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

<?php include('footernew.php'); ?>
