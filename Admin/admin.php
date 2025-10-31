<?php
include '../Backend/db_connect.php';

// Fetch bookings
$bookings = $conn->query("SELECT * FROM appointments ORDER BY id DESC");

// Fetch contact messages
$messages = $conn->query("SELECT * FROM contact_messages ORDER BY id DESC");

// Fetch summary stats
$totalAppointments = $conn->query("SELECT COUNT(*) AS total FROM appointments")->fetch_assoc()['total'];
$pending = $conn->query("SELECT COUNT(*) AS total FROM appointments WHERE status='Pending'")->fetch_assoc()['total'];
$confirmed = $conn->query("SELECT COUNT(*) AS total FROM appointments WHERE status='Confirmed'")->fetch_assoc()['total'];
$cancelled = $conn->query("SELECT COUNT(*) AS total FROM appointments WHERE status='Cancelled'")->fetch_assoc()['total'];
$totalMessages = $conn->query("SELECT COUNT(*) AS total FROM contact_messages")->fetch_assoc()['total'];

// Store results in arrays
$appointments_data = [];
while ($row = $bookings->fetch_assoc()) {
  $appointments_data[] = $row;
}

$messages_data = [];
while ($msg = $messages->fetch_assoc()) {
  $messages_data[] = $msg;
}

// Close DB
$conn->close();

// Include HTML layout
include 'admin_view.html';
?>
