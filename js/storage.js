function storeName() {
  localStorage.setItem("username", document.getElementById('email').value);
}

function getName() {
  document.getElementById("email").value = localStorage.getItem("username");
  document.getElementById("password").focus();
}
