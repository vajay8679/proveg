<?php include('./headernew.php'); ?>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
$servername = "localhost";
$username = "u295964305_proveg";
$password = "4?mIRqI5SPs";
 $dbname = "u295964305_proveg";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape user inputs for security
    $interest = $conn->real_escape_string(isset($_POST['interest']) ? $_POST['interest'] : '');
    $name = $conn->real_escape_string($_POST['nameTxt']);
    $company = $conn->real_escape_string($_POST['conameTxt']);
    $address = $conn->real_escape_string($_POST['addressTxt']);
    $country = $conn->real_escape_string($_POST['countrylist']);
    $phone = $conn->real_escape_string($_POST['phoneTxt']);
    $email = $conn->real_escape_string($_POST['emailTxt']);
    $requirements = $conn->real_escape_string($_POST['requirementsTxt']);

    // Insert data into the database
    $sql = "INSERT INTO enquiry (interest, name, company, address, country, phone, email, requirements)
            VALUES ('$interest', '$name', '$company', '$address', '$country', '$phone', '$email', '$requirements')";

    if ($conn->query($sql) === TRUE) { ?>
  <title style="font-family: Arial, sans-serif; color: #333;">Thank You</title>
  <div style="text-align: center; margin: 100px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); max-width: 400px;">
    <h1 style="color: #333; margin-bottom: 10px;">Thank You!</h1>
    <p style="color: #666; margin-bottom: 20px;">Your message has been received.</p>
    <a href="index.php" style="display: inline-block; padding: 10px 20px; background-color: #6BB53D; color: #fff; text-decoration: none; border-radius: 4px; transition: background-color 0.3s;">Back to Home</a>
  </div>


<?php
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
<?php include('./footernew.php'); ?>
