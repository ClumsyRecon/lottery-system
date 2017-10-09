<?php
include_once('model.php');

switch ($_GET['page']) {
  case 'register':
    include_once('php/form_registration.php');
    break;

  case 'login':
    include_once('php/form_login.php');
    break;

  case 'logout':
    session_destroy();
    header('location:index.php');
    break;

  case 'lotteries':
    show_lotteries(db_get_lotteries());
    break;

  case 'tickets':
    show_tickets(db_get_tickets());
    break;

  default:
    # code...
    break;
}
 ?>
