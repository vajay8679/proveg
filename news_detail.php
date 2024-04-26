<?php include('headernew.php'); ?>
  <div class="clearfix"></div>
  <!-- Page Title Section -->
  <div class="page-title-section">
    <div class="overlay">
      <div class="container">
        <div class="row" id="trapezoid">
          <div class="col-md-6">
            <h1 class="pagetitle white animate" data-anim-type="fadeInLeft">About Us</h1>
          </div>
          <div class="col-md-6">
            <!-- <ul class="top-breadcrumb animate" data-anim-type="fadeInRight">
              <li><a href="index.html">Home</a></li>
              <li class="active"><a href="#">News Detail</a></li>
            </ul> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Page Title Section -->
   <?php
   $id= $_GET['nid'];
  $sql=mysqli_query($conn,"SELECT * FROM news WHERE id='$id'");
  $sql1=mysqli_fetch_assoc($sql);
      $id=$sql1['id'];
	  $title=$sql1['title'];
	  $description=$sql1['description'];
	  $date=$sql1['date'];
	  $img=$sql1['image'];
  ?>
  <div class="clearfix"></div>
  <section class="about-section">
    <div class="container">
    <div class="row">
    <div class="col-md-12 animate" data-anim-type="fadeInLeft" style="text-align:justify;">
      <div class="text-center animate" data-anim-type="zoomIn" data-anim-delay="400">
        <h1 class="heading animate fadeInUp"><?php echo $title; ?></h1>
        <div class="pagetitle-separator animate fadeInRight"></div>
      </div>
      <p><img src="admin/<?php echo $img; ?>" style="width: 1082px;height: 340px;"></p>
      <p><?php echo $description; ?></p>
      
      
      
    </div>
  </section>
  <div class="clearfix"></div>
  <div class="clearfix"></div>
  <?php include('footernew.php'); ?>