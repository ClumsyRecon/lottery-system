<?php
session_start();

function db_object() {
  try {
    $db = new PDO("mysql:host=localhost;dbname=lottery_system;charset=utf8","root","");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    $_SESSION['error'] = $e;
    return false;
  }
  return $db;
}

function db_authentication() {
  $conn = db_object();
  if($conn == false) {
    return false;
  }

  try {
    $res = $conn->prepare($sql);
    $res->execute();
  } catch (PDOException $e) {
    $_SESSION['error'] = $e;
    return false;
  }
}

function test_user_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function insertData($table, $data) {
  $conn = db_object();
  if(!empty($data) && is_array($data)) {
    $columns = '';
    $values = '';
    $i = 0;
    $columnString = implode(',', array_keys($data));
    $valueString = ":".implode(',:', array_keys($data));
    $sql = "INSERT INTO ".$table." (".$columnString.") VALUES (".$valueString.")";
    $query = $conn->prepare($sql);
    print_r($data);
    foreach ($data as $key => $val) {
      $query->bindValue(':'.$key, $val);
    }
    $insert = $query->execute();
  }
  return $insert;
}



function db_get_tickets() {
  $conn = db_object();
  if($conn == false) {
    return false;
  }
  $sql = "SELECT tickets.*, CONCAT(first_name, ' ', last_name) AS 'owner' FROM members, tickets WHERE tickets.user_id = members.member_id ORDER BY lotto_id, user_id";

  try {
    $res = $conn->prepare($sql);
    $res->execute();
  } catch (PDOException $e) {
    $_SESSION['error'] = $e;
    return false;
  }
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

function show_tickets($tickets) {
  include_once('css/cdn.php');
  ?>
  <link href="css/styled.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <div class="container">
    <div class="lottery">
      <?php
      foreach ($tickets as $ticket) {
      ?>
        <h2><?php echo $ticket['owner'] ?></h2>
        <h3>Numbers</h3>
        <div class="row">
          <div class="col s1 numbers"><?php echo $ticket['num_1'] ?></div>
          <div class="col s1 numbers"><?php echo $ticket['num_2'] ?></div>
          <div class="col s1 numbers"><?php echo $ticket['num_3'] ?></div>
          <div class="col s1 numbers"><?php echo $ticket['num_4'] ?></div>
          <div class="col s1 numbers"><?php echo $ticket['num_5'] ?></div>
          <div class="col s1 numbers"><?php echo $ticket['num_6'] ?></div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
  <?php
}


function db_get_lotteries() {
  $conn = db_object();
  if($conn == false) {
    return false;
  }
  //$sql = "SELECT lotteries.*, CONCAT(first_name, ' ', last_name) AS 'owner', tickets.num_1, tickets.num_2, tickets.num_3, tickets.num_4, tickets.num_5, tickets.num_6 FROM members, tickets, lotteries WHERE tickets.user_id = members.member_id";
  $sql = "SELECT * FROM lotteries ORDER BY date";
  try {
    $res = $conn->prepare($sql);
    $res->execute();
  } catch (PDOException $e) {
    $_SESSION['error'] = $e;
    return false;
  }
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

function show_lotteries($lotteries) {
  include_once('css/cdn.php');
  ?>
  <link href="css/styled.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <div class="container">
    <div class="lottery">
      <fieldset>
        <main>Ticket</main>
        <?php
        foreach ($lotteries as $lottery) {
        ?>
          <div class="lottery">
            <h2><?php echo $lottery['name'] ?></h2>
            <div class="row info">
              <h3>Prize:
                <?php
                $price = strrev($lottery['prize']);
                $eh = str_split($price, 3);
                $price = '';
                foreach ($eh as $key => $n) {
                  if($key == 0) {
                    $price .= $n;
                  } else {
                    $price .= ",".$n;
                  }
                }
                $prize = strrev($price);
                echo '$'.$prize;
                ?>
              </h3>
              <h3>Date:
                <?php
                $date = DateTime::createFromFormat('Y-m-d', $lottery['date']);
                $d = $date->format('D-d-M-Y');
                $day1 = '';
                $day2 = '';
                $month = '';
                $year = '';
                list($day1, $day2, $month, $year) = preg_split('[-]', $d);

                switch ($day1) {
                  case 'Mon':
                    $day1 = 'Monday';
                    break;
                  case 'Tue':
                    $day1 = 'Tuesday';
                    break;
                  case 'Wed':
                    $day1 = 'Wednesdau';
                    break;
                  case 'Thu':
                    $day1 = 'Thursday';
                    break;
                  case 'Fri':
                    $day1 = 'Friday';
                    break;
                  case 'Sat':
                    $day1 = 'Saturday';
                    break;
                  case 'Sun':
                    $day1 = 'Sunday';
                    break;
                }

                $arr = preg_split("[]",$day2);
                $mend = 'th';
                switch ($arr[strlen($day2)]) {
                  case '1':
                    if($arr[strlen($day2)-1] != '1' && strlen($day2) != 1) {
                      $mend = 'st';
                    }
                    break;
                  case '2':
                    $mend = 'nd';
                    break;
                }
                if($arr[strlen($day2)-1] == '0') {
                  $arr[strlen($day2)-1] = '';
                }
                $day2 = $arr[strlen($day2)-1].''.$arr[strlen($day2)].''.$mend;

                switch ($month) {
                  case 'Jan':
                    $month = 'January';
                    break;
                  case 'Feb':
                    $month = 'February';
                    break;
                  case 'Mar':
                    $month = 'March';
                    break;
                  case 'Apr':
                    $month = 'April';
                    break;
                  case 'Jun':
                    $month = 'June';
                    break;
                  case 'Jul':
                    $month = 'July';
                    break;
                  case 'Aug':
                    $month = 'August';
                    break;
                  case 'Sep':
                    $month = 'September';
                    break;
                  case 'Oct':
                    $month = 'October';
                    break;
                  case 'Nov':
                    $month = 'November';
                    break;
                  case 'Dec':
                    $month = 'December';
                    break;
                }
                echo $day1.' '.$day2.' '.$month.' '.$year;
                ?>
              </h3>
              <form action="controller.php" method="post">
                <input type="hidden" name="lotto_id" value=<?php echo $lottery['lotto_id'] ?>>
                <button class="btn waves-effect waves-light" type="submit" name="action">Buy Ticket <?php echo $lottery['lotto_id'] ?>
                  <i class="material-icons right">send</i>
                </button>
              </form>
            </div>
          </div>
          <?php
        }
        ?>
        </fieldset>
        <?php
}


function create_lottery($data) {
  $conn = db_object();
  if($conn == false) {
    return false;
  }
  if(!empty($data) && is_array($data)) {
    $columns = '';
    $values = '';
    $i = 0;
    $columnString = implode(',', array_keys($data));
    $valueString = ":".implode(',:', array_keys($data));
    $sql = "INSERT INTO lotteries (".$columnString.") VALUES (".$valueString.")";
    $query = $conn->prepare($sql);
    print_r($data);
    foreach ($data as $key => $val) {
      $query->bindValue(':'.$key, $val);
    }
    $insert = $query->execute();
  }
  return $insert;
}

function new_ticket($data) {
  $conn = db_object();
  if($conn == false) {
    return false;
  }
  if(!empty($data) && is_array($data)) {
    $columns = '';
    $values = '';
    $i = 0;
    $columnString = implode(',', array_keys($data));
    $valueString = ":".implode(',:', array_keys($data));
    $sql = "INSERT INTO tickets (".$columnString.") VALUES (".$valueString.")";
    $query = $conn->prepare($sql);
    print_r($data);
    foreach ($data as $key => $val) {
      $query->bindValue(':'.$key, $val);
    }
    $insert = $query->execute();
  }
  return $insert;
}
 ?>
