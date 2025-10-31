<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $status = $_POST['status'];

  $sql = "UPDATE appointments SET status='$status' WHERE id=$id";
  if ($conn->query($sql) === TRUE) {
    header("Location: ../Admin/admin.php");
    exit();
  } else {
    echo "Error updating record: " . $conn->error;
  }
}
?>
