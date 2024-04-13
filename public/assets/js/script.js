// const slidePage = document.querySelector(".slide-page");
// const nextBtnFirst = document.querySelector(".firstNext");
// const prevBtnSec = document.querySelector(".prev-1");
// const nextBtnSec = document.querySelector(".next-1");
// const prevBtnThird = document.querySelector(".prev-2");
// const nextBtnThird = document.querySelector(".next-2");
// const prevBtnFourth = document.querySelector(".prev-3");
// const submitBtn = document.querySelector(".submit");
// const progressText = document.querySelectorAll(".step p");
// const progressCheck = document.querySelectorAll(".step .check");
// const bullet = document.querySelectorAll(".step .bullet");
// let current = 1;

// nextBtnFirst.addEventListener("click", function(event){
//   event.preventDefault();
//   slidePage.style.marginLeft = "-25%";
//   bullet[current - 1].classList.add("active");
//   progressCheck[current - 1].classList.add("active");
//   progressText[current - 1].classList.add("active");
//   current += 1;
// });
// nextBtnSec.addEventListener("click", function(event){
//   event.preventDefault();
//   slidePage.style.marginLeft = "-50%";
//   bullet[current - 1].classList.add("active");
//   progressCheck[current - 1].classList.add("active");
//   progressText[current - 1].classList.add("active");
//   current += 1;
// });
// nextBtnThird.addEventListener("click", function(event){
//   event.preventDefault();
//   slidePage.style.marginLeft = "-75%";
//   bullet[current - 1].classList.add("active");
//   progressCheck[current - 1].classList.add("active");
//   progressText[current - 1].classList.add("active");
//   current += 1;
// });
// submitBtn.addEventListener("click", function(){
//   bullet[current - 1].classList.add("active");
//   progressCheck[current - 1].classList.add("active");
//   progressText[current - 1].classList.add("active");
//   current += 1;
//   setTimeout(function(){
//     alert("Your Form Successfully Signed up");
//     location.reload();
//   },800);
// });

