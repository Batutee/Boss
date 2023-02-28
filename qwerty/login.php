
<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  if($_POST["usernameemail"] !="" && $_POST["password"] !=""){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];              // ISNERT THE NAME OF TABLE REMOVE SPACES
  $result = mysqli_query($conn, "SELECT * FROM '                                        ' WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
}
$usernameemail= $password= "";
$usernameemailErr= $passwordErr= "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty($_POST["usernameemail"])){
		$usernameemailErr=" Username or Email is Required!";
		}else{
			$usernameemail=$_POST["usernameemail"];
		}
        if(empty($_POST["password"])){
            $passwordErr=" Password is Required!";
            }else{
                $password=$_POST["password"];
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
    <title>Login</title>
  </head>
  <body>
    <center>
    <div>
    <h2>Login</h2><br>
    <form class="form" action="" method="post" autocomplete="off">
      <input type="text" name="usernameemail" placeholder="Username or Email" id = "usernameemail"> <br>
      <span class="error"><?php echo $usernameemailErr;?></span> <br>  
      <input type="password" name="password" placeholder="Password" id = "password"> <br>
      <span class="error"><?php echo $passwordErr;?></span> <br>  
      <button type="submit" name="submit">Login</button>&nbsp;&nbsp;
      <a href="registration.php">Register</a>
    </form>
    <br>
    </div>
    </center>
  </body>
</html>