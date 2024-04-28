<?php include('headernew.php'); ?>
<style>
    .text-ellipsis {
    white-space: normal;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2; /* Number of lines to show */
    -webkit-box-orient: vertical;
    max-width: 100%;
}
</style>

<div id="page" class="hfeed site">
<div id="main" class="wrapper">
<div class="col-lg-12">
<div class="container">
<div class="row">

<div class="col-md-9 col-sm-9 blog-detail-wrap">
<!-- Blog detail content starts -->
<?php

if(isset($_GET['proid']) && !empty($_GET['proid'])) {
  $stv = $_GET['proid'];

$blogdata=[];
if ($conn) {
	$sql = "SELECT * FROM blog where id='$stv'";
	$blogdata =  $conn->query($sql);  
}

} else {
   echo "This Page Not Found 404 Error";
}

foreach($blogdata as $blog){
	$id=$blog['id'];
	$img=$blog['image'];
	$title=$blog['title'];
  $url=$blog['url'];
  $description=$blog['description'];
  $date=$blog['date'];

?>

<header class="entry-header">

<img width="624" height="299" src="admin/<?php echo $img;?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" decoding="async" fetchpriority="high" srcset="" sizes="(max-width: 624px) 100vw, 624px" />
            <h1 class="entry-title"><?php echo $title; ?></h1>
                            <div class="comments-link">
        <a href="unlocking-green-energy-exploring-the-power-of-ecostan-90-briquette-machine.html#respond"><span class="leave-reply">Leave a reply</span></a>				</div><!-- .comments-link -->
        </header><!-- .entry-header -->
<!-- <div class="entry-content">
<h1><strong><?php echo $title; ?></strong></h1>
<div id="attachment_9465" style="width: 1292px" class="wp-caption alignnone">
<img decoding="async" aria-describedby="caption-attachment-9465" class="wp-image-9465 " 
src="admin/<?php echo $img;?>" alt="" width="1282" 
height="1282" srcset="" sizes="(max-width: 1282px) 100vw, 1282px" /><p id="caption-attachment-9465" class="wp-caption-text"></p></div>


<p><?php echo  $description; ?></p>
        </div> -->

        <div class="entry-content">
                                <div class="col-sm-10 text-left">
                                    <div class="right-div">
                                        <h2 class="heading text-left"><span class="eco-red">PROVEG<sup>®</sup></span>
                                            <?php echo !empty($title) ? $title : '' ?></h2>
                                        <h6 class="text-right sm-navi"><a href="products.html">All Products</a> / <span
                                                class="sm-navi-curr"><?php echo !empty($title) ? $title : '' ?></span></h6>
                                        <div id="jssor_1"
                                            style="position: relative; width: 780px; height: 450px; overflow: hidden; visibility: hidden;">
                                            <!-- Loading Screen -->
                                            <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                                                <div
                                                    style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;">
                                                </div>
                                                <div
                                                    style="position: absolute; display: block; background: url('img/loading.html') no-repeat center center; top: 0px; left: 0px; width: 100%; height: 100%;">
                                                </div>
                                            </div>
                                            <div data-u="slides"
                                                style="cursor: default; position: relative; top: 0px; left: 0px; width: 780px; height: 450px; overflow: hidden;">
                                                <?php 
                                            $productdetail=[];
                                            if ($conn) {

                                            }
                                            $sql = "SELECT * FROM blog where id='$stv'";
                                            // $sql = "SELECT * FROM blog";
	                                            $blogdata =  $conn->query($sql);  

                                            foreach($blogdata as $productall){
                                                $idall=$productall['id'];
                                                $imgall=$productall['image'];
                                                $titleall=$productall['title'];
                                                $descriptionall=$productall['description'];
                                                $url=$blog['url'];
                                                // $thumball=$productall['thumb'];
                                            ?>
                                                <div data-p="112.50" style="display: none;">
                                                    <img decoding="async" alt="Briquette Machine" data-u="image"
                                                        src="admin/<?php echo $imgall;?>">
                                                    <div data-u="thumb"><?php echo !empty($titleall) ? $titleall : '' ?></div>
                                                </div>
                                                
                                                <?php
                                                    }
                                                ?>

                                            </div>
                                            <!-- Thumbnail Navigator -->
                                            <div data-u="thumbnavigator" class="jssort09-600-45"
                                                style="position: absolute; bottom: 3px; left: 3px; right: 3px; width: 774px; height: 55px;">
                                                <div
                                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: #000; filter: alpha(opacity=40.0); opacity: 0.7;">
                                                </div>
                                                <!-- Thumbnail Item Skin Begin -->
                                                <div data-u="slides" style="cursor: default;">
                                                    <div data-u="prototype" class="p">
                                                        <div data-u="thumbnailtemplate" class="t"></div>
                                                    </div>
                                                </div>
                                                <!-- Thumbnail Item Skin End -->
                                            </div>
                                            <!-- Bullet Navigator -->
                                            <div data-u="navigator" class="jssorb03" style="bottom: 20px; right: 16px;">
                                                <!-- bullet navigator item prototype -->
                                                <div data-u="prototype" style="width: 21px; height: 21px;">
                                                    <div data-u="numbertemplate"></div>
                                                </div>
                                            </div>
                                            <!-- Arrow Navigator -->
                                            <span data-u="arrowleft" class="jssora05l"
                                                style="top: 0px; left: 8px; width: 40px; height: 40px;"
                                                data-autocenter="2"></span>
                                            <span data-u="arrowright" class="jssora05r"
                                                style="top: 0px; right: 8px; width: 40px; height: 40px;"
                                                data-autocenter="2"></span>
                                            <script>
                                            jssor_1_slider_init();
                                            </script>
                                        </div>

                                        <div class="col-md-12 text-left">
                                            <div class="rgt-a1 marg">
                                                <p class="text-justify" style="padding-top:10px;">
                                                    <strong>Process:</strong> 
                                                    <?php echo  !empty($description) ? $description : ''; ?>
                                                </p>                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .entry-content -->
                            

        
<footer class="entry-meta">
This entry was posted in <a href="blog.php" rel="category tag">Blog</a>, <a href="blog.php" rel="category tag">Machinery</a> on <a href="blog.php" title="11:01 am" rel="bookmark"><time class="entry-date" datetime="2024-02-20T11:01:35+00:00">February 20, 2024</time></a><span class="by-author"> by <span class="author vcard"><a class="url fn n" href="blog.php" title="View all posts by admin" rel="author">admin</a></span></span>.								</footer><!-- .entry-meta -->
<!-- #post -->                  <!-- Blog detail content ends -->
<!-- Blog Tags starts -->
<div class="rs-category single-post-cat">
<div class="cater">
    <!--b class="cate">Tags :</b-->
                                </div>
</div>
<!-- Blog Tags ends -->
</div>
<div class="col-md-3 col-sm-3 blog-sidebar-wrap blog-aside">
<!-- Blog detail sidebar starts -->

<div id="secondary" class="widget-area" role="complementary">
        <div class="lt-div">

                                   

            <div class="lt-common">
              
<!-- Blog detail equiry form starts -->
<h5 class="blk text-left">Send us an Enquiry</h5>
<center>Please fill the form to get a quote:</center>
<form id="myForm" action="process_form.php" method="post" onSubmit="return validations()">
<div class="form-group">
<!--<input Style="padding: 3px 10px 3px 10px; margin-top: 10px;" class="form-control" value="I am interested in <?php echo $title; ?>" type="text" />-->
<input type="hidden" name="catidhd" value="2" /> <input type="hidden" name="catnamehd" value="Briquette Machine" />
</div>
<div class="form-group">
<input Style="padding: 3px 0 3px 10px;" class="form-control" name="nameTxt" id="nameTxt" placeholder="Name" type="text" />
</div>
<div class="form-group">
<input Style="padding: 3px 0 3px 10px;" class="form-control" name="addressTxt" id="addressTxt" placeholder="Address" type="text" />
</div>
<div class="form-group">
<select id="countrylist" name="countrylist" style="width: 100%; color:#777;">
<option selected="selected" value="India">India</option>
<option value="Afghanistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antarctica">Antarctica</option>
<option value="Antigua and Barbuda">
  Antigua and
  Barbuda
</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia and Herzegovina">
  Bosnia and
  Herzegovina
</option>
<option value="Botswana">Botswana</option>
<option value="Bouvet Island">Bouvet Island</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Territory">
  British
  Indian Ocean Territory
</option>
<option value="Brunei Darussalam">
  Brunei
  Darussalam
</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burma">Burma</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canton and Enderbury Islands">
  Canton
  and Enderbury Islands
</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">
  Central
  African Republic
</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos (Keeling) Islands">
  Cocos
  (Keeling) Islands
</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote D'Ivoire">Cote D'Ivoire</option>
<option value="Croatia (Hrvatska)">
  Croatia
  (Hrvatska)
</option>
<option value="Cuba">Cuba</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Democratic Yemen">Democratic Yemen</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">
  Dominican
  Republic
</option>
<option value="Dronning Maud Land">
  Dronning Maud
  Land
</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">
  Equatorial
  Guinea
</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands (Malvinas)">
  Falkland
  Islands (Malvinas)
</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="France, Metropolitan">
  France,
  Metropolitan
</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Territories">
  French
  Southern Territories
</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-bisseu">Guinea-bisseu</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Heard and Mc Donald Islands">
  Heard
  and Mc Donald Islands
</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran (Islamic Republic of)">
  Iran
  (Islamic Republic of)
</option>
<option value="Iraq">Iraq </option>
<option value="Ireland">Ireland</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Ivory Coast">Ivory Coast</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Johnston Island">Johnston Island</option>
<option value="Jordan">Jordan</option>
<option value="Kazakstan">Kazakstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea, Democratic People's Republic of">
  Korea,
  Democratic People's Republic of
</option>
<option value="Korea, Republic of">
  Korea, Republic
  of
</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Lao People's Democratic Republic">
  Lao
  People's Democratic Republic
</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libyan Arab Jamahiriya">
  Libyan Arab
  Jamahiriya
</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia, Federated States of">
  Micronesia,
  Federated States of
</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova, Republic of">
  Moldova,
  Republic of
</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherlands">Netherlands</option>
<option value="Netherlands Antilles">
  Netherlands
  Antilles
</option>
<option value="Neutral Zone">Neutral Zone</option>
<option value="New Calidonia">New Calidonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Northern Mariana Islands">
  Northern
  Mariana Islands
</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pacific Islands">Pacific Islands</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russian Federation">
  Russian
  Federation
</option>
<option value="Rwanda">Rwanda</option>
<option value="S. Georgia and S. Sandwich Isls">
  S.
  Georgia and S. Sandwich Isls.
</option>
<option value="Saint Lucia">Saint Lucia</option>
<option value="Saint Vincent/Grenadines">
  Saint
  Vincent/Grenadines
</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome and Principe">
  Sao Tome and
  Principe
</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia (Slovak Republic)">
  Slovakia
  (Slovak Republic)
</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="St. Helena">St. Helena</option>
<option value="St. Kitts Nevis Anguilla">
  St. Kitts
  Nevis Anguilla
</option>
<option value="St. Pierre and Miquelon">
  St. Pierre
  and Miquelon
</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Svalbard and Jan Mayen Islands">
  Svalbard
  and Jan Mayen Islands
</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syran Arab Republic">
  Syran Arab
  Republic
</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania, United Republic of">
  Tanzania,
  United Republic of
</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">
  Trinidad and
  Tobago
</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks and Caicos Islands">
  Turks and
  Caicos Islands
</option>
<option value="Tuvalu">Tuvalu</option>
<option value="US Minor Outlying Islands">
  US Minor
  Outlying Islands
</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">
  United Arab
  Emirates
</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States">United States</option>
<option value="United States Pacific Islands">
  United
  States Pacific Islands
</option>
<option value="Upper Volta">Upper Volta</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">
  Vatican City
  State
</option>
<option value="Venezuela">Venezuela</option>
<option value="VietNam">VietNam</option>
<option value="Virgin Islands, British">
  Virgin
  Islands, British
</option>
<option value="Virgin Islands, Unites States">
  Virgin
  Islands, Unites States
</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis and Futuma Islands">
  Wallis
  and Futuma Islands
</option>
<option value="Western Sahara">Western Sahara</option>
<option value="Yemen">Yemen</option>
<option value="Yugoslavia">Yugoslavia</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
<option value="Other">Other</option>
</select>
</div>
<div class="form-group">
<input Style="padding: 3px 0 3px 10px;" class="form-control" name="phoneTxt" id="phoneTxt" placeholder="Contact No. *" type="tel" />
</div>
<div class="form-group">
<input Style="padding: 3px 0 3px 10px;" class="form-control" name="emailTxt" id="emailTxt" placeholder="E-mail *" type="text" />
</div>
<div class="form-group">
<textarea Style="padding: 0 0 0 10px; height:100px;" class="form-control" name="requirementsTxt" id="requirementsTxt" placeholder="Requirement Details *" type="text" ></textarea>
</div>

<div class="form-group">
<div class="g-recaptcha" data-sitekey="6LfPbdwUAAAAABwQtSULoW5IliM8Kzj7DWNpOo5f"></div>
</div>

<!-- <div class="form-group">
<input style="padding:3px 0 3px 10px;" type="text" class="form-control" name="captchaTxt" id="captchaTxt" placeholder="Enter Security Code: *"/>
</div> -->

<div class="form-group text-center">
 <button class="Submit" type="submit">Submit</button>
</div>
</form>
<!-- Blog detail equiry form ends -->     
<div style="margin-bottom: 20px;">
</div>

                <?php
        // Extract URL from the current blog data
        $url = $blog['url'];

        // Extract video ID from YouTube URL
        parse_str(parse_url($url, PHP_URL_QUERY), $params);
        $video_id = isset($params['v']) ? $params['v'] : '';;

        // Generate iframe for embedding YouTube video
$iframe_src = 'https://www.youtube.com/embed/' . $video_id;
        ?>
  <!-- <a href="javascript:void(0);" onclick="openVideoPopup('<?php echo $iframe_src; ?>')">
                                    
                                   <img src="https://img.youtube.com/vi/Amn6C_Gw8O8/maxresdefault.jpg" alt="Video Thumbnail" width="300" height="200">
                                </a> -->

                                <div class="embed-responsive embed-responsive-16by9">
        <a href="#" class="popup-btn" data-toggle="modal" data-src="<?php echo $embedUrl; ?>">
    <iframe width="300" height="200" src="https://www.youtube.com/embed/<?php echo $video_id; ?>?autoplay=1" frameborder="0" allowfullscreen>
 <!-- <img src="https://img.youtube.com/vi/<?php echo $videoId; ?>/maxresdefault.jpg" class="img-fluid" alt="Video Thumbnail"> -->
                    </iframe>
                    
                    </a>
                </div>
       
        <?php //echo $iframe_html; ?>

        <?php
        }
        ?>
