<html>
  <head>
    <meta charset="utf-8">
    <title>Lotteries</title>
  </head>
  <body>
    <?php
    $db = new PDO("mysql:host=localhost;dbname=lottery_system;charset=utf8","root","");
    $sql = "SELECT prize, date FROM lotteries WHERE date >= CURRENT_DATE ORDER BY date LIMIT 1";
    $sth = $db->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll();
    foreach($result as $row) {
      echo '<section class="lottery">';
        echo '<ul>';
          echo '<li>' . $row['prize'] . '</li>';
          echo '<li>' . $row['date'] . '</li>';
        echo '</ul>';
      echo '</section>';
    }
    ?>
  </body>
</html>
