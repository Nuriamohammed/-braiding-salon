<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $hairstyle = $_POST['hairstyle'];
  $stylist = $_POST['stylist'];
  $appointment_date = $_POST['appointment_date'];
  $special_request = $_POST['special_request'];
  $payment_method = $_POST['payment_method'];
  $transaction_id = $_POST['transaction_id'];
  $appointment_time = $_POST['appointment_time'];

  $sql = "INSERT INTO appointments (name, email, phone, hairstyle, stylist, appointment_date, special_request, payment_method, transaction_id, appointment_time)
          VALUES ('$name', '$email', '$phone', '$hairstyle', '$stylist', '$appointment_date', '$special_request', '$payment_method', '$transaction_id', '$appointment_time')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>
      alert('Appointment booked successfully! You will receive a confirmation soon.');
      window.location.href='../Book%20Us.html';
    </script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
