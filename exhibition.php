<?php include('header.php'); ?>
<div class="clearfix"></div>
<!-- Page Title Section -->
<div class="page-title-section">		
	<div class="overlay">
		<div class="container">
		<div class="row" id="trapezoid">
				 <div class="col-md-4">
					<h1 class="pagetitle white animate" data-anim-type="fadeInLeft">Exhibition</h1>                    
				</div>
				 <div class="col-md-8">
					<ul class="top-breadcrumb animate" data-anim-type="fadeInRight">
						<li><a href="index.html">Home</a></li>
						<li class="active"><a href="#">Exhibition</a></li>
					</ul>
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- /Page Title Section -->

<section class="services-section">
  <div class="container">
    <div class="text-center animate" data-anim-type="zoomIn" data-anim-delay="400">
      <h1 class="heading animate fadeInUp">Exhibition</h1>
	  <div class="pagetitle-separator animate fadeInRight"></div>
    </div>
	
    <div class="clearfix"></div>
     
	 
	 
	 
	 
	 <!------Start blog------------>
	  <div class="blog-page-section blog-column animate" data-anim-type="fadeInUp" data-anim-delay="400">
		  <div class="row">
          <?php
		  $sql=mysql_query("select * from exhibition");
		  $a=1;
		  while($sql1=mysql_fetch_array($sql))
		  {
			  $id=$sql1['id'];
				$title=$sql1['title'];
				$desc=$sql1['details'];
		  ?>
		   <div class="col-md-6">
			  <div class="blog-area" style="overflow: hidden;">
				
				<div class="clear"></div>
				   <div class="blog-post-title">
					<div class="blog-post-title-wrapper">
						<h2><a href="#"><?php echo $title ?></a></h2>
						<p><?php echo $desc ?></p>		
						<div class="btn-left-area">
					      
					  </div>
					</div>
				</div>	
				<div class="row" style="margin:0px !important;">
	 <div id="gallery">
     <?php
		  $sql=mysql_query("select * from exhibition_image where oid='$id'");
		 while($sql1=mysql_fetch_array($sql))
		  {
			  $id=$sql1['id'];
			  $img=$sql1['image'];
		  ?>
		<div class="col-md-4 col-sm-6 animate" style="height:120px;" data-anim-type="zoomIn" data-anim-delay="200">
			<div class="home-gallery-col">
			  <div class="home-gallery-img">
				   <img src="admin/<?php echo $img ?>" class="img-responsive">
					<div class="gallery-showcase-overlay">
					 <div class="gallery-showcase-overlay-inner">
					  <div class="gallery-showcase-icons">
						<a class="photobox_a" href="admin/<?php echo $img ?>" data-lightbox="image" title="Proveg Engineering and Food Processing Pvt. Ltd."><i class="fa fa-search-plus"></i>
						<img src="admin/<?php echo $img ?>" style="display:none" />
						</a>
						
					  </div>
					</div> 
				  </div>
			 </div>
			</div>
		</div>
        <?php } ?>
		 
		  </div>
     </div>
			 </div> 
            </div>
			<?php } ?>
            
            
          <div class="clearfix"></div>
          
				  
		</div>  		
	 </div>
	 <!--------------End Blog------------->
	 
	 
	 
	 
	 
	 
	 
	 
	 
    </div>
</section>
<?php include('footer.php'); ?>