let loginForm = document.querySelector(".my-form");

loginForm.addEventListener("submit", (e) => {
  e.preventDefault();
  let email = document.getElementById("email");
  let password = document.getElementById("password");
  if ( !email || !password) {
    alert("Please fill in all fields.");
    return false; // Prevent form submission         
   }
   alert("Sign up successful!");
   return true; // Allow form submission
  console.log("Email:", email.value);
  console.log("Password:", password.value);
  // process and send to API
});


