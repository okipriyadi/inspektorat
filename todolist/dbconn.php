<?php
  $host       = "localhost";
  $username   = "root";
  $password   = "Wbs9102amin";
  $dbname     = "todolist";
  $conn       = new mysqli($host, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection to database failed: " .$conn->connect_error);
  }
?>
