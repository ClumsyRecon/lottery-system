<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/styled.css">
<link rel="stylesheet" href="css/ticket.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/numselect.js"></script>
<script type="text/javascript">
//Change User ID
function submit() {
  $.post("controller.php",
  {
    lotto_id: <?php echo $_SESSION['lotto_id']; ?>,
    user_id: <?php echo $_SESSION["user_id"]; ?>,
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
    feedback.innerHTML = status;
    window.location.href = "view.php?page=tickets";
  });

}
</script>
<div class="container">
  <h2>You are purchasing a ticket for this lottery</h2>
  <div class="lottery">
    <div class="lottery">
      <h3><?php echo $_SESSION['lotto_name'] ?></h3>
      <div class="row info">
        <h4>Prize: <?php echo $_SESSION['lotto_prize'] ?></h4>
        <h4>Date: <?php echo $_SESSION['lotto_date'] ?></h4>
      </div>
    </div>
  </div>
  <h4 class="ui">Please select 6 numbers to proceed to click Buy.</h4>
  <div class='row'>
  <?php
    for ($row = 0; $row <= 5; $row++) {
      for ($i = 1; $i <= 10; $i++) {
        $n = ($row*10+$i);
        echo "<div class='col s1 numbers' id=".$n." onClick='pick(this)'>".$n."</div>";
      }
    }
  ?>
  </div>
  <h5 class="ui">Your Numbers:</h5><div id="output"></div>
  <div class="ui">
    <button class="btn waves-effect waves-light" onclick="wipe()" type="button">Clear Selection</button>
    <button id="buy" onclick="submit()" class="btn waves-effect waves-light" onclick="wipe()" type="submit" disabled>Buy
      <i class="material-icons right">send</i>
    </button>
  </div>
  <div class="ui">
    <p id="feedback"></p>
  </div>
</div>

<?php include_once('footer.php'); ?>
