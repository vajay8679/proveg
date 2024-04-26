<?php 
// error_reporting(0);
session_start(); 
include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Proveg Engineering and Food Processing Pvt. Ltd.</title>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Css-------------->
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
	<link href="css/default.css" type="text/css" rel="stylesheet">
	
	<link href="css/owl.carousel.css" type="text/css" rel="stylesheet">
	<link href="css/media-responsive.css" rel="stylesheet">
	<link href="css/font/font.css" rel="stylesheet">
	<link href="css/lightbox.css" rel="stylesheet">
	<link href="css/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/switcher/switcher.css" rel="stylesheet">
	<link href="css/photobox.css" rel="stylesheet">
	<!--Js-------------->
	<script type='text/javascript' src="js/jquery-1.11.0.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>	
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/carousel.js"></script>
	
	<!--<script src="js/lightbox/lightbox-2.6.min.js"></script>-->
	<script type="text/javascript" src="js/page-scroll.js"></script>
	<script type="text/javascript" src="js/switcher/jsstorage.js"></script>
	<script type="text/javascript" src="js/switcher/switcher.js"></script>
	<script type='text/javascript' src="js/jquery.photobox.js"></script>
	<!------other-------->
	<script>jQuery(document).on('click', '.mega-dropdown', function(e) {
  e.stopPropagation()
})</script>
</head>
<body>
<!-- Wrapper -->
<div id="wrapper">
<!--------Header--------------->
	<div class="header-section">
     <div class="container header-inner">
        <div class="row">
			<div class="col-md-3 site-logo">
				<h2><a href="index.php" title="Proveg Engineering and Food Processing Pvt. Ltd."><img src="images/logo.png" style="max-width:150px"></a></h2>
			</div>
           <div class="col-md-9">			
             <ul class="contact-top">
              <?php
				 $sql = mysqli_query($conn, "SELECT * FROM brochure WHERE id='1'");
				 $sql1 = mysqli_fetch_array($sql);
				 $brochure = $sql1['brochure'];
				  
				  ?>
			 	<!--<li><a href="admin/upload/brochure/<?php echo $brochure; ?>" target="_blank"><i class="fa fa-download"></i>Download Brochure</a></li>-->
		        <li><a data-toggle="modal" data-target="#contact_us"><i class="fa fa-envelope fa-lg"></i>praveen.provegengg@gmail.com,</a> <a data-toggle="modal" data-target="#contact_us">provegengineering@gmail.com</a></li>
				<li><a href="https://api.whatsapp.com/send?phone=+917073642737&text=Hi, I contacted you Through your website."><i class="fa fa-phone fa-lg"></i> <a href="https://api.whatsapp.com/send?phone=+917073642737&text=Hi, I contacted you Through your website." target="_blank">+91-7073642737, </a><a href="https://api.whatsapp.com/send?phone=+919358003814&text=Hi, I contacted you Through your website." target="_blank">9358003814, </a><a href="https://api.whatsapp.com/send?phone=+919928038885&text=Hi, I contacted you Through your website." target="_blank">9928038885</a></li>
				<li><i class="fa fa-globe fa-lg"></i><a target="_blank" title="Visit Our Other Websites" href="http://www.provegengg.com">provegengg.com,</a> <a target="_blank" href="http://www.provegengineering.co.in">provegengineering.co.in</a>, <a target="_blank" href="http://www.mechproengineering.com/">mechproengineering.com</a></li>

<!--<li style="float:right;">Our Partner : <a href="http://www.provegpackaging.com"><i class="fa fa-globe"></i>www.provegpackaging.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>-->
			 </ul>
			 
          </div>			
		</div>
	</div>	
<!-- Modal For Email Message -->
<!-- Modal for Contact form -->
<div class="modal fade" id="contact_us" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center" id="myModalLabel">Contact Us For Query</h4>
				  </div>
				  <div class="modal-body">
					<p class="text-center">Please enter your content here...</p>
					<form method="post" action="contact2.php">
					<div class="row">
						<div class="col-md-6">
							*
							<input type="text" placeholder="First Name" name="fname" class="form-control" />
						</div>
						<div class="col-md-6">
							*
							<input type="text" placeholder="Last Name" name="lname" class="form-control" />
						</div>
					</div>
					<div class="row top_margin">
						<div class="col-md-12">
							*
							<input type="text" placeholder="Your Email" name="email" class="form-control" />
						</div>
					</div>
					<div class="row top_margin">
						<div class="col-md-12">
							*
							<textarea placeholder="Your Message" name="msg" class="form-control"></textarea>
						</div>
					</div>
					<input type="submit" name="submit" class="btn btn-default top_margin" value="Submit">
					</form>
				  </div>
			</div>
	  </div>
</div>
<!-- end Modal for Contact form -->