<script>
     // Function to open pop-up window with the video
                                    function openVideoPopup(videoSrc) {
                                        var width = 800; // Adjust as needed
                                        var height = 600; // Adjust as needed
                                        var leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
                                        var topPosition = (window.screen.height / 2) - ((height / 2) + 50);
                                        var popup = window.open(videoSrc, 'videoPopup', 'width=' + width + ', height=' + height + ', left=' + leftPosition + ', top=' + topPosition + ', location=no, toolbar=no, resizable=no, scrollbars=yes');
                                        if (!popup) {
                                            alert('Please allow pop-ups for this website to view the video.');
                                        }
                                    }
                                </script>
                <script src="bpm_video/jquery.tools.min.js" type="text/javascript"></script>

                <script src="bpm_video/videolightbox.js" type="text/javascript"></script>

            </div>

        </div>	

</div><!-- #secondary -->

<aside id="search-2" class="widget widget_search"><form role="search" method="get" id="searchform" class="searchform" action="index.php">
    <div>
        <label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="Search" />
    </div>
</form></aside>
<aside id="recent-posts-2" class="widget widget_recent_entries">
<h3 class="widget-title">Recent Posts</h3>
<?php
foreach($blogdata as $blog){
	$id=$blog['id'];
	$img=$blog['image'];
	$title=$blog['title'];
  $description=$blog['description'];
  $date=$blog['date'];
	?>
		<ul>
											<li>
                      <a href="blog-detail-new.php?proid=<?php echo $id; ?>"><?php echo $title; ?></a>
									</li>
											
					</ul>
<?php } ?>
</aside><aside id="categories-2" class="widget widget_categories"><h3 class="widget-title">Categories</h3>
<ul>
        <li class="cat-item cat-item-3"><a href="blog.php">Blog</a>
