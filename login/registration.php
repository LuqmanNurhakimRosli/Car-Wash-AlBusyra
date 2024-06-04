<?php
    require('db.php');
    //When for, submitted \, insert values ino the database.
    if (isset($_REQUEST['username'])){
        //remove backslashes

        $name    = stripslashes($_REQUEST['name']);
        $name    = mysqli_real_escape_string($con, $name);

        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con,$username);

        $contactnumber    = stripslashes($_REQUEST['contactnumber']);
        $contactnumber    = mysqli_real_escape_string($con, $contactnumber);

        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (name, username, password, contactnumber, email, create_datetime)
                     VALUES ('$name','$username', '" . md5($password) . "','$contactnumber', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

      body {
    background-image: url("wp3203647.jpg");
    background-size: cover;          /* Ensure the image covers the entire background */
    background-position: center;     /* Center the background image */
    background-repeat: no-repeat;    /* Prevent the image from repeating */
    background-attachment: fixed;    /* Make the background image fixed relative to the viewport */
    
        }
        .form{
            max-width: 350px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(50, 44, 241, 0.8);
            border-radius: 10px;
            
        }
    </style>
</head>
<body>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="name" placeholder="Name" />
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="contactnumber" placeholder="Contact Number"  />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="index.php">Click to Login</a></p>


    </form>
</body>
</html>