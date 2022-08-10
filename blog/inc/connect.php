<?php
      $host = "localhost";
      $username = "root";
      $password = "";
      $database = "blog";
      
      $conn = mysqli_connect($host,$username, $password, $database) or die("Unable to select database");
      
      if (!$conn) 
      {
          die ("Could not connect to the database host: ". mysqli_connect_error());
      }
               
      //Set the character set of the connection
      if(!mysqli_set_charset ( $conn , "UTF8" ))
      {
          die("mysqli_set_charset() failed");
      }
      ?>
      