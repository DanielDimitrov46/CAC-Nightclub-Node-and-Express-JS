<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Perform any necessary validation or sanitization of the form inputs

  // Send the email
  $to = '20109@uktc-bg.com';
  $subject = 'Email from form';
  $message = "Name: $name\nEmail: $email\n\nMessage: $message";
  $headers = 'From: dani.dimitrov.snack9@gmail.com';

  $success = mail($to, $subject, $message, $headers);

  if ($success) {
    echo 'Email sent successfully!';
  } else {
    echo 'An error occurred while sending the email.';
  }
} else {
  echo 'Invalid request.';
}
?>
