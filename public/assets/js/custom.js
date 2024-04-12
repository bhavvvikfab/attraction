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

function showMessage(message, isSuccess) {
    $('#messageContent').text(message);
    if (isSuccess) {
        $('#messageModal').removeClass('modal-danger').addClass('modal-success');
    } else {
        $('#messageModal').removeClass('modal-success').addClass('modal-danger');
    }
    $('#messageModal').modal('show');
    setTimeout(function() {
        $('#messageModal').modal('hide');
        location.reload(0);
    }, 2000);
}


$(document).on("change", "#topup-request", function() {
    var transactionId = $(this).data('id');
    var newStatus = $(this).val();
    var message = newStatus == "completed" ? "approve" : "reject";
    
    if (confirm("Are you sure you want to " + message + " the top-up request?")) {
        $.ajax({
            url: '/admin/update-topup-status',
            type: 'POST',
            data: {
                transaction_id: transactionId,
                status: newStatus
            },
            success: function(response) {                
                console.log(response);
                showMessage(response.message, true);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                showMessage(xhr.responseText, false);
            }
        });
    }
});

$(document).on("click", "#submitRequestTopup", function() {
    var requestedAmount = $("#topupAmount").val();

    if (requestedAmount === "" || isNaN(requestedAmount) || requestedAmount <= 0) {
        $("#topupAmount").focus();
        return;
    }
    
    if (confirm("Are you sure you want to request for the top-up?")) {
        $('#requestTopupModal').modal('hide');
        $.ajax({
            url: '/agent/request-topup',
            type: 'POST',
            data: {
                requestedAmount: requestedAmount,
            },
            success: function(response) {                
                console.log(response);
                showMessage(response.message, true);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                showMessage(xhr.responseText, false);
            }
        });
    }
});