<!-- /Model For Email Message -->
	<div class="container">
     <nav class="navbar navbar-default">
	     <div class="row">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<!--<li class="dropdown active">
					<a href="index.php" class="dropdown-toggle" data-toggle="dropdown">Home</a>
					<ul class="dropdown-menu" role="menu">
					    <li><a href="index.php">Home V1</a></li>
						<li><a href="index2.php">Home V2</a></li>
						<li><a href="index3.php">Home V3</a></li>
					</ul>
				</li>-->
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About Us</a></li>
				
				
				
					
				</li>
				<?php
			$x=1;
			//$sql=mysql_query("select * from product_cat t1 INNER JOIN products t2 on t1.id=t2.oid where t1.parent_id='0'");
			//$sql=mysql_query("select * from product_cat where parent_id='0' and id in(select parent_id from product_cat) ORDER BY `title` ASC");
			// $sql=mysql_query("SELECT* FROM product_cat WHERE parent_id='0' and (id in(select parent_id from product_cat) OR  id in(select oid from products)) ORDER BY `title` ASC");
			$sql = mysqli_query($conn, "SELECT * FROM product_cat WHERE parent_id='0' AND (id IN (SELECT parent_id FROM product_cat) OR  id IN (SELECT oid FROM products)) ORDER BY `title` ASC");
				
			?>
				<!--<li><a href="gallery.php">Gallery</a></li>-->
				<li class="dropdown mega-dropdown">
					<a href="machinecategories.php" class="dropdown-toggle" data-toggle="dropdown">Products</a>
					<ul class="dropdown-menu mega-dropdown-menu row padding-bot-mega product_menu">
					<?php
					//  while($row = mysql_fetch_array($sql))
					while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) 
			{ ?>
						<li class="col-md-2" style="height:160px;">
						  <ul>
							<li class="margin-l-li-30">
                            <?php if($row['thumb']!='') { ?>
<img src="admin/upload/product/images/thumb/<?php echo $row['thumb']; ?>" width="150" height="100" style="border:2px solid #a0ce4e;" class="img-responsive"> <?php } else { ?><img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=150%C3%97100&w=150&h=100" style="border:2px solid #a0ce4e;" class="img-responsive"> <?php } ?>
<a href="https://provegengineering.in/machinecategories.php#<?php echo $row['title']; ?>"><?php echo $row['title']; ?>

</a></li>
							
						  </ul>
						</li>
						
						<?php } ?>

						
<div class="clearfix"></div>

<div class="row" style="text-align:center;">

	 <a data-animation="animated zoomInUp" style="margin-top:20px;" href="https://provegengineering.in/machinecategories.php" class="main-btn btn btn">View All Products</a>
	 </div>


						
					  </ul>
				</li>
				<li><a href="solutions.php">Solutions</a></li>
				<!--<li class="dropdown">
					<a href="about.php" class="dropdown-toggle" data-toggle="dropdown">About</a>
					<ul class="dropdown-menu" role="menu">
					    <li><a href="about.php">About V1</a></li>
						<li><a href="about2.php">About V2</a></li>
					</ul>
				</li>-->
				<!--<li class="dropdown">
					<a href="services.php" class="dropdown-toggle" data-toggle="dropdown">Services</a>
					<ul class="dropdown-menu" role="menu">
					    <li><a href="services.php">Services V1</a></li>
						<li><a href="services2.php">Services V2</a></li>
					</ul>
				</li>-->
				<li><a href="turnkeyproject.php">Turn key project</a></li>
				<!--<li class=" dropdown">
				   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gallery</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="gallery-2-col.php">Gallery-2-Column</a></li>
						<li><a href="gallery-3-col.php">Gallery-3-Column</a></li>
						<li><a href="gallery-4-col.php">Gallery-4-Column</a></li>
						<li><a href="gallery-2-col-vertical-tabs.php">Gallery-2-Col-Vertical-Tabs</a></li>
						<li><a href="gallery-3-col-vertical-tabs.php">Gallery-3-Col-Vertical-Tabs</a></li>
						<li><a href="gallery.php">Gallery</a></li>
						<li><a href="gallery-details.php">Gallery Details</a></li>
					</ul>
				</li>-->
				<!--<li class=" dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Blog</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="blog-right-sidebar.php">Blog-Right-Sidebar</a></li>
						<li><a href="blog-left-sidebar.php">Blog-Left-Sidebar</a></li>
						<li><a href="blog-full-width.php">Blog-Full-Width</a></li>
						<li><a href="blog-2-column.php">Blog-2-Column</a></li>
						<li><a href="blog-3-column.php">Blog-3-Column</a></li>
						<li><a href="blog-2-column-right-sidebar.php">Blog-2-Column-Right-Sidebar</a></li>
						<li><a href="blog-2-column-left-sidebar.php">Blog-2-Column-Left-Sidebar</a></li>
						<li><a href="blog-detail.php">Blog-Details</a></li>
					</ul>
				</li>-->
			    <!--<li class="dropdown">
					<a href="contact.php" class="dropdown-toggle" data-toggle="dropdown">Contact Us</a>
					<ul class="dropdown-menu" role="menu">
					    <li><a href="contact.php">Contact V1</a></li>
						<li><a href="contact2.php">Contact V2</a></li>
					</ul>
				</li>-->
				<li><a href="contact.php">Contact</a></li>
			</ul>
			
				<div class="col-md-2 input-group search-box-top pull-right">
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
			    </div>
		</div>
	</div>
 </nav>
</div>
</div>	
<!--------/Header--------------->