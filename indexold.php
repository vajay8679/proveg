<!-- <h1>This is test<h1> -->
<?php include('header.php'); ?>
<?php include('search.php'); ?>
<!-- Slider Section -->
 <div class="main-slider">		
	<div id="home-slider" class="carousel slide" data-ride="carousel" data-interval="3000">
		<div class="carousel-inner" role="listbox">
<?php
 $sql = mysqli_query($conn, "SELECT * FROM slider");
  $a=1;
//   while($sql1=mysql_fetch_array($sql))
  while ($sql1 = mysqli_fetch_assoc($sql)) 
  {
	  $id=$sql1['id'];
	  $img=$sql1['image'];
    $title=$sql1['title'];
    $description=$sql1['description'];
	if($a==1)
	{
  ?>
			<div class="item active">
				<img src="admin/<?php echo $img ?>" alt="img">
                  <div class="carousel-caption">
                    <h1 data-animation="animated zoomInLeft" style="color: #a0ce4e !important;text-shadow: 2px 2px #333;"><?php echo $title ?></h1>
                    <p data-animation="animated bounceInLeft" style="color: #a0ce4e !important;text-shadow: 2px 2px #333;"><?php echo $description ?></p>
					<!--<button data-animation="animated zoomInUp" class="main-btn btn-1 btn-1b">Purchase Now</button>-->
                </div>			
			</div>
		<?php  } else { ?> 
        <div class="item">
				<img src="admin/<?php echo $img ?>" alt="img">
                  <div class="carousel-caption">
                    <h1 data-animation="animated zoomInLeft" style="color: #a0ce4e !important;text-shadow: 2px 2px #333;"><?php echo $title ?></h1>
                    <p data-animation="animated bounceInLeft" style="color: #a0ce4e !important;text-shadow: 2px 2px #333;"><?php echo $description ?></p>
					<!--<button data-animation="animated zoomInUp" class="main-btn btn-1 btn-1b">Purchase Now</button>-->
                </div>			
			</div>
             <?php } $a++; }?>	
	    </div>
		 <ul class="carou-direction-nav">
				<li><a class="carou-prev" href="#home-slider" data-slide="prev"></a></li>
				<li><a class="carou-next" href="#home-slider" data-slide="next"></a></li>
			</ul>
     </div>
</div>
<!-- /Slider Section -->
<section class="about-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6 animate" data-anim-type="fadeInLeft">
				<h2>About Proveg Engineering and Food Processing Pvt. Ltd.</h2>
				<p>We are a professional business entity engaged in designing, engineering, manufacturing, supplying, erecting and commissioning of an array of vegetable and fruit processing pretreatment line, hot air dryers, vacuum freeze dryers, IQF, extruded food machineries, baked food machines, candy, chocolate machines, industrial mixers, nut and grain shelling, hulling , grading, sorting and cutting machines, packaging solution. Our expertise resides in turnkey plants which we can assemble at client's site with ease. </p> 
				<p>From humble beginnings in year 2006 as Techno Engineers & consultants, now at PROVEG we have emerged as a strong partner to our customers serving them with need based solutions at affordable prices while never compromising on the quality of our equipment...<a href="about.php">Read more</a></p>
				
				
			</div>
			<div class="col-md-6 animate" data-anim-type="fadeInRight">
			<!----------About Slider----------->
				<img src="images/logo.png" style="width:100%" class="img-responsive">	 
			</div>
		</div>
 </section>
