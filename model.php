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
  $sql = "SELECT tickets.*, CONCAT(first_name, ' ', last_name) AS 'owner' FROM members, tickets WHERE tickets.user_id = members.member_id";

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
  echo '<fieldset><main>Ticket</main>';
  foreach ($tickets as $ticket) {
    echo '<div>' . $ticket['owner'] . '<ol><li>' . $ticket['num_1'] . '</li><li>' . $ticket['num_2'] . '</li><li>' . $ticket['num_3'] . '</li><li>' . $ticket['num_4'] . '</li><li>' . $ticket['num_5'] . '</li><li>' . $ticket['num_6'] . '</li></ol></div>';
  }
  echo '</fieldset>';
}


function db_get_lotteries() {
  $conn = db_object();
  if($conn == false) {
    return false;
  }
  $sql = "SELECT lotteries.*, CONCAT(first_name, ' ', last_name) AS 'owner' FROM members, tickets WHERE tickets.user_id = members.member_id";

  try {
    $res = $conn->prepare($sql);
    $res->execute();
  } catch (PDOException $e) {
    $_SESSION['error'] = $e;
    return false;
  }
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

function show_lotteries($tickets) {
  echo '<fieldset><main>Ticket</main>';
  foreach ($tickets as $ticket) {
    echo '<div>' . $ticket['owner'] . '<ol><li>' . $ticket['num_1'] . '</li><li>' . $ticket['num_2'] . '</li><li>' . $ticket['num_3'] . '</li><li>' . $ticket['num_4'] . '</li><li>' . $ticket['num_5'] . '</li><li>' . $ticket['num_6'] . '</li></ol></div>';
  }
  echo '</fieldset>';
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
