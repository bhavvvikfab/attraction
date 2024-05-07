$(document).ready(function() {
  $('#country').countrySelect({
      defaultCountry: "my",
      displayCountryName: true
  }); 

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
                      $('#msg').text('Login Successfully').addClass('text-success')
                      location.reload();
                  } else {
                    console.log(response);
                      $('#msg').text(response.message).addClass('text-danger')
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
    
    Swal.fire({
        title: "Are you sure you want to " + message + " the top-up request?",
        showCancelButton: true,
        confirmButtonText: "Sure",
      }).then((result) => {
        if (result.isConfirmed) {
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
                    setTimeout(function() {
                      location.reload();
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    showMessage('Message', xhr.responseText, false);
                }
            });
        } 
      });    
});

$(document).on("click", "#submitRequestTopup", function() {
    var requestedAmount = $("#topupAmount").val();

    if (requestedAmount === "" || isNaN(requestedAmount) || requestedAmount <= 0) {
        $("#topupAmount").focus();
        return;
    }
    
    Swal.fire({
        title: "Are you sure you want to request a top-up?",
        showCancelButton: true,
        confirmButtonText: "Sure",
      }).then((result) => {
        if (result.isConfirmed) {
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
                    setTimeout(function() {
                      location.reload();
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    showMessage('Message', xhr.responseText, false);
                }
            });
        } 
      });  
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

    $(document).on("click", "#addagent_btn", function () {
          var name = $('#name').val();
          var email = $('#email').val();
          var password = $('#password').val();
          var phone_number = $('#phone_number').val();
          var country = $('#country').val();
          var credit_balance = $('#credit_balance').val();
          var image = $('#image').val();
          var flag = 1;

      
         if(name==""){
           $('.name_err').text('Name is required.').addClass("text-danger");
           flag = 0;
         }else{
           $('.name_err').text('');
         }
      
         if(password==""){
           $('.password_err').text('Password is required.').addClass("text-danger");
           flag = 0;
         }else{
           $('.password_err').text('');
         }
      
        //  if(phone_number==""){
        //    $('.phone_number_err').text('Phone number is required.').addClass("text-danger");
        //    flag = 0;
        //  }else{
        //    $('.phone_number_err').text('');
        //  }
         if(image==""){
          $('.image_err').text('Image is required.').addClass("text-danger");
          flag = 0;
        }else{
          $('.image_err').text('');
        }
         var registerurl=$('#url').val();
         var redirecturl=$('#redirecturl').val();
      
         if (flag == 1) {
           // console.log("ok");
           var changePasswordUrl = $('#url').val();
           let myform = document.getElementById("add_agent_form");
           let fd = new FormData(myform);
           var countryData = $("#country").countrySelect("getSelectedCountryData");
           fd.append("countryCode", countryData.iso2);

           $.ajax({
             url: registerurl,
             data: fd,
             cache: false,
             processData: false,
             contentType: false,
             type: "POST",
             success: function (data) {
              if (data.status) {
                showMessage('message', "Stored Successfully.", true)
                // $("#msg").text(data.message).addClass("text-success");
                      setTimeout(function(){
                //       if(data.redirecturl != ''){
                //         window.location.href = data.redirecturl
                //       }else{
                  window.location.href = data.redirecturl
                //       }
                    },2000);            
              }else {
                $.each(data.errors, function(index, value) {
                  showMessage('error', value, false)
                  // $("#msg").text(value).addClass("text-danger");
              });
                
              }
               console.log(data);
              //  if (data == 2) {
              //    // $("#msg").removeClass("text-danger");
              //    $("#msg").html("Current Password Wrong!").addClass("text-danger");
              //    // $("form").trigger("reset");
              // //    setTimeout(function () {
              // //      window.location.reload();
              // //    }, 2000);
                 
              //  }
              //  else if(data==3){
              //    // $(".curr_pass_error").html("").removeClassClass("text-danger");
              //    $(".curr_pass_error").html("Current Password Wrong!").addClass("text-danger");
      
              //  } else {
              //    $("#msg").html("Password Change Successfully!").addClass("text-success");
              //    setTimeout(function () {
              //          window.location.reload();
              //        }, 2000);
              //  }
               // do something with the result
             },
           });
         } else {
           return false;
         }
      
      });
 $(document).on("click", "#editagent_btn", function () {
        // alert ("hh");
        var name = $('#name').val();
         var email = $('#email').val();
         var password = $('#password').val();
         var phone_number = $('#phone_number').val();
         var country = $('#country').val();
         var credit_balance = $('#credit_balance').val();
         var image = $('#image').val();
         

          var flag = 1;
      
         if(name==""){
           $('.name_err').text('Name is required').addClass("text-danger");
           flag = 0;
         }else{
           $('.name_err').text('');
         }
      
      
        //  if(phone_number==""){
        //    $('.phone_number_err').text('phone number is required').addClass("text-danger");
        //    flag = 0;
        //  }else{
        //    $('.phone_number_err').text('');
        //  }
       
         var updateagent_url=$('#url').val();
         var redirecturl=$('#redirecturl').val();
      
         if (flag == 1) {
           // console.log("ok");
          
           let myform = document.getElementById("edit_agent_form");
           let fd = new FormData(myform);
           var countryData = $("#country").countrySelect("getSelectedCountryData");
           fd.append("countryCode", countryData.iso2);
           $.ajax({
             url: updateagent_url,
             data: fd,
             cache: false,
             processData: false,
             contentType: false,
             type: "POST",
             success: function (data) {
              if (data.status) {
                showMessage('message', "Updated Successfully.", true)
                
                      setTimeout(function(){
                
                  window.location.href = data.redirecturl
               
                    },2000);            
              }else {
                $.each(data.errors, function(index, value) {
                  showMessage('error', value, false)
                  
              });
                
              }
               console.log(data);
             
             },
           });
         } else {
           return false;
         }
      
      });  
      
      $(document).on('click', '.agent_delete', function (){
        //  alert('kk');
         var agent_id=$(this).attr("data-id");
          // alert (agent_id);
         if (confirm('Are you sure delete this record?')) {
           // alert ($user_id);
           $.ajax({
             type: 'POST',
             url: 'deleteagent',
             data: { agent_id:agent_id },
            //  contentType: false,
            //   processData: false,
             success: function (data) {
    
              console.log(data);
              if(data.status){
                showMessage('message', "Record Deleted Successfully.", true)
                
                  setTimeout(function(){
                
                  window.location.reload();
               
                    },2000);
              }
             }
    
    
           });
         }
    });

    $(document).on('change', '.agent_status', function (){
      //  alert('kk');
       var agent_id=$(this).attr("data-id");
       var selectedValue = $(this).val();
        
        // alert (agent_id);
       if (confirm('Are you sure Change this record?')) {
         // alert ($user_id);
         $.ajax({
           type: 'POST',
           url: 'agent_status_change',
           data: { agent_id:agent_id,selectedValue:selectedValue },
          //  contentType: false,
          //   processData: false,
           success: function (data) {
  
            console.log(data);
            if(data.status){
              showMessage('message', data.message, true)
              
                setTimeout(function(){
              
                window.location.reload();
             
                  },2000);
            }
           }
  
  
         });
       }
  });
  function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
    }

  $(document).on("click", "#update_credential", function () {
    // alert ("hh");
   
     var email = $('#email').val();
     var password = $('#password').val();
     
      var flag = 1;

      if (email == "") {
        $(".email_err").text("This field is required!").addClass("text-danger");
        flag = 0;
      }else if(!validateEmail(email)){
        $(".email_err").text("Please Enter Valid Email.").addClass("text-danger");
        flag=0;
      } else {
        $(".email_err").text("");
      }
  
     if(password==""){
       $('.password_err').text('password  is required').addClass("text-danger");
       flag = 0;
     }else{
       $('.password_err').text('');
     }
   
    //  var updateagent_url=$('#url').val();
    //  var redirecturl=$('#redirecturl').val();
  
     if (flag == 1) {
       // console.log("ok");
      
       let myform = document.getElementById("credential_form");
       let fd = new FormData(myform);
       $.ajax({
         url: 'update_credential',
         data: fd,
         cache: false,
         processData: false,
         contentType: false,
         type: "POST",
         success: function (data) {
          if (data.status) {
            showMessage('Message', data.message, true);
                       
            setTimeout(function(){            
                window.location.reload();           
            },2000);            
          }else {
            showMessage('Message', data.message, false);
            $.each(data.errors, function(index, value) {
              showMessage('Error', value, false)
              
          });
            
          }
           console.log(data);
         
         },
       });
     } else {
       return false;
     }
  
  }); 

  $(document).on("click", "#update_markup_btn", function () {
    // alert ("hh");
   
    
      
       let myform = document.getElementById("update_markup_form");
       let fd = new FormData(myform);
       $.ajax({
         url: 'update_markup',
         data: fd,
         cache: false,
         processData: false,
         contentType: false,
         type: "POST",
         success: function (data) {
          if (data.status) {
            showMessage('message', data.message, true)
            
                  setTimeout(function(){
            
                    window.location.reload();
           
                },2000);            
          }else {
            $.each(data.errors, function(index, value) {
              showMessage('error', value, false)
              
          });
            
          }
           console.log(data);
         
         },
       });
    //  } else {
    //    return false;
    //  }
  
  }); 
  
  $(document).on("change", ".attraction_mark_up_type,.attraction_mark_up", function () {
    // alert ("hh");
            var parent = $(this).parent(); 
            var markup_value = parent.find('.attraction_mark_up').val();
            var markup_style = parent.find('.attraction_mark_up_type').val();
            var attraction_id= parent.find('.attraction_id').val();
            var mark_up_error = parent.find('.mark_up_error');
            flag= 1;
      if($(this).hasClass('attraction_mark_up_type')== true){
        if(markup_value == ''){
          return false;
        }
      }
            // if(markup_value==""){
            //   mark_up_error.text('Input is required').addClass("text-danger");
            //   flag = 0;
            // }else{
            //   mark_up_error.text('');
            // }
            if(markup_style == "2") {
              if(markup_value==""){
                mark_up_error.text('');
              }
              else if(markup_value < 1 || markup_value > 100) {
                mark_up_error.text('Value must be between 1 to 100').addClass("text-danger");
                  flag = 0;
              } else {
                mark_up_error.text('');
              }
          }

            if (flag == 1) {
      
       $.ajax({
         url: 'update_attraction_markup',
         data: {markup_value : markup_value, markup_style : markup_style, attraction_id : attraction_id},
        //  cache: false,
        //  processData: false,
        //  contentType: false,
         type: "POST",
         success: function (data) {
          if (data.status) {
            showMessage('message', data.message, true)
            
                  setTimeout(function(){
            
                    window.location.reload();
           
                },2000);            
          }else {
            $.each(data.errors, function(index, value) {
              showMessage('error', value, false)
              
          });
            
          }
           console.log(data);
         
         },
       });
    } else {
       return false;
     }  
  
  }); 