<?php
$subject    = 'E-mail from example'; // Subject of your email
$to         = 'email@example.com'; // Your e-mail address
$headers    = 'MIME-Version: 1.0' . "\r\n" .
              'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$message    = '';

if (!empty($_POST["name"])) {
  $message .= 'Name: ' . htmlspecialchars($_POST['name']) . ' <br/>';
}
if (!empty($_POST["email"])) {
  $message .= 'Email: ' . htmlspecialchars($_POST['email']) . ' <br/>';
}
if (!empty($_POST["phone"])) {
  $message .= 'Phone: ' . htmlspecialchars($_POST['phone']) . ' <br/>';
}
if (!empty($_POST["website"])) {
  $message .= 'Website: ' . htmlspecialchars($_POST['website']) . ' <br/>';
}
if (!empty($_POST["message"])) {
  $message .= 'Message: ' . nl2br(htmlspecialchars($_POST['message'])) . ' <br/>';
}

// Send email
if (@mail($to, $subject, $message, $headers)) {
  // Redirect to a thank you page
  header('Location: /thank-you.html'); // Adjust path to point to root
  exit; // Stop the script after redirecting
} else {
  echo 'Failed to send email. Please try again.';
}
?>
