<?php

$username = $email = $birthdate = $password = $cpassword ="";
$usernameErr = $emailErr = $birthdateErr = $passwordErr = $cpasswordErr ="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["username"])){
        $username_error = "Username is required";
    }
    if(empty($_POST["email"])){
        $email_error = "Email is required";
    }
    if(empty($_POST["birthdate"])){
        $birthdate_error = "Birthdate is required";
    }
    if(empty($_POST["password"])){
        $password_error = "Password is required";
    }
    if(empty($_POST["cpassword"])){
        $cpassword_error = "Confirm password is required";
    }
}
include("connection.php");
if($username && $email && $birthdate && $password && $cpassword){
 $query = mysqli_query($conn,"INSERT INTO `noors_tb`(`username`, `email`, `birthdate`, `password`, `cpassword`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]');");
 
 
 echo "<script language = 'javascript> alert ('create account has been inserted!')</script>";
}

?>


<html>
<head>
    <title>Login and Registration Form</title>   
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="hero">
    <div class="form-box">
       <div class="buttom-box">
         <div id="btn"></div>
            <button type="button" class="toggle-btn" onclick="login()">Log In</button>
            <button type="button" class="toggle-btn"onclick="register()">Register</button>
        </div>
            <form id="login" class="input-group">
                <input type="text" class="input-field" placeholder="User name:"required>
                <input type="text" class="input-field" placeholder="Enter password:"required>  
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <button type="submit" class="submit-btn">Log in </button>
            </form>
                <form id="register" class="input-group">
                <input type="text" class="input-field" placeholder="User name:"required>
                <span><?php if(isset($username_error))echo $username_error;?></span>
                <input type="email" class="input-field" placeholder="Email address:"required>
                <span><?php if(isset($email_error))echo $email_error;?></span>
                <span><?php if(isset($birthdate_error))echo $birthdate_error;?></span>
                <input type="text" class="input-field" placeholder="Enter password:"required>
                <span><?php if(isset($password_error))echo $password_error;?></span>
                <input type="text" class="input-field" placeholder="Confirm password:"required>
                <span><?php if(isset($cpassword_error))echo $cpassword_error;?></span>
                <input type="checkbox" class="check-box"><span>I agree to the terms & conditions</span>
                <button type="submit" class="submit-btn">Register</button>
            </form>      
        </div>
    </div>
        
       <script>
       var x = document.getElementById("login");
       var y = document.getElementById("register");
       var z = document.getElementById("btn");
           
        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }
    </script>   
</body>
</html>