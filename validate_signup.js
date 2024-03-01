const form = document.querySelector('form');
const nameInput = document.getElementById('uname');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('pass');
const confirmPasswordInput = document.getElementById('cpass');
const phnumberInput = document.getElementById("phnumber");


form.addEventListener('submit', function (event) {
  if (!validateName() && !validatePhnumber() && !validateEmail() && !validatePassword() && !validateConfirmPassword()) {
    event.preventDefault();
    
    }
    else
    form.submit();

});

function validateName(){
  const namevalue = nameInput.value.trim();
  const nameregex = /^[a-zA-Z\s]+$/;
  if(namevalue === ''){
    setError(nameInput,'Name needs to be filled out', 'name-error');
    return false;
  } else if (!nameregex.test(namevalue)){
   setError(nameInput,"Name shouldn't contain number.", 'name-error');
   return false;
  }else{
   removeError(nameInput, 'name-error');
   return true;
  }
}

function validatePhnumber() {
  const phnumbervalue = phnumber.value.trim();
  const phnumberreregex = /^[0-9]+$/;

  if (phnumbervalue === '') {
    setError(phnumberInput, 'Phone number needs to be filled out', 'phnumber-error');
    return false;
  } else if (!phnumberreregex.test(phnumbervalue)) {
    setError(phnumberInput, 'Phone number should only contain digits', 'phnumber-error');
    return false;
  } else {
    removeError(phnumberInput, 'phnumber-error');
    return true;
  }
}

function validateEmail(){
   const emailValue = emailInput.value.trim();
   const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
   if (emailValue === ''){
       setError(emailInput,"Email is required", 'email-error');
   } else if(!emailRegex.test(emailValue)) {
       setError(emailInput,"Invalid email format!", 'email-error');
   } else {
       removeError(emailInput, 'email-error');
       return true;
   }
}

function validatePassword(){
   const passValue = passwordInput.value.trim();
   const passRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_])/;
   if(passValue === ''){
       setError(passwordInput,"Password is required", 'password-error');
       return false;
   } else if(passValue.length < 8){
       setError(passwordInput," Password must be atleast 8 characters", 'password-error');
       return false;
   } else if(!passRegex.test(passValue)){
    setError(passwordInput,"Password must contain at least least one uppercase letter, one lowercase letter, one digit, and one special character.", 'password-error');
    return false;
   } else {
       removeError(passwordInput, 'password-error');
       return true;
   }
  }

function validateConfirmPassword() {
   const confirmPassValue = confirmPasswordInput.value.trim();
     const passValue = passwordInput.value.trim();
     if (confirmPassValue === '') {    
     setError(confirmPasswordInput, "Confirm password is required", 'confirm-password-error');
     return false;
      } else if (confirmPassValue !== passValue) {
       setError(confirmPasswordInput, "Passwords do not match", 'confirm-password-error');
       return false;
    } else {
      removeError(confirmPasswordInput, 'confirm-password-error');
     return true;
    }
    }

// Set error message
function setError(inputElement, message, errorId) {
    const errorElement = document.getElementById(errorId);
    errorElement.textContent = message;
     inputElement.classList.add('error-message');
}

// Remove error message
function removeError(inputElement, errorId) {
    const errorElement = document.getElementById(errorId);
    errorElement.textContent = '';
    inputElement.classList.remove('error-message');
  }

// Event listeners
nameInput.addEventListener('blur', validateName);
emailInput.addEventListener('blur', validateEmail);
phnumberInput.addEventListener('blur', validatePhnumber);
passwordInput.addEventListener('blur', validatePassword);
confirmPasswordInput.addEventListener('blur', validateConfirmPassword);

function togglePassword() {
    const x = passwordInput;
    const show = document.getElementById('hideopen');
    const hide = document.getElementById('hideclose');
    if (x.type === "password") {
        x.type = "text";
        show.style.display = "none";
        hide.style.display = "block";
    } else {
        x.type = "password";
        show.style.display = "block";
        hide.style.display = "none";
    }
}

function toggleCPassword() {
    const y = confirmPasswordInput;
    const show = document.getElementById('Chideopen');
    const hide = document.getElementById('Chideclose');
    if (y.type === "password") {
        y.type = "text";
        show.style.display = "none";
        hide.style.display = "block";
    } else {
        y.type = "password";
        show.style.display = "block";
        hide.style.display = "none";
    }
}
