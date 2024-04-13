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

function showMessage(title, message, isSuccess) {
    if (isSuccess) {
        new Notify ({
            status: 'success',
            title: title,
            text: message,
            autoclose: true
        });
    } else {
        new Notify ({
            status: 'error',
            title: title,
            text: message,
            autoclose: true
        });
    }
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
                showMessage('Message', response.message, true);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                showMessage('Message', xhr.responseText, false);
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
                showMessage('Message', response.message, true);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                showMessage('Message', xhr.responseText, false);
            }
        });
    }
});
setTimeout(function() {
    $('#successAlert').fadeOut('fast');
}, 5000);

// Function to remove error message after 5 seconds
setTimeout(function() {
    $('#errorAlert').fadeOut('fast');
}, 5000);


$(document).on("click", "#btn_chng_pass", function () {
    //   alert ("hh");
     var current_password = $('#currentPassword').val();
       var new_password = $('#newPassword').val();
       var confirm_password = $('#confirmPassword').val();
        var flag = 1;
    
       if(current_password==""){
         $('.curr_pass_error').text('Current Password is required').addClass("text-danger");
         flag = 0;
       }else{
         $('.curr_pass_error').text('');
       }
    
       if(new_password==""){
         $('.new_pass_error').text('New Password is required').addClass("text-danger");
         flag = 0;
       }else{
         $('.new_pass_error').text('');
       }
    
       if(confirm_password==""){
         $('.confirm_pass_error').text('Confirm Password is required').addClass("text-danger");
         flag = 0;
       }else{
         $('.confirm_pass_error').text('');
       }
       if(new_password !== confirm_password){
         $('.confirm_pass_error').text('New Password and Confirm Password does not Match').addClass("text-danger");
         flag = 0;
       }
    
       if (flag == 1) {
         // console.log("ok");
         var changePasswordUrl = $('#url').val();
         let myform = document.getElementById("change_password_form");
         let fd = new FormData(myform);
         $.ajax({
           url: changePasswordUrl,
           data: fd,
           cache: false,
           processData: false,
           contentType: false,
           type: "POST",
           success: function (data) {
             // console.log(data);
             if (data == 2) {
               // $("#msg").removeClass("text-danger");
               $("#msg").html("Current Password Wrong!").addClass("text-danger");
               // $("form").trigger("reset");
            //    setTimeout(function () {
            //      window.location.reload();
            //    }, 2000);
               
             }
             else if(data==3){
               // $(".curr_pass_error").html("").removeClassClass("text-danger");
               $(".curr_pass_error").html("Current Password Wrong!").addClass("text-danger");
    
             } else {
               $("#msg").html("Password Change Successfully!").addClass("text-success");
               setTimeout(function () {
                     window.location.reload();
                   }, 2000);
             }
             // do something with the result
           },
         });
       } else {
         return false;
       }
    
    });
