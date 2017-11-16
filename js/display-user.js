$.get("controller.php?get_user=1", function(data, status){
  var container = document.getElementById('index-banner').getElementsByClassName('container')[0].getElementsByTagName('h1')[0];
  container.innerHTML = 'Welcome, ' + data.user + '!';
  if(data.user != "Guest") {
    /*
    for (var i = 0; i < sessionStorage.length; i++) {
      sessionStorage.removeItem(sessionStorage.key(i));
    }
    */
    sessionStorage.removeItem('first_name');
    sessionStorage.removeItem('last_name');
    sessionStorage.removeItem('dob');
    sessionStorage.removeItem('email');
    sessionStorage.removeItem('password');
  }
  //console.log(data);
});
