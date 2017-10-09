<link rel="stylesheet" href="../css/reset.css">
<link rel="stylesheet" href="../css/ticket.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/numselect.js"></script>
<script type="text/javascript">
//Change User ID
function submit() {
  $.post("../controller.php",
  {
    lotto_id: <?php echo $_GET['lotto_id']; ?>,
    user_id: 1,
    num_1: nums[0],
    num_2: nums[1],
    num_3: nums[2],
    num_4: nums[3],
    num_5: nums[4],
    num_6: nums[5],
    create: 'ticket'
  },
  function(data,status){
      console.log("Data: " + data + "\nStatus: " + status);
  });
}
</script>
<div id="numbers">
<?php
  for ($row = 0; $row <= 5; $row++) {
    echo "<div class='row'>";
    for ($i = 1; $i <= 10; $i++) {
      $n = ($row*10+$i);
      echo "<span id=".$n." onClick='pick(this)'>".$n."</span>";
    }
    echo "</div>";
  }
?>
<label>Your Numbers:</label><label id="output"></label>
</div>
<button onclick="submit()" type="button">Buy</button>