</li>

</ul>

</aside>    <!-- Blog detail sidebar ends -->
<div class="upr-form">


<!-- Blog detail equiry form starts -->
<h5 class="blk text-left">Send us an Enquiry</h5>
<center>Please fill the form to get a quote:</center>
<form id="myForm" action="process_form.php" method="post" onSubmit="return validations()">
<div class="form-group">
<input Style="padding: 3px 10px 3px 10px; margin-top: 10px;" class="form-control" value="I am interested in <?php echo $title; ?>" type="text" />
<input type="hidden" name="catidhd" value="2" /> <input type="hidden" name="catnamehd" value="Briquette Machine" />
</div>
<div class="form-group">
<input Style="padding: 3px 0 3px 10px;" class="form-control" name="nameTxt" id="nameTxt" placeholder="Name" type="text" />
</div>
<div class="form-group">
<input Style="padding: 3px 0 3px 10px;" class="form-control" name="addressTxt" id="addressTxt" placeholder="Address" type="text" />
</div>
<div class="form-group">
<select id="countrylist" name="countrylist" style="width: 100%; color:#777;">
<option selected="selected" value="India">India</option>
<option value="Afghanistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antarctica">Antarctica</option>
<option value="Antigua and Barbuda">
  Antigua and
  Barbuda
