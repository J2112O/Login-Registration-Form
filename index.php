<?php
include("db/connect.php");

$error = "";

if (isset($_POST['submit'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    // Handling the image stuff below
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name']; // temporary image name.
    $imageSize = $_FILES['image']['size']; // image size.
    
    if (strlen($firstName) < 3) {
        $error = "First name is too short.";
    }

    else if (strlen($lastName) < 3) {
    $error = "Last name is too short.";
    }

    // Using this to validate the email
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Please enter a valide email address.";
    }

    else if (strlen($password) < 8) {
    $error = "Password must be greater than 8 characters.";
    }

    else if ($password !== $confirmPassword) {
    $error = "Password does not match.";
    }

    else if ($image == "") {
        $error = "Please upload your image.";
    }

    else {
        $error = "Your are successful.";
    }
}


?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registration Page</title>
        <link rel="stylesheet" href="css/styles.css">
        <!--<link rel="author" href="humans.txt">-->
    </head>
    <body>
        <div id="error"><?php echo $error ?>;</div>
        <div id="wrapper">
        	<div id="formDiv">
        		<!--The enctype allows users to upload files and pictures.-->
        	<form action="index.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        		<label>First Name:</label><br>
        		<input type="text" name="first_name"/><br><br>
        		<label>Last Name:</label><br>
        		<input type="text" name="last_name"/><br><br>
        		<label>Email:</label><br>
        		<input type="text" name="email"/><br><br>
        		<label>Password:</label><br>
        		<input type="password" name="password"/><br><br>
                <label>Confirm Password:</label><br>
                <input type="password" name="confirm_password"/><br><br>
        		<label>Image:</label><br>
        		<input type="file" name="image"/><br><br>
        		<input type="submit" name="submit"/>
        	</form>
        	</div>
        </div>
        <!--<script src="js/main.js"></script>-->
    </body>
</html>
