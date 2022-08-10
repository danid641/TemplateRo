<?php
      $host = "localhost";
      $username = "root";
      $password = "";
      $database = "forum";
      
      $connect = mysqli_connect($host,$username, $password, $database) or die("Unable to select database");
      $conn = mysqli_connect("localhost", "root", "", "digital");
      if (!$connect) 
      {
          die ("Could not connect to the database host: ". mysqli_connect_error());
      }
               
      //Set the character set of the connection
      if(!mysqli_set_charset ( $connect , "UTF8" ))
      {
          die("mysqli_set_charset() failed");
      }
      ?>
      