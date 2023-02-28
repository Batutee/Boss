index.php
<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
                                               // ISNERT THE NAME OF TABLE REMOVE SPACES
  $result = mysqli_query($conn, "SELECT * FROM '                                     'WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="styles.css">
<style>
body {
  background-image: url('background.jpg');<---CHANGE BACKGROUND
}
</style>
<center>
  <head>
    <meta charset="utf-8">
    <title>Index</title>
  </head>
  <body>
  <div class="loader"><?php echo $row["user_type"];?></div>
  <div class="loader">WELCOME:<?php echo $row["name"]; ?></div>
  <div class="loader">EMAIL:<?php echo $row["email"]; ?></div>
    <a href="logout.php">Logout</a>
  </body>
</center>
</html>