function storeName() {
  localStorage.setItem("username", document.getElementById('email').value);
}

function getName() {
  document.getElementById("email").value = localStorage.getItem("username");
  document.getElementById("password").focus();
}

function storeData(i) {
  sessionStorage.setItem(i.id, i.value);
}

function loadData() {
  for (var i = 0; i < sessionStorage.length; i++) {
    try {
      document.getElementById(sessionStorage.key(i)).value = sessionStorage.getItem(sessionStorage.key(i));
    } catch (e) {
    }
  }
}

function clearData() {
  for (var i = 0; i < sessionStorage.length; i++) {
    //alert(sessionStorage[sessionStorage.key(i)]);
  }
}
