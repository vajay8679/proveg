<?php include('header.php'); ?>
  <div class="clearfix"></div>
  <!-- Page Title Section -->
  <div class="page-title-section">
    <div class="overlay">
      <div class="container">
        <div class="row" id="trapezoid">
          <div class="col-md-6">
            <h1 class=" white animate" data-anim-type="fadeInLeft">Pro Veg Engneering</h1>
          </div>
          <div class="col-md-6">
            <ul class="top-breadcrumb animate" data-anim-type="fadeInRight">
              <li><a href="index.html">Home</a></li>
              <li class="active"><a href="#">Pro Veg Engneering</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Page Title Section -->
  <?php
$stv = $_GET['proid'];
$sql=mysql_query("SELECT * from products where id='$stv'"); 
$row =  mysql_fetch_array($sql);

$oid = $row['oid'];
$sql1=mysql_query("SELECT * from product_cat where id='$oid'"); 
$row1 =  mysql_fetch_array($sql1);
?>
  <!---------Blog-Section------------------------------>
  <section class="blog-section">
    <div class="container">
      <div class="row"> 
        <!---------Blog Area------------->
        <div class="col-md-9">
          <div class="blog-page-section animate" data-anim-type="fadeInUp" data-anim-delay="400">
            <div class="blog-area">
              <div class="clear"></div>
              <div class="blog-post-title">
                <div class="blog-post-title-wrapper"> 
                <a href="admin/<?php echo $row['image'] ?>" target="_blank"><img src="images/pdf-icon.gif" align="right" style="text-align:right;" class="img-responsive" /></a>
                  <h2><?php echo $row['title'] ?></h2>
                 
<?php echo $row['desc']; ?> </div>
                <div class="clearfix"></div>
                <div class="comment_form_section animate" data-anim-type="fadeInUp" data-anim-delay="800">
                  <h2>Leave a Message on this product</h2>
                  <form role="form">
                    <div class="form_group">
                      <label for="exampleInputEmail1">Name<small>*</small></label>
                      <input type="name" id="exampleInputEmail1" class="con_input_control">
                    </div>
                    <div class="form_group">
                      <label for="exampleInputEmail1">Email<small>*</small></label>
                      <input type="name" id="exampleInputEmail1" class="con_input_control">
                    </div>
                    <div class="form_group">
                      <label for="exampleInputPassword1">Message</label>
                      <textarea class="con_textarea_control" rows="5"></textarea>
                    </div>
                    <button class="main-btn btn-more btn-left">Send Message</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include('sidebar.php'); ?>
      </div>
    </div>
  </section>
  <div class="clearfix"></div>
  <?php include('footer.php'); ?>