<!----------Services----------------------------------->
<section class="services-section">
  <div class="container">
    <div class="text-center animate" data-anim-type="zoomIn" data-anim-delay="200">
      <h1 class="heading animate fadeInUp">Our Featured Product(s)</h1>
	  <div class="pagetitle-separator animate fadeInRight"></div>
    </div>
    <div class="clearfix"></div>
	<div class="row">
	     <div class="col-lg-4 animate" data-anim-type="zoomIn" data-anim-delay="200">
		     <div class="home_services">
				<a href="https://provegengineering.in/product.php?proid=461" class="service_icon"><img alt="" src="https://www.provegengineering.in//images/20200102122829_WhatsApp%20Image%202020-01-02%20at%203.46.37%20PM.jpeg" style="width: 100%" /></a>
				<h3><a href="https://provegengineering.in/product.php?proid=461">Fish Feed Processing Plant</a></h3>
				<p>We are leading  manufacturer for fish feed machine. We have achieved  with the introduction of indigenously developed Floater (Extruder). Our fish feed machine running sucesfull all over india. It is used to make good quality pellet for fish in floating & sinking The PVG Floating Fish Feed Extruder are made of the Feeding system, extruding system, cutting system and controlling system. The PVG Floating Fish Feed Extruder are specially designed for easy application. The material used can sterilize by the high temperature and high pressure and make the product safe.</p>
			   <a href="https://provegengineering.in/product.php?proid=461"><button class="main-btn btn-more">More</button></a>
              </div>  			   
		  </div>
		 <div class="col-lg-4 animate" data-anim-type="zoomIn" data-anim-delay="400">
		     <div class="home_services">
				<a href="https://provegengineering.in/product.php?proid=442" class="service_icon"><img src="images/20200103092608_13885760-fbd7-429c-8e58-2412cff8fc43.jpg" class="img-responsive" /></a>
				<h3><a href="https://provegengineering.in/product.php?proid=442">Cattle feed Processing Plant</a></h3>
				<p>We are leading  manufacturer for cattle feed machine. Our cattle feed machine running sucesfull all over india. It is used to make good quality pellet for cattle. The PVG cattle feed pellet are specially designed for easy application. The material used can sterilize by the high temperature and high pressure and make the product safe.</p>
			   <a href="https://provegengineering.in/product.php?proid=442"><button class="main-btn btn-more">More</button></a>
              </div>  			   
		  </div>
         <div class="col-lg-4 animate" data-anim-type="zoomIn" data-anim-delay="600">
		     <div class="home_services">
				<a href="https://provegengineering.in/product.php?proid=453" class="service_icon"><img src="admin/upload/slider/672f98bd-ea02-4fee-a3b9-92015a5a61d0.jpg" class="img-responsive" /></a>
				<h3><a href="https://provegengineering.in/product.php?proid=453">Poultry Processing</a></h3>
				<p>Feed hammer mill is the ideal grinding equipment in fish/cattle/poultry feed production, hammer mill gets its name due to the structure of grinding chamber. The final particle sizes smashed by hammer mill are characterized by uniform fineness, which greatly benefits pelleting or extrusion process</p>
			   <a href="https://provegengineering.in/product.php?proid=453"><button class="main-btn btn-more">More</button></a>
              </div>  			   
		  </div>
		  <div class="clearfix"></div>
		<div class="col-lg-4 animate" data-anim-type="zoomIn" data-anim-delay="200">
		     <div class="home_services">
				<a href="https://provegengineering.in/product.php?proid=472" class="service_icon"><img src="admin/upload/product/images/thumb/20170316135657_sa.jpg" class="img-responsive" width="100%"/></a>
				<h3><a href="https://provegengineering.in/product.php?proid=472">Spice/Masala Plant</a></h3>
				<p>Spices are used in different forms: whole, chopped, ground, roasted, sautéed, fried, and as topping. They blend food to extract the nutrients and bind them in a palatable form. 

    Hammer Mill,
    Air-Lock,
    Cyclone,
    Dust Collector,
    Vibratory Sieving,
    Elevator, conveyors, storage tank
</p>
			   <a href="https://provegengineering.in/product.php?proid=472"><button class="main-btn btn-more">More</button></a>
              </div>  			   
		  </div>
		 <div class="col-lg-4 animate" data-anim-type="zoomIn" data-anim-delay="400">
		     <div class="home_services">
				<a href="https://provegengineering.in/product.php?proid=468" class="service_icon"><img src="images/20200103120600_Flour%20Mill%20Plant.jpg" class="img-responsive" /></a>
				<h3><a href="https://provegengineering.in/product.php?proid=468">Flourmill plant</a></h3>
				<p>A mill is a device that breaks solid materials into smaller pieces by grinding, crushing, or cutting. Such comminuting is an important unit operation in many processes. There are many different types of mills and many types of materials processed in them.

    Flour Mill Plant (Auto/Semi Auto),

    Cleaning Machine,
    Flour Mill,
    Grader,
    Conveyor, Storage tank, elevators etc.
 </p>
			   <a href="https://provegengineering.in/product.php?proid=468"><button class="main-btn btn-more">More</button></a>
              </div>  			   
		  </div>
         <div class="col-lg-4 animate" data-anim-type="zoomIn" data-anim-delay="600">
		     <div class="home_services">
				<a href="https://provegengineering.in/product.php?proid=486" class="service_icon"><img src="images/20200106084718_1052a3e5-9d5f-4218-af57-47c436ff0e4f.jpg" class="img-responsive" /></a>
				<h3><a href="https://provegengineering.in/product.php?proid=486">Poha Processing</a></h3>
				<p>Flattened rice & Puff Rice commonly known poha & murmura in Hindi respectively is rice which is flattened/puffed, light, dry flakes originating from the Indian subcontinent. Rice is parboiled before flattening/puffing so that it can be consumed with very little to no cooking. This easily digestible form of raw rice is very popular across India, Nepal and Bangladesh, and is normally used to prepare snacks or light and easy fast food in a variety of Indian cuisine styles, some even for long-term consumption of a week or more</p>
			   <a href="https://provegengineering.in/product.php?proid=486"><button class="main-btn btn-more">More</button></a>
              </div>  			   
		  </div>
	  </div>
    </div>
