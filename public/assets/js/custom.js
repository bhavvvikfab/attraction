$(document).ready(function() {
  $('#login_btn').on('click', function(e) {
      e.preventDefault(); // Prevent the default form submission

      // Perform client-side validation
      if (validateForm()) {
          // If the form is valid, proceed with AJAX login
          var username = $('#yourUsername').val();
          var password = $('#yourPassword').val();

          // AJAX request
          $.ajax({
              url: 'loginporcess', // Replace with your login endpoint
              method: 'POST',
              dataType: 'json',
              data: {
                  email : username,
                  password: password
              },
              success: function(response) {
                  
                  if (response.token) {
                      // Login successful, redirect or perform desired action
                      $('#msg').text('Login Successfully').addClass('text-success')
                      // alert('Login successful');
                      // Example: Redirect to home page
                    //   window.location.href = '';
                        location.reload();
                  } else {
                      // Login failed, display error message
                      $('#msg').text(response.message).addClass('text-danger')
                      // alert('Login failed: ' + response.message);
                  }
              },
              error: function(xhr, status, error) {
                  // Handle errors
                  $('#msg').text('Incorrect Username or Password.').addClass('text-danger');
                  // alert('Error occurred while logging in: ' + error);

              }
          });
      }
  });
});

// Function to perform client-side form validation
function validateForm() {
  var isValid = true;
  $('#login-form input[required]').each(function() {
      if (!$(this).val()) {
          $(this).addClass('is-invalid');
          isValid = false;
      } else {
          $(this).removeClass('is-invalid');
      }
  });
  return isValid;
}