</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia and Herzegovina">
  Bosnia and
  Herzegovina
</option>
<option value="Botswana">Botswana</option>
<option value="Bouvet Island">Bouvet Island</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Territory">
  British
  Indian Ocean Territory
</option>
<option value="Brunei Darussalam">
  Brunei
  Darussalam
</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burma">Burma</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canton and Enderbury Islands">
  Canton
  and Enderbury Islands
</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">
  Central
  African Republic
</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos (Keeling) Islands">
  Cocos
  (Keeling) Islands
</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote D'Ivoire">Cote D'Ivoire</option>
<option value="Croatia (Hrvatska)">
  Croatia
  (Hrvatska)
</option>
<option value="Cuba">Cuba</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Democratic Yemen">Democratic Yemen</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">
  Dominican
  Republic
</option>
<option value="Dronning Maud Land">
  Dronning Maud
  Land
</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">
  Equatorial
  Guinea
</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands (Malvinas)">
  Falkland
  Islands (Malvinas)
</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="France, Metropolitan">
  France,
  Metropolitan
</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Territories">
  French
  Southern Territories
</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-bisseu">Guinea-bisseu</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Heard and Mc Donald Islands">
  Heard
  and Mc Donald Islands
</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran (Islamic Republic of)">
  Iran
  (Islamic Republic of)