// prevBtnSec.addEventListener("click", function(event){
//   event.preventDefault();
//   slidePage.style.marginLeft = "0%";
//   bullet[current - 2].classList.remove("active");
//   progressCheck[current - 2].classList.remove("active");
//   progressText[current - 2].classList.remove("active");
//   current -= 1;
// });
// prevBtnThird.addEventListener("click", function(event){
//   event.preventDefault();
//   slidePage.style.marginLeft = "-25%";
//   bullet[current - 2].classList.remove("active");
//   progressCheck[current - 2].classList.remove("active");
//   progressText[current - 2].classList.remove("active");
//   current -= 1;
// });
// prevBtnFourth.addEventListener("click", function(event){
//   event.preventDefault();
//   slidePage.style.marginLeft = "-50%";
//   bullet[current - 2].classList.remove("active");
//   progressCheck[current - 2].classList.remove("active");
//   progressText[current - 2].classList.remove("active");
//   current -= 1;
// });


  // const slidePage = document.querySelector(".slide-page");
  // const nextBtnFirst = document.querySelector(".firstNext");
  // const prevBtnSec = document.querySelector(".prev-1");
  // const nextBtnSec = document.querySelector(".next-1");
  // const prevBtnThird = document.querySelector(".prev-2");
  // const nextBtnThird = document.querySelector(".next-2");
  // const prevBtnFourth = document.querySelector(".prev-3");
  // const submitBtn = document.querySelector(".submit");
  // const progressText = document.querySelectorAll(".step p");
  // const progressCheck = document.querySelectorAll(".step .check");
  // const bullet = document.querySelectorAll(".step .bullet");
  // let current = 1;

  // nextBtnFirst.addEventListener("click", function(event){
  //   event.preventDefault();
  //   const firstNameInput = document.querySelector("input[name='first_name']");
  //   const lastNameInput = document.querySelector("input[name='last_name']");
    
  //   // Check if first name is empty
  //   if (firstNameInput.value.trim() === "") {
  //     alert("Please enter your first name.");
  //     return;
  //   }

  //   // Check if last name is empty
  //   if (lastNameInput.value.trim() === "") {
  //     alert("Please enter your last name.");
  //     return;
  //   }

  //   // If both fields are filled, proceed to the next step
  //   slidePage.style.marginLeft = "-25%";
  //   bullet[current - 1].classList.add("active");
  //   progressCheck[current - 1].classList.add("active");
  //   progressText[current - 1].classList.add("active");
  //   current += 1;
  // });

  // nextBtnSec.addEventListener("click", function(event){
  //   event.preventDefault();
  //   const emailInput = document.querySelector("input[name='email']");
  //   const phoneNumberInput = document.querySelector("input[name='phone_number']");
    
  //   // Check if email is empty
  //   if (emailInput.value.trim() === "") {
  //     alert("Please enter your email.");
  //     return;
  //   }

  //   // Check if phone number is empty
  //   if (phoneNumberInput.value.trim() === "") {
  //     alert("Please enter your phone number.");
  //     return;
  //   }

  //   // If both fields are filled, proceed to the next step
  //   slidePage.style.marginLeft = "-50%";
  //   bullet[current - 1].classList.add("active");
  //   progressCheck[current - 1].classList.add("active");
  //   progressText[current - 1].classList.add("active");
  //   current += 1;
  // });

  // nextBtnThird.addEventListener("click", function(event){
  //   event.preventDefault();
  //   const countryCodeInput = document.querySelector("input[name='country_code']");
    
  //   // Check if country code is empty
  //   if (countryCodeInput.value.trim() === "") {
  //     alert("Please enter your country code.");
  //     return;
  //   }

  //   // If the field is filled, proceed to the next step
  //   slidePage.style.marginLeft = "-75%";
  //   bullet[current - 1].classList.add("active");
  //   progressCheck[current - 1].classList.add("active");
  //   progressText[current - 1].classList.add("active");
  //   current += 1;
  // });

  // submitBtn.addEventListener("click", function(event){
  //   event.preventDefault();
  //   const usernameInput = document.querySelector("input[name='username']");
  //   const passwordInput = document.querySelector("input[name='password']");
    
  //   // Check if username is empty
  //   if (usernameInput.value.trim() === "") {
  //     alert("Please enter your username.");
  //     return;
  //   }

  //   // Check if password is empty
  //   if (passwordInput.value.trim() === "") {
  //     alert("Please enter your password.");
  //     return;
  //   }

  //   // If both fields are filled, submit the form
  //   bullet[current - 1].classList.add("active");
  //   progressCheck[current - 1].classList.add("active");
  //   progressText[current - 1].classList.add("active");
  //   current += 1;
  //   setTimeout(function(){
  //     alert("Your Form Successfully Signed up");
  //     location.reload();
  //   },800);
  // });

  // prevBtnSec.addEventListener("click", function(event){
  //   event.preventDefault();
  //   slidePage.style.marginLeft = "0%";
  //   bullet[current - 2].classList.remove("active");
  //   progressCheck[current - 2].classList.remove("active");
  //   progressText[current - 2].classList.remove("active");
  //   current -= 1;
  // });

  // prevBtnThird.addEventListener("click", function(event){
  //   event.preventDefault();
  //   slidePage.style.marginLeft = "-25%";
  //   bullet[current - 2].classList.remove("active");
  //   progressCheck[current - 2].classList.remove("active");
  //   progressText[current - 2].classList.remove("active");
  //   current -= 1;
  // });

  // prevBtnFourth.addEventListener("click", function(event){
  //   event.preventDefault();
  //   slidePage.style.marginLeft = "-50%";
  //   bullet[current - 2].classList.remove("active");
  //   progressCheck[current - 2].classList.remove("active");
  //   progressText[current - 2].classList.remove("active");
  //   current -= 1;
  // });




  const slidePage = document.querySelector(".slide-page");
  const nextBtnFirst = document.querySelector(".firstNext");
  const prevBtnSec = document.querySelector(".prev-1");
  const nextBtnSec = document.querySelector(".next-1");
  const prevBtnThird = document.querySelector(".prev-2");
  const submitBtn = document.querySelector(".submit");
  const progressText = document.querySelectorAll(".step p");
  const progressCheck = document.querySelectorAll(".step .check");
  const bullet = document.querySelectorAll(".step .bullet");
  let current = 1;

  nextBtnFirst.addEventListener("click", function(event){
    event.preventDefault();
    const nameInput = document.querySelector("input[name='name']");
    const emailInput = document.querySelector("input[name='email']");
    const passwordInput = document.querySelector("input[name='password']");
    
    // Check if name is empty
    if (nameInput.value.trim() === "") {
      alert("Please enter your name.");
      return;
    }

    // Check if email is empty
    if (emailInput.value.trim() === "") {
      alert("Please enter your email.");
      return;
    }

    if (passwordInput.value.trim() === "") {
      alert("Please enter your Password.");
      return;
    }

    // If both fields are filled, proceed to the next step
    slidePage.style.marginLeft = "-25%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
  });

  nextBtnSec.addEventListener("click", function(event){
    event.preventDefault();
    const addressInput = document.querySelector("input[name='address']");
    const phoneInput = document.querySelector("input[name='phone_number']");
    const countryInput = document.querySelector("input[name='country']");
    
    // Check if address is empty
    if (addressInput.value.trim() === "") {
      alert("Please enter your address.");
      return;
    }

    // Check if phone number is empty
    if (phoneInput.value.trim() === "") {
      alert("Please enter your phone number.");
      return;
    }

    // Check if country is empty
    if (countryInput.value.trim() === "") {
      alert("Please enter your country.");
      return;
    }

    // If all fields are filled, proceed to the next step
    slidePage.style.marginLeft = "-50%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
  });

  submitBtn.addEventListener("click", function(event){
    event.preventDefault();
    const imageInput = document.querySelector("input[name='image']");
    
    // Check if an image is uploaded
    if (imageInput.value.trim() === "") {
      alert("Please upload an image.");
      return;
    }

    // If an image is uploaded, submit the form
    // bullet[current - 1].classList.add("active");
    // progressCheck[current - 1].classList.add("active");
    // progressText[current - 1].classList.add("active");
    // current += 1;

         var registerUrl = $('#url').val();
        if(registerUrl != '' && typeof(registerUrl) != 'undefined'){ 
            let myform = document.getElementById("registrationForm");
            let fd = new FormData(myform);
              $.ajax({
              url: registerUrl,
              data: fd,
              cache: false,
              processData: false,
              contentType: false,
              type: "POST",
              success: function (data) {
                console.log('asd');

                if (data.status) {

                  $("#msg").text(data.message).addClass("text-success");
                        setTimeout(function(){
                        if(data.redirecturl != ''){
                          window.location.href = data.redirecturl
                        }else{
                          location.reload();
                        }
                      },1000)
                  
                }
                else {
                  $.each(data.errors, function(index, value) {
                    $("#msg").text(value).addClass("text-danger");
                });
                  
                }
                // do something with the result
              },
              error: function(xhr, status, error) {
                // Handle error
                console.error('API call failed:', error);
                $("#msg").text(error).addClass("text-danger");
            }
              });
        }


    // setTimeout(function(){
    //   alert("Your Form Successfully Signed up");
    //   location.reload();
    // },800);
  });

  prevBtnSec.addEventListener("click", function(event){
    event.preventDefault();
    slidePage.style.marginLeft = "0%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
  });

  prevBtnThird.addEventListener("click", function(event){
    event.preventDefault();
    slidePage.style.marginLeft = "-25%";
    bullet[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    current -= 1;
  });


