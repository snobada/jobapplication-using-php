<?php
include("db.php");

$message = "";

if(isset($_POST['submit']))
{
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validation
    if(!preg_match("/^[A-Za-z ]+$/",$name))
    {
        $message = "Name should contain only letters.";
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $message = "Invalid Email Address.";
    }
    elseif(!preg_match("/^[0-9]{10}$/",$mobile))
    {
        $message = "Mobile number must contain 10 digits.";
    }
    elseif(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$/",$password))
    {
        $message="Password must contain at least 8 characters, one uppercase, one lowercase and one number.";
    }
    else
    {
        $hash = password_hash($password,PASSWORD_DEFAULT);

        $sql="INSERT INTO applicants(name,email,mobile,username,password)
              VALUES('$name','$email','$mobile','$username','$hash')";

        if($conn->query($sql)==TRUE)
        {
            $message="Registration Successful!";
        }
        else
        {
            $message="Database Error!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Job Application Form</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h2>Job Application Form</h2>

<p class="msg"><?php echo $message; ?></p>

<form method="post">

<label>Name</label>
<input type="text" name="name" required>

<label>Email</label>
<input type="email" name="email" required>

<label>Mobile Number</label>
<input type="text" name="mobile" required>

<label>Username</label>
<input type="text" name="username" required>

<label>Password</label>
<input type="password" name="password" required>

<input type="submit" name="submit" value="Apply">

</form>

</div>

</body>
</html>