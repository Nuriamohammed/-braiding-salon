<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];

  $sql = "INSERT INTO contact_messages (name, email, phone, message)
          VALUES ('$name', '$email', '$phone', '$message')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>
      alert('Your message has been sent successfully!');
      window.location.href='../Contact%20Us.html';
    </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
