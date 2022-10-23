
<?php
$servername = "localhost";
$username = "admin";
$password = "admin@2022";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM displaybooks WHERE BookID=5";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

<p align="center"><a href="home.php" style="text-decoration:none;">Go Back</a>