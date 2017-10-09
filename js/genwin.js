function gen_winner(lotto) {
  var numbers = [,,,,,,];
  numbers[0] = getRandomNum();
  for(var i=1;i<numbers.length;i++) {
    var n;
    do {
      n = getRandomNum();
    } while(numbers.indexOf(n) != -1)
    numbers[i] = n;
  }
  var swapped;
  do {
      swapped = false;
      for (var i=0; i < numbers.length-1; i++) {
          if (numbers[i] > numbers[i+1]) {
              var temp = numbers[i];
              numbers[i] = numbers[i+1];
              numbers[i+1] = temp;
              swapped = true;
          }
      }
  } while (swapped);
  // Change ID to the current lottery ID
  $.post("../php/generate_winner.php",
  {
    num1: numbers[0],
    num2: numbers[1],
    num3: numbers[2],
    num4: numbers[3],
    num5: numbers[4],
    num6: numbers[5],
    lid: lotto
  },
  function(data,status){
      console.log("Data: " + data + "\nStatus: " + status);
      //location.reload();
  });
}

function getRandomNum() {
  return Math.round(Math.random() * 59 + 1);
}
