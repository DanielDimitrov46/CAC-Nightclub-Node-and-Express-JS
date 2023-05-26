document.getElementById('emailForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission

  var form = document.getElementById('emailForm');
  var formData = new FormData(form);

  // Perform an AJAX request to send the form data to the PHP file
  fetch('send_email.php', {
    method: 'POST',
    body: formData
  })
  .then(function(response) {
    if (response.ok) {
      return response.text();
    } else {
      throw new Error('An error occurred while sending the email.');
    }
  })
  .then(function(result) {
    alert(result);
    // Optionally, reset the form fields
    form.reset();
  })
  .catch(function(error) {
    console.error(error);
    alert('An error occurred while sending the email.');
  });
});
