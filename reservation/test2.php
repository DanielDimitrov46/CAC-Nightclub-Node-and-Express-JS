<!DOCTYPE html>
<html>
<head>
  <title>Email Form</title>
</head>
<body>
  <form id="emailForm" action="send_email.php" method="post">
    <input type="text" name="name" placeholder="Your Name">
    <input type="email" name="email" placeholder="Your Email">
    <textarea name="message" placeholder="Message"></textarea>
    <button type="submit">Send Email</button>
  </form>

  <script src="app.js"></script>
</body>
</html>
