$.get("../controller.php?get_winner=1", function(data, status){
  //console.log(data);
  for (var i = 0; i < data.length; i++) {
    if(data[i].first_name != null) {
      sessionStorage.setItem('lotto_'+data[i].lotto_id, 'The winner is '+data[i].first_name+' '+data[i].last_name);
    } else {
      sessionStorage.setItem('lotto_'+data[i].lotto_id, 'No Winner');
    }
  }
});

$.get("../controller.php?get_lotteries=1", function(data, status){
  var container = document.getElementById('lottos');
  //console.log(data);
  for (var i = 0; i < data.length; i++) {
    var winner = sessionStorage.getItem('lotto_'+data[i].lotto_id);
    if(winner == null) {
      winner = 'There is no winner';
    }
    container.innerHTML += '<div class="lottery">';
      container.innerHTML += '<div class="info">';
        container.innerHTML += '<h2>'+data[i].name+'</h2>';
        container.innerHTML += '<div>Prize: $'+data[i].prize+'</div>';
        container.innerHTML += '<div>Date: '+data[i].date+'</div>';
      container.innerHTML += '</div>';
      if(data[i].win_1 == null) {
        container.innerHTML += '<div class="row">';
          container.innerHTML += '<h3>Lottery has not been drawn yet</h3>';
          container.innerHTML += '<a class="waves-effect waves-light btn red" onclick="gen_winner('+data[i].lotto_id+')">Generate Numbers</a>';
        container.innerHTML += '</div>';
    container.innerHTML += '</div>';
      } else {
        container.innerHTML += '<h3>Numbers</h3>';
          container.innerHTML += '<div class="row">'+
          '<div class="col s1 numbers">'+data[i].win_1+
          '</div><div class="col s1 numbers">'+data[i].win_2+
          '</div><div class="col s1 numbers">'+data[i].win_3+
          '</div><div class="col s1 numbers">'+data[i].win_4+
          '</div><div class="col s1 numbers">'+data[i].win_5+
          '</div><div class="col s1 numbers">'+data[i].win_6+
          '</div>';
        container.innerHTML += '</div><h3>'+winner+'</h3>';
    container.innerHTML += '</div>';
      }
    }
});
