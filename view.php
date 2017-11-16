<?php
include_once('model.php');
include_once('css/cdn.php');
include_once('php/header.php');

if(!isset($_SESSION['login'])) {
  if($_GET['page'] == 'register' || $_GET['page'] == 'login') {
  } else {
    header('Location:index.php');
  }
}

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

  case 'buy_tickets':
    include_once('php/form_ticket.php');
    break;

  case 'tickets':
    show_tickets(db_get_users_lotteries($_SESSION['user_id']), db_get_users_tickets($_SESSION['user_id']));
    break;

  case 'edit':
    include_once('php/form_edit.php');
    break;

  default:
    echo 'Page not found.';
    break;
}

include_once('php/footer.php');
 ?>