</option>
<option value="Iraq">Iraq </option>
<option value="Ireland">Ireland</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Ivory Coast">Ivory Coast</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Johnston Island">Johnston Island</option>
<option value="Jordan">Jordan</option>
<option value="Kazakstan">Kazakstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea, Democratic People's Republic of">
  Korea,
  Democratic People's Republic of
</option>
<option value="Korea, Republic of">
  Korea, Republic
  of
</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Lao People's Democratic Republic">
  Lao
  People's Democratic Republic
</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libyan Arab Jamahiriya">
  Libyan Arab
  Jamahiriya
</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia, Federated States of">
  Micronesia,
  Federated States of
</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova, Republic of">
  Moldova,
  Republic of
</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherlands">Netherlands</option>
<option value="Netherlands Antilles">
  Netherlands
  Antilles
</option>
<option value="Neutral Zone">Neutral Zone</option>
<option value="New Calidonia">New Calidonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Northern Mariana Islands">
  Northern
  Mariana Islands
</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pacific Islands">Pacific Islands</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russian Federation">
  Russian
  Federation
</option>
<option value="Rwanda">Rwanda</option>
<option value="S. Georgia and S. Sandwich Isls">
  S.
  Georgia and S. Sandwich Isls.
</option>
<option value="Saint Lucia">Saint Lucia</option>
<option value="Saint Vincent/Grenadines">
  Saint
  Vincent/Grenadines
