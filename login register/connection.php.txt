<?php

 $conn = mysqli_connect("localhost","root","","my_db");
          if(mysqli_connect_error()){
            echo"Failed to connect to mysql: " .mysqli_connect_error();
          }else{
            echo"connected";
          }


?>