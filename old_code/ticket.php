<?php
if(isset($_POST['num_1']) && isset($_POST['num_2']) && isset($_POST['num_3']) && isset($_POST['num_4']) && isset($_POST['num_5']) && isset($_POST['num_6'])) {
  try {
      $conn = new PDO("mysql:host=localhost;dbname=lottery_system;charset=utf8","root","");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO tickets (lotto_id, user_id, num_1, num_2, num_3, num_4, num_5, num_6) VALUES ('1', '2', '" .  $_POST['num_1'] . "', '" .  $_POST['num_2'] . "', '" .  $_POST['num_3'] . "', '" . $_POST['num_4'] . "', '" .  $_POST['num_5'] . "', '" .  $_POST['num_6'] . "')";
      $conn->exec($sql);
      echo "Registration has been completed.";
      }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $conn = null;
}
 ?>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <style media="screen">
       #buy-ticket {
         background-color: #2AD;
         padding: 10px;
         width: 80%;
         margin: auto;
         position: relative;
       }
       #buy-ticket input[type="number"] {
         padding: 5px;
         font-size: 1em;
       }
       #buy-ticket fieldset {
         border: 0;
       }
       #buy {
         background-color: lime;
         border: 0;
         width: 100px;
         border-radius: 5px;
         padding: 0.2em 0.5em;
         font-size: 1.3em;
       }
       #close {
         position: absolute;
         top: 10px;
         right: 10px;
       }
     </style>
   </head>
   <body>
     <form id="buy-ticket" action="ticket.php" method="post">
       <div id="close">&#10006;</div>
       <fieldset>
         <input type="number" name="num_1" min="1" max="60" value="1">
         <input type="number" name="num_2" min="1" max="60" value="2">
         <input type="number" name="num_3" min="1" max="60" value="3">
         <input type="number" name="num_4" min="1" max="60" value="4">
         <input type="number" name="num_5" min="1" max="60" value="5">
         <input type="number" name="num_6" min="1" max="60" value="6">
       </fieldset>
       <input id="buy" type="submit" value="Buy">
     </form>
   </body>
 </html>
