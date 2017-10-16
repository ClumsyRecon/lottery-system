<?php
session_start();
$guest['user'] = 'Guest';
header('Content-Type: application/json');
if(isset($_SESSION['user'])) {
  echo json_encode($_SESSION);
} else {
  echo json_encode($guest);
}
?>
