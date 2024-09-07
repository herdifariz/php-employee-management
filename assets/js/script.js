function validateEmail() {
  const emailInput = document.getElementById("email");
  const email = emailInput.value;
  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (emailPattern.test(email)) {
    document.getElementById("emailError").innerText = "";
    return true;
  } else {
    document.getElementById("emailError").innerText = "Email tidak valid";
    return false;
  }
}

function validateForm() {
  return validateEmail();
}