</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome and Principe">
  Sao Tome and
  Principe
</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia (Slovak Republic)">
  Slovakia
  (Slovak Republic)
</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="St. Helena">St. Helena</option>
<option value="St. Kitts Nevis Anguilla">
  St. Kitts
  Nevis Anguilla
</option>
<option value="St. Pierre and Miquelon">
  St. Pierre
  and Miquelon
</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Svalbard and Jan Mayen Islands">
  Svalbard
  and Jan Mayen Islands
</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syran Arab Republic">
  Syran Arab
  Republic
</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania, United Republic of">
  Tanzania,
  United Republic of
</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">
  Trinidad and
  Tobago
</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks and Caicos Islands">
  Turks and
  Caicos Islands
</option>
<option value="Tuvalu">Tuvalu</option>
<option value="US Minor Outlying Islands">
  US Minor
  Outlying Islands
</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">
  United Arab
  Emirates
</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States">United States</option>
<option value="United States Pacific Islands">
  United
  States Pacific Islands
</option>
<option value="Upper Volta">Upper Volta</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">
  Vatican City
  State
</option>
<option value="Venezuela">Venezuela</option>
<option value="VietNam">VietNam</option>
<option value="Virgin Islands, British">
  Virgin
  Islands, British
</option>
<option value="Virgin Islands, Unites States">
  Virgin
  Islands, Unites States
</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis and Futuma Islands">
  Wallis
  and Futuma Islands
</option>
<option value="Western Sahara">Western Sahara</option>
<option value="Yemen">Yemen</option>
<option value="Yugoslavia">Yugoslavia</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
<option value="Other">Other</option>
</select>
</div>
<div class="form-group">
<input Style="padding: 3px 0 3px 10px;" class="form-control" name="phoneTxt" id="phoneTxt" placeholder="Contact No. *" type="tel" />
</div>
<div class="form-group">
<input Style="padding: 3px 0 3px 10px;" class="form-control" name="emailTxt" id="emailTxt" placeholder="E-mail *" type="text" />
</div>
<div class="form-group">
<textarea Style="padding: 0 0 0 10px; height:100px;" class="form-control" name="requirementsTxt" id="requirementsTxt" placeholder="Requirement Details *" type="text" ></textarea>
</div>

<div class="form-group">
<div class="g-recaptcha" data-sitekey="6LfPbdwUAAAAABwQtSULoW5IliM8Kzj7DWNpOo5f"></div>
</div>

<!-- <div class="form-group">
<input style="padding:3px 0 3px 10px;" type="text" class="form-control" name="captchaTxt" id="captchaTxt" placeholder="Enter Security Code: *"/>
</div> -->

<div class="form-group text-center">
<input src="proveg/wp-content/themes/ecotheme/images/submit-btn.png" type="image" value="submit" />
</div>
</form>
<!-- Blog detail equiry form ends -->    </div>
</div>


</div>
<div class="row">
<div class="col-12">
<div class="btm-form">
      
  </div>
</div>
</div>
</div>
</div>


</div><!-- #main .wrapper -->



</div><!-- #page -->
<?php include('footernew.php'); ?>