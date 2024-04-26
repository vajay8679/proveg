<?php include('headernew.php'); ?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    form {
        max-width: 500px;
        margin: 0 auto;
        background-color: #6CB644;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form_group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    textarea {
        resize: vertical;
    }

    input[type="submit"] {
        background-color: #6CB644;
        color: #6CB644;
        border: none;
        padding: 12px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color:#6CB644;
    }

    small {
        color: red;
    }
</style>
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
          <!-- <ul class="top-breadcrumb animate" data-anim-type="fadeInRight">
            <li><a href="index.html">Home</a></li>
            <li class="active"><a href="#">Pro-Veg Engneering</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /Page Title Section -->
<?php
  if(isset($_REQUEST['sub_enq']) && $_REQUEST['sub_enq'])
  {
	$name= $_REQUEST['enq_name'];
	$email= $_REQUEST['enq_mail'];
	$enq_msg= $_REQUEST['enq_msg'];
	$pro_cat= $_REQUEST['pro_cat'];
	$product= $_REQUEST['pro'];
	$file_path= $_REQUEST['file'];
	
//Send email to user with attached file
$file = '/home/provegengineerin/public_html/admin/upload/keyproject/'.$pro_cat.'/'.$file_path;//getcwd()."/admin/".$file_path;
$filename= end(explode('/',$file_path));
$subject = 'Project Enquiry - '.$product;
$message = 'Dear '.$name.',<br><br> We have recieved your query for the project <strong>'.$product.'</strong>. We will get back to you soon.<br><br> Thank You<br> Proveg Engineering';

$content = file_get_contents($file);
$content = chunk_split(base64_encode($content));

// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (RFC)
$eol = "\r\n";

// main header (multipart mandatory)
$headers = "From: Proveg Engineering <info@provegengineering.in>" . $eol;
$headers .= "MIME-Version: 1.0" . $eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
$headers .= "Content-Transfer-Encoding: 7bit" . $eol;
$headers .= "This is a MIME encoded message." . $eol;

// message
$body = "--" . $separator . $eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
$body .= "Content-Transfer-Encoding: 8bit" . $eol;
$body .= $message . $eol;

// attachment
$body .= "--" . $separator . $eol;
$body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
$body .= "Content-Transfer-Encoding: base64" . $eol;
$body .= "Content-Disposition: attachment" . $eol;
$body .= $content . $eol;
$body .= "--" . $separator . "--";


$html ='<table width="318" height="157" border="1">
  <tr>
    <td width="140">Name</td>
    <td width="165">'.$name.'</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>'.$email.'</td>
  </tr>
  <tr>
    <td>Message</td>
    <td>'.$enq_msg.'</td>
  </tr>
</table>';

// Always set content-type when sending HTML email
$headers1 = "MIME-Version: 1.0" . "\r\n";
$headers1 .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers1 .= 'From: Proveg Engineering <info@provegengineering.in>' . "\r\n";


//SEND Mail
if (mail($email, $subject, $body, $headers) && mail('info@provegengineering.in',$subject,$html,$headers1)) {
echo "<script>window.alert('Your Enquiry has been submitted successfully !. Please check your email');</script>"; // or use booleans here
} else {
echo "<script>window.alert('There is something wrong. Please try again.');</script>"; 
}

  }
 
$stv = $_GET['proid'];
$sql=mysqli_query($conn,"SELECT * FROM keyproject WHERE id='$stv'"); 

if ($sql) {
  // Fetch data or perform other operations
  $row = mysqli_fetch_assoc($sql);
  // Your code here
} else {
  // Handle the error, for example:
  echo "Error: " . mysqli_error($conn);
}

$oid = $row['oid'];
$sql1=mysqli_query($conn,"SELECT * FROM keyproject_cat WHERE id='$oid'"); 

if ($sql1) {
  // Fetch data or perform other operations
  $row1 = mysqli_fetch_assoc($sql1);
  // Your code here
} else {
  // Handle the error, for example:
  echo "Error: " . mysqli_error($conn);
}
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
              <div class="blog-post-title-wrapper"> <a href="admin/upload/keyproject/<?php echo $row1['title'].'/'.$row['image'] ?>" target="_blank"><img src="images/pdf-icon.gif" align="right" style="text-align:right;" class="img-responsive" /></a>
                <h2><?php echo $row['title'] ?></h2>
               
                <?php echo $row['description']; ?> </div>
              <div class="clearfix"></div>
              <div class="comment_form_section animate" data-anim-type="fadeInUp" data-anim-delay="800">
                <h2>Leave a Message on this project</h2>
                <form role="form" method="post">
                  <div class="form_group">
                    <label for="exampleInputEmail1">Name<small>*</small></label>
                    <input name="enq_name" type="name" id="exampleInputEmail1" class="con_input_control">
                  </div>
                  <input type="hidden" name="pro_cat" value="<?php echo $row1['title'] ?>"  />
                  <input type="hidden" name="pro" value="<?php echo $row['title'] ?>"  />
                  <input type="hidden" name="file" value="<?php echo $row['image'] ?>"  />
                  <div class="form_group">
                    <label for="exampleInputEmail1">Email<small>*</small></label>
                    <input name="enq_mail" type="email" id="exampleInputEmail1" class="con_input_control">
                  </div>
                  <div class="form_group">
                    <label for="exampleInputPassword1">Message</label>
                    <textarea name="enq_msg" class="con_textarea_control" rows="5"></textarea>
                  </div>
                  <input type="submit" name="sub_enq" class="main-btn btn-more btn-left" value="Send Message" />
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php //include('sidebar.php'); ?>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<?php include('footernew.php'); ?>
