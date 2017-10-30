$.get("../controller.php?get_user=1", function(data, status){
  var container = document.getElementById('index-banner').getElementsByClassName('container')[0].getElementsByTagName('h1')[0];
  container.innerHTML = 'Welcome, ' + data.user + '!';
  //console.log(data);
});
