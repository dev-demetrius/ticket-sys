<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "ticket_sys";

if (!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
  die("failed to connect");
} else {
  echo "connection successful!";
}