<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php

  if(isset($_POST['submit']))
  {
  		$f_name=$_POST['fname'];
     	$l_name = $_POST['lname'];
		$msg = $_POST['msg'];
     	$email = $_POST['email'];
		$nameErr=$nameErr2=$emailErr=$msgErr="";
		
		// name validater
		   if (empty($f_name)) 
		   {
			 $nameErr = "Name is required";
			 echo "<script type='text/javascript'>alert('$nameErr');history.go(-1);</script>";
		   } 
		   else
		   {
			 $fname = test_input($f_name);
			
			 // check if name only contains letters and whitespace
			 if (!preg_match("/^[a-zA-Z ]*$/",$fname)) 
			 {
			   $nameErr = "Only letters and white space allowed in First Name";
			   echo "<script type='text/javascript'>alert('$nameErr');history.go(-1);</script>";
			 }
		   }
		   
		   // Message validater
		   if (empty($msg)) 
		   {
			 $msgErr = "Message is required";
			 echo "<script type='text/javascript'>alert('$msgErr');history.go(-1);</script>";
		   } 
		   
		   // name validater
		   if (empty($l_name)) 
		   {
			 $nameErr2 = "Name is required";
			 echo "<script type='text/javascript'>alert('$nameErr2');history.go(-1);</script>";
		   } 
		   else
		   {
			 $lname = test_input($l_name);
			
			 // check if name only contains letters and whitespace
			 if (!preg_match("/^[a-zA-Z ]*$/",$lname)) 
			 {
			   $nameErr2 = "Only letters and white space allowed in Last name";
			   echo "<script type='text/javascript'>alert('$nameErr2');history.go(-1);</script>";
			 }
		   }
		   
		   //email validation
   
			if (empty($email))
			{
			 $emailErr = "Email is required";
			 echo "<script type='text/javascript'>alert('$emailErr');history.go(-1);</script>";
			} 
			else 
			{
			 $email1 = test_input($email);
			 
			 if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) 
			 {
			   $emailErr = "Invalid email format";
			   echo "<script type='text/javascript'>alert('$emailErr');history.go(-1);</script>";
			 }
			}
		
    	
		if($nameErr=="" && $nameErr2=="" && $emailErr=="" && $msgErr=="")
		{
     		$subject = "Product Enquiry"; 
     		$to = "info@provegengineering.in";
			$body = "Name: $f_name\r\nEmail-id: $email\r\nQuery: $msg";
    		$success = mail($to,$subject,$body,"From:$email");
     		if($success)
     		{
	 	
        		$message = "Your message has been sent! We will be in touch soon.";
				echo "<script type='text/javascript'>alert('$message');window.location = 'index.php';</script>";
				
     		}
     		else
     		{
         		$message1 = "Error in seding Message please Enter detail correctly.";
				echo "<script type='text/javascript'>alert('$message1');history.go(-1);</script>";
		
     		}
	 	}
  }
 function test_input($data) 
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>
</body>
</html>
