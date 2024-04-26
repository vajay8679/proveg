<?php include('header.php'); ?>
<div class="clearfix"></div>
<!-- Page Title Section -->
<div class="page-title-section">		
	<div class="overlay">
		<div class="container">
		<div class="row" id="trapezoid">
				 <div class="col-md-4">
					<h1 class=" white animate" data-anim-type="fadeInLeft">Gallery</h1>                    
				</div>
				 <div class="col-md-8">
					<ul class="top-breadcrumb animate" data-anim-type="fadeInRight">
						<li><a href="index.html">Home</a></li>
						<li class="active"><a href="#">Gallery</a></li>
					</ul>
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- /Page Title Section -->

<style>
.blog-post-title-wrapper p{line-height: 12px !important;}
</style>

<section class="services-section">
  <div class="container">
    <div class="text-center animate" data-anim-type="zoomIn" data-anim-delay="400">
      <h1 class="heading animate fadeInUp">Products</h1>
	  <div class="pagetitle-separator animate fadeInRight"></div>
    </div>
	
    <div class="clearfix"></div>
     
	 
	 
	 
	 
	 <!------Start blog------------>
	  <div class="blog-page-section blog-column animate" data-anim-type="fadeInUp" data-anim-delay="400">
		  <div class="row">
<?php
  $sql=mysql_query("select t1.*, t2.id as pid, t2.title as ptitle from product_cat t1 INNER JOIN products t2 on t1.id=t2.oid order by t1.id DESC");
  $a=1;
  $temp ='';
  while($sql1=mysql_fetch_array($sql))
  {
	  $id=$sql1['id'];
	  $title=$sql1['title'];
	  if($temp!='' && $temp!=$title) {
		  ?>
          </p></pre>
						
					</div>
				</div>	
				<div class="row" style="margin:0px !important;">
	 
     </div>
			 </div> 
            </div>
          <?php
	  }
	   if($temp=='' || $temp!=$title) {	
	?>
			<div class="col-md-6"  style="height:300px;">
			  <div class="blog-area" style="height:280px;">
				
				<div class="clear"></div>
				   <div class="blog-post-title">
					<div class="blog-post-title-wrapper">
                    <h2><?php echo $title ?></h2>
						<pre><p>
                        <?php } // $pro_sql=mysql_query("select id,title from products where oid='$id'");
						  $x = 1;
						  //while ($row= mysql_fetch_array($pro_sql)) { ?>					
                        <a href="product.php?proid=<?php echo $sql1['pid'] ?>"><?php echo $x.'. '.$sql1['ptitle'] ?></a>
                        <?php  $x++;$temp=$title;}	 ?>
                        
     
			
          <div class="clearfix"></div>
          
				  
		</div>  		
	 </div>
	 <!--------------End Blog------------->
	 
	 
	 
	 
	 
	 
	 
	 
	 
    </div>
</section>
<?php include('footer.php'); ?>