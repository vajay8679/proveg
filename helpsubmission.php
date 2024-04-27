<?php include('./headernew.php'); ?>

<?php

// Function to sanitize and validate input
function test_input($data) {
    $data = trim($data); // Remove whitespace from the beginning and end of the string
    $data = stripslashes($data); // Remove backslashes (\)
    $data = htmlspecialchars($data); // Convert special characters to HTML entities
    return $data;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define variables and initialize with empty values
    $name = $coname = $phone = $email = $cc = $machname = $puryear = $tickettype = $subject = $description = "";

    // Processing form data when form is submitted
    $name = test_input($_POST["nameTxt"]);
    $coname = test_input($_POST["conameTxt"]);
    $phone = test_input($_POST["phoneTxt"]);
    $email = test_input($_POST["emailTxt"]);
    $cc = test_input($_POST["ccTxt"]);
    $machname = test_input($_POST["machnameTxt"]);
    $puryear = test_input($_POST["puryearTxt"]);
    $tickettype = test_input($_POST["tickettypeTxt"]);
    $subject = test_input($_POST["subject1Txt"]);
    $description = test_input($_POST["descriptionTxt"]);

    // Database connection
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

    // Prepare SQL query
    $sql = "INSERT INTO help_enquiry (name, company_name, phone_no, email, cc_to, machine_name, purchase_year, ticket_type, subject, description)
            VALUES ('$name', '$coname', '$phone', '$email', '$cc', '$machname', '$puryear', '$tickettype', '$subject', '$description')";

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
    $conn->close();
}

?>
<?php include('./footernew.php'); ?>