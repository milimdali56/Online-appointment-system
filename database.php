<?php
// Enter Host, username, password, database below.
$con = mysqli_connect("localhost","root","Madwoman@8","workshop");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>