<div id="results">
  <?php
  $db = new PDO("mysql:host=localhost;dbname=lottery_system;charset=utf8","root","");
  $sql = "SELECT * FROM tickets";
  $sth = $db->prepare($sql);
  $sth->execute();
  $result = $sth->fetchAll();
  foreach($result as $row) {
    ?>

    <div class="lottery">
      <h2><?php echo $row['name'] ?></h2>
      <div class="info">
        <div>Prize: $<?php echo $row['prize'] ?></div>
        <div>Date: <?php echo $row['date'] ?></div>
      </div>
      <h3>Numbers</h3>
      <div class="row">
        <div class="col s1 numbers"><?php echo $row['num_1'] ?></div>
        <div class="col s1 numbers"><?php echo $row['num_2'] ?></div>
        <div class="col s1 numbers"><?php echo $row['num_3'] ?></div>
        <div class="col s1 numbers"><?php echo $row['num_4'] ?></div>
        <div class="col s1 numbers"><?php echo $row['num_5'] ?></div>
        <div class="col s1 numbers"><?php echo $row['num_6'] ?></div>
      </div>
    </div>
    <?php
  }
  ?>
</div>
