<?php include('./headernew.php'); ?>

<div id="page" class="hfeed site">

            <div id="main" class="wrapper">
							

							
	<article id="post-8970" class="post-8970 page type-page status-publish hentry">
		<header class="entry-header">
												<h1 class="entry-title">Help</h1>
		</header>

		<div class="entry-content">
			<div class="col-lg-12">
<div class="container">
<div class="row">
<div class="hedr"><img fetchpriority="high" decoding="async" class="img-responsive homepage_img" src="proveg/wp-content/themes/ecotheme/images/support-header.jpg" width="1700" height="296"></div>
</div>
</div>
</div>
<div class="col-lg-12">
<div class="container">
<div class="row">
<h6 class="text-right sm-navi">Support Ticket / <span class="sm-navi-curr">Submit a Support Ticket</span></h6>
</div>
</div>
</div>
					</div><!-- .entry-content -->
		<footer class="entry-meta">
					</footer><!-- .entry-meta -->
	</article><!-- #post -->
			
<div class="container">
<div style="display:block;">
<h5 class="blk text-left">
<center>
</center>
</h5>
                                  
<form id="myForm" action="helpsubmission.php" method="post" onSubmit="return validations()">

<div class="hlpfrm_panel">
<div class="hlpfrm_section"> 
<div class="hlpfrm_title">Your Information</div>
<div class="hlpfrm_grup">
<div class="hlpfrm_txt">Your Name</div>
<div class="hlpfrm_field"><input class="hlpfrm_100" name="nameTxt" id="nameTxt" type="text" /></div>
</div>
<div class="hlpfrm_grup">
<div class="hlpfrm_txt">Your Company Name</div>
<div class="hlpfrm_field"><input class="hlpfrm_100" name="conameTxt" id="conameTxt" type="text" /></div>
</div>  
<div class="hlpfrm_grup">
<div class="hlpfrm_txt">Your Phone No.</div>
<div class="hlpfrm_field"><input class="hlpfrm_100" name="phoneTxt" id="phoneTxt" type="tel" /></div>
</div>
  <div class="hlpfrm_grup">
<div class="hlpfrm_txt">Your E-mail</div>
<div class="hlpfrm_field"><input class="hlpfrm_100" name="emailTxt" id="emailTxt" type="text" /></div>
</div>

<div class="hlpfrm_grup">
<div class="hlpfrm_txt">Cc to <span>(optional)</span></div>
<div class="hlpfrm_field"><input class="hlpfrm_100" name="ccTxt" id="ccTxt" type="text" /><span>Please note that followers will receive all the messages that will be shared</span></div>
</div>
</div>
<div class="hlpfrm_section"> 
<div class="hlpfrm_title">Your Machine(s) information</div>
<div class="hlpfrm_grup">
<div class="hlpfrm_txt">Machine(s) Name</div>
<div class="hlpfrm_field"><input class="hlpfrm_100" name="machnameTxt" id="machnameTxt" type="text" /></div>
</div>
<div class="hlpfrm_grup">
<div class="hlpfrm_txt">Purchase Year</div>
<div class="hlpfrm_field"><input class="hlpfrm_100" name="puryearTxt" id="puryearTxt" type="text" /></div>
</div>
</div>
<div class="hlpfrm_section"> 
<div class="hlpfrm_title">Ticket Description</div>
<div class="hlpfrm_grup">
<div class="hlpfrm_txt">Ticket type</div>
<div class="hlpfrm_field">
<input type="radio" id="tickettypeTxt" name="tickettypeTxt" value="A question related to my delivery time or billing."> <strong>A question related to my delivery time or billing.</strong><br />
<input type="radio" id="tickettypeTxt" name="tickettypeTxt" value="A question related to tracking of order."> <strong>A question related to tracking of order.</strong><br />
<input type="radio" id="tickettypeTxt" name="tickettypeTxt" value="A question related to a technician for installation of a machine."> <strong> A question related to a technician for installation of a machine.</strong><br />
<input type="radio" id="tickettypeTxt" name="tickettypeTxt" value="A question related to electric equipment (motor, panel etc)."> <strong> A question related to electric equipment (motor, panel etc).</strong><br />
<input type="radio" id="tickettypeTxt" name="tickettypeTxt" value="A problem in the machine working."> <strong> A problem in the machine working.</strong><br />
<input type="radio" id="tickettypeTxt" name="tickettypeTxt" value="An issue related to production output or quality (on specific material)."> <strong> An issue related to production output or quality (on specific material).</strong><br />
<input type="radio" id="tickettypeTxt" name="tickettypeTxt" value="An issue related to incomplete knowledge of machine working & material."> <strong> An issue related to incomplete knowledge of machine working & material.</strong><br />
<input type="radio" id="tickettypeTxt" name="tickettypeTxt" value="A question related to dispatch of spare parts."> <strong> A question related to dispatch of spare parts.</strong><br />
<input type="radio" id="tickettypeTxt" name="tickettypeTxt" value="A question related to the spare part (life of parts etc)."> <strong> A question related to the spare part (life of parts etc).</strong><br />
<input type="radio" id="tickettypeTxt" name="tickettypeTxt" value="An issue related to not getting a satisfactory response from the team."> <strong> An issue related to not getting a satisfactory response from the team.</strong><br />
<input type="radio" id="tickettypeTxt" name="tickettypeTxt" value="An issue of manufacturing defect."> <strong> An issue of manufacturing defect.</strong><br />
<input type="radio" id="tickettypeTxt" name="tickettypeTxt" value="Others" checked="True"> <strong> Others</strong><br /></div>
</div>
<div class="hlpfrm_grup">
<div class="hlpfrm_txt">Subject</div>
<div class="hlpfrm_field"><input class="hlpfrm_100" name="subject1Txt" id="subject1Txt" type="text" /></div>
</div>
<div class="hlpfrm_grup">
<div class="hlpfrm_txt">Detailed description</div>
<div class="hlpfrm_field"><textarea class="hlpfrm_100" name="descriptionTxt" id="descriptionTxt" rows="10"></textarea></div>
</div>
</div>
</div>
  
 
<div class="form-group">&nbsp;</div>

<div class="form-group">
<!-- <img src="captcha.php"> -->
<center><div class="g-recaptcha" data-sitekey="6Lc4xC0UAAAAACi_TpNixlXnPxzcmaQnQVay4OL4"></div></center>
</div>

<!-- <div class="form-group">
  <input style="padding:3px 0 3px 10px;" type="text" class="form-control" name="captchaTxt" id="captchaTxt" placeholder="Enter Security Code: *"/>
</div> -->

<div class="form-group text-center">
<button class="Submit" type="submit">Submit</button>
<!--<input src="proveg/wp-content/themes/ecotheme/images/submit-btn.png" type="image" value="submit" /></div>-->
</form>
</div>
</div>


	</div><!-- #main .wrapper -->

	

</div><!-- #page -->

<!--div class="whatsapp-logo">
<a href="https://wa.me/919914033800?text=Hi%2C%20EcoStan%2C%20I%20have%20some%20queries%20regarding%20your%20services" 	target="_blank"><img src="https://www.ecostan.com/wp-content/uploads/2022/12/whatslogo.png" alt="whatsapp"></a>
</div-->


<?php include('./footernew.php'); ?>