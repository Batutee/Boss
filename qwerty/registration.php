<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"]))
if($_POST["username"] !="" && $_POST["password"] !="" && $_POST["confirmpassword"] !="" && $_POST["email"] !=""){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];    // ISNERT THE NAME OF TABLE REMOVE SPACES
  $duplicate = mysqli_query($conn, "SELECT * FROM '                                         ' WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){ 
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
                                           // ISNERT THE NAME OF TABLE REMOVE SPACES
       if($password == $confirmpassword){
      $query = "INSERT INTO            '                                        '       VALUES('','$name','$username','$email','$password','$user_type' )";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
    }
  }
}
$name= $username= $password= $confirmpassword= $email= "";
$nameErr= $usernameErr= $passwordErr= $confirmpasswordErr= $emailErr= "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["username"])){
		$usernameErr=" Username is Required!";
		}else{
			$username=$_POST["username"];
		}
        if(empty($_POST["password"])){
            $passwordErr=" Password is Required!";
            }else{
                $password=$_POST["password"];
            }
            if(empty($_POST["confirmpassword"])){
                $confirmpasswordErr=" Confirm password is Required!";
                }else{
                    $confirmpassword=$_POST["confirmpassword"];
                }
            if(empty($_POST["email"])){
            $emailErr="Email is Required!";
            }else{
            $email=$_POST["email"];
            }
            if(empty($_POST["name"])){
              $nameErr="Name is Required!";
              }else{
              $name=$_POST["name"];
              }
            }  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="styles.css">
<style>
body {
  background-image: url('background.jpg');
}
.error {
  color: red;
}
</style>
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
  </head>
  <body>
  <center>
  <div>
    <h2>Registration</h2>
    <form class="" action="" method="post" autocomplete="off">
      <input type="text" name="name" id = "name" placeholder="Full Name" > <br>
      <span class="error"><?php echo $nameErr;?></span> <br>  
      <input type="text" name="username" id = "username" placeholder="Username" > <br>
      <span class="error"><?php echo $usernameErr;?></span> <br>  
      <input type="email" name="email" placeholder="Email" id = "email" > <br>
      <span class="error"><?php echo $emailErr;?></span> <br>  
      <input type="password" name="password" placeholder="Password" id = "password" > <br>
      <span class="error"><?php echo $passwordErr;?></span> <br>  
      <input type="password" name="confirmpassword" placeholder="Confirm Password" id = "confirmpassword" > <br>
      <span class="error"><?php echo $confirmpasswordErr;?></span> <br><br><br>
      <a href="login.php">Login</a>&nbsp;&nbsp;
      <button type="submit" name="submit">Register</button>
    </form>
    <br>
    </div>
    </center>
  </body>
</html>