</section>
<!----------/Services------------------>
<!----------Collout Section------------>
 <div class="callout-section animate" data-anim-type="fadeInUp" data-anim-delay="600">
	<div class="overlay">
		<div class="container">
			<div class="row">	
				<div class="col-md-12">	
					<h1 class="white animate fadeInUp">Let's work on your exciting new project together!</h1>
					
					<div class="btn-area animate fadeInRight">
						<a href="https://provegengineering.in/machinecategories.php" class="main-btn" >Purchase Now</a>
					</div>
				</div>	
			</div>			
		</div>
			
	</div>	
</div>

<!-------------Gallery Start----------->
<!----------Gallery/Portfolio------------------>

<!--<section class="services-section">
  <div class="container">
    <div class="text-center animate" data-anim-type="zoomIn" data-anim-delay="400">
      <h1 class="heading animate fadeInUp">Gallery</h1>
	  <div class="pagetitle-separator animate fadeInRight"></div>
    </div>
    <div class="clearfix"></div>
     <div class="row">
	 <div id="gallery">
     <?php
  $sql= mysqli_query($conn,"SELECT * from gallery_image where oid='2' LIMIT 0,3");
  $a=1;
  while($sql1=mysqli_fetch_assoc($sql))
  {
	  $id=$sql1['id'];
	  $img=$sql1['image'];
    $title=$sql1['title'];
    $desc=$sql1['desc'];
  ?>
		<div class="col-md-4 col-sm-6 animate" data-anim-type="zoomIn" data-anim-delay="200">
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
		
		<div class="col-md-12" style="text-align:center;"><a href="https://provegengineering.in/gallery.php"><button class="main-btn btn-more">View more</a></button></div>
		 
		  </div>
     </div>
    </div>
</section>-->
<!----------/Gallery/Portfolio------------------>
<section class="about-section">
	<div class="container">
<hr class="style9">

	<div class="row">
		<h1 class="heading animate fadeInUp">Turnkey Project Solutions</h1>
		<div class="pagetitle-separator animate fadeInRight"></div>
			<div class="col-md-6 animate" data-anim-type="fadeInRight">
			<!----------About Slider----------->
				<div id="about-slider" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
							  
                            <div class="item active">
                                 <img src="images/slidethink 1.jpg" class="img-responsive">
                               </div>
                               <div class="item">
                                 <img src="images/slidethink 2.jpg" class="img-responsive">
                               </div>
					</div>
						<!-- Pagination --> 
						<ul class="carou-direction-nav">
							<li><a class="carou-prev" href="#about-slider" data-slide="prev"></a></li>
							<li><a class="carou-next" href="#about-slider" data-slide="next"></a></li>
						</ul> 
						<!-- /Pagination -->
				  </div>	 
			</div>
			<div class="col-md-6 animate" data-anim-type="fadeInLeft">
				<p>At PROVEG we offer turnkey project solutions, from concept to commissioning, layouts to detailed engineering, thus incorporating a variety of technical and non-technical services and processes. Our service helps you get exactly what you want without stretching your limits.<br />
We offer turnkey solutions for all our products. These projects use compact space and reduce manpower utilization producing high quality. At PROVEG, we value your time and have a shorter implementation schedule. We focus on quality and have the ability to train your manpower.<br />
Our process expertise allows us to successfully understand client need and suggesting them the best upgraded technology  Our machines are capable of efficiently meeting the demands of customers with most automatic and manpowerless manne
</p> 
			
				
			</div>
		</div>
 </section>
<!----------Testimonial Section-------------
 <div class="callout-section testimonial-area animate" data-anim-type="fadeInUp" data-anim-delay="600">
	<div class="overlay">
		<div class="container">
			<div class="row">	
				<div class="col-md-12">	
				  <h1 class="white animate fadeInUp"> What People Says</h1>
					
				<div class="carousel slide" data-ride="carousel" id="testimonial">
					
					<div class="carousel-inner">
					  
					  <div class="item">
						  <div class="row">
							<div class="testi-img animate" data-anim-type="zoomIn" data-anim-delay="200">
								<img src="images/testi.jpg">
							</div>
							  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non metus. pulvinar.
									Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							  <small>- Someone famous</small>
							   <h6>CEO WARNET TEL</h6>
						  </div>
					  </div>
					  
					  <div class="item active">
						  <div class="row">
							<div class="testi-img animate" data-anim-type="zoomIn" data-anim-delay="200">
								<img src="images/testi.jpg">
							</div>
							  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non metus. pulvinar.
									Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>			
							  <small>Jane Wunder</small>
							   <h6>CEO WARNET TEL</h6>
						  </div>
					  </div>
					  
					  <div class="item">
						  <div class="row">
							<div class="testi-img animate" data-anim-type="zoomIn" data-anim-delay="200">
								<img src="images/testi.jpg">
							</div>
							  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non metus. pulvinar.
									Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>		
							  <small>- Someone famous</small>
							  <h6>CEO WARNET TEL</h6>
						  </div>
					  </div>
					  
					</div>
						
						<div class="row">
							<div class="testi-pager">
								<ol class="carousel-indicators testi-pagi">
									<li data-target="#testimonial" data-slide-to="0" class=""></li>
									<li data-target="#testimonial" data-slide-to="1" class="active"></li>
									<li data-target="#testimonial" data-slide-to="2" class=""></li>
								</ol>
							</div>	
						</div>
				  </div>
				</div>	
			</div>			
		</div>
			
	</div>	
</div>------------------>
<!-----------------latest-news------------------->
<!-- Rooms Section 
<section class="home-blog-section">
	<div class="container">
	
		
		<div class="row">
			<div class="col-md-12">
				<div class="text-center animate" data-anim-type="zoomIn" data-anim-delay="300">
				  <h1 class="heading animate fadeInUp">Latest News</h1>
				  <div class="pagetitle-separator animate fadeInRight"></div>
				</div>
			</div>
		</div>
		
				

	 <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="home-blog">
	  <div class="row">
	    <div class="col-md-12">
			<ul class="course-scroll-btn">
				<li><a class="course-prev" href="#home-blog" data-slide="prev"></a></li>
				<li><a class="course-next" href="#home-blog" data-slide="next"></a></li>    
			</ul>
		</div>
	   </div>
	   
		<div class="carousel-inner animate" data-anim-type="fadeInUp" data-anim-delay="800">
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
	  
	  if($a==1) {
  ?>
		  <div class="item active">
		    <div class="col-md-4 col-sm-6 col-xs-12 pull-left">
			   <div class="blog-area">
				<div class="blog-post-img">
					<a href="#"><img src="admin/<?php echo $img; ?>" class="img-responsive"></a>
				</div>
				
				<div class="clear"></div>
				   <div class="home-blog-title">
					<div class="home-blog-title-wrapper">
						<h2><a href="#"><?php echo $title; ?></a></h2>
						<p><?php echo $description; ?></p>		
						<div class="btn-left-area">
					      <button class="main-btn btn-more btn-left">More</button>
					  </div>
				</div>	
			  </div> 
	        </div>
		 </div>	
        </div>		 
	<?php } else { ?>
    <div class="item">
		    <div class="col-md-4 col-sm-6 col-xs-12 pull-left">
			   <div class="blog-area">
				<div class="blog-post-img">
					<a href="#"><img src="admin/<?php echo $img; ?>" class="img-responsive"></a>
				</div>
				
				<div class="clear"></div>
				   <div class="home-blog-title">
					<div class="home-blog-title-wrapper">
						<h2><a href="#"><?php echo $title; ?></a></h2>
						<p><?php echo $description; ?></p>		
						<div class="btn-left-area">
					      <button class="main-btn btn-more btn-left">More</button>
					  </div>
				</div>	
			  </div> 
	        </div>
		 </div>	
        </div>	
         <?php }  $a++; } ?>	  
			
		</div>			
		</div>
		
	</div>
</section>
<!-----------------latest-news-close------------------>
<!-------Our Client-------------------------------
<div class="client-logos">
	<div class="plogo-slider">
	<div class="item"><img src="images/plogo1.jpg" alt=""></div>
	<div class="item"><img src="images/plogo2.jpg" alt=""></div>
	<div class="item"><img src="images/plogo3.jpg" alt=""></div>
	<div class="item"><img src="images/plogo4.jpg" alt=""></div>
	<div class="item"><img src="images/plogo5.jpg" alt=""></div>
	<div class="item"><img src="images/plogo6.jpg" alt=""></div>
	<div class="item"><img src="images/plogo1.jpg" alt=""></div>
	<div class="item"><img src="images/plogo2.jpg" alt=""></div>
	<div class="item"><img src="images/plogo3.jpg" alt=""></div>
	<div class="item"><img src="images/plogo4.jpg" alt=""></div>
	<div class="item"><img src="images/plogo5.jpg" alt=""></div>
	<div class="item"><img src="images/plogo6.jpg" alt=""></div>
	</div>
</div>---->
<div class="clearfix"></div>
<?php include('footer.php'); ?>