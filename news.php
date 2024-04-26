<?php include('headernew.php'); ?>
<div class="clearfix"></div>
<!-- Page Title Section -->
<div class="page-title-section">		
	<div class="overlay">
		<div class="container">
			<div class="row" id="trapezoid">
				 <div class="col-md-6">
					<h1 class=" white animate" data-anim-type="fadeInLeft">News</h1>                    
				</div>
				 <!-- <div class="col-md-6">
					<ul class="top-breadcrumb animate" data-anim-type="fadeInRight">
						<li><a href="index.html">Home</a></li>
						<li class="active"><a href="#">News</a></li>
					</ul>
				</div> -->
			</div>
		</div>	
	</div>
</div>
<!-- /Page Title Section -->
<!---------Blog-Section------------------------------>
<section class="blog-section">
  <div class="container">
  <div class="text-center animate" data-anim-type="zoomIn" data-anim-delay="400">
      <h1 class="heading animate fadeInUp">News</h1>
	  <div class="pagetitle-separator animate fadeInRight"></div>
    </div>
	 <!---------Blog Area------------->
		 <div class="blog-page-section blog-column animate" data-anim-type="fadeInUp" data-anim-delay="400">
		  <div class="row">
          <?php
  $sql=mysqli_query($conn,"SELECT * FROM news");
  $a=1;
  while($sql1=mysqli_fetch_assoc($sql))
  {
	  $id=$sql1['id'];
	  $title=$sql1['title'];
	  $description=$sql1['description'];
	  $date=$sql1['date'];
	  $img=$sql1['image'];
  ?>
		   <div class="col-md-4">
		     <div class="blog-area">
				<div class="blog-post-img">
					<a href="news_detail.php?nid=<?php echo $id; ?>"><img src="admin/<?php echo $img; ?>" class="img-responsive"></a>
				</div>
				<!--<div class="blog-post-detail">
						<a href="#"><i class="fa fa-user"></i> Admin</a>
						<a href="#"><i class="fa fa-tag"></i> Tags</a>
						<a href="#"><i class="fa fa-comment"></i>11</a>
				<div class="blog-post-date"><span class="date">22 <small>Apr</small></span>
					</div>		
				</div>-->
				<div class="clear"></div>
				   <div class="blog-post-title">
					<div class="blog-post-title-wrapper">
						<h2><a href="news_detail.php?nid=<?php echo $id; ?>"><?php echo $title; ?></a></h2>
						<p><?php echo $description; ?></p>		
						<div class="btn-left-area">
					      <button class="main-btn btn-more btn-left" onClick="window.location='news_detail.php?nid=<?php echo $id; ?>'">More</button>
					  </div>
					</div>
				</div>	
			  </div>
			</div>
   <?php } ?>        
			<div class="col-md-12" style="text-align:center;">
<div class="blog-pagination animate" data-anim-type="fadeInLeft">
				<a href="#"><i class="fa fa-angle-double-left"></i></a>
				<a href="#">1</a>
				<a href="#">2</a>
				<a href="#">3</a>
				<a href="#"><i class="fa fa-angle-double-right"></i></a>
			</div>
		</div>
		</div>  		
	 </div>
  </div>
</section>

<div class="clearfix"></div>
<?php include('footernew.php'); ?>