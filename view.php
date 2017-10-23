<?php
include_once('model.php');
include_once('css/cdn.php');
include_once('php/header.php');

switch ($_GET['page']) {
  case 'register':
    ?>
    <link href="css/forms.css" rel="stylesheet">
    <?php
    include_once('php/form_registration.php');
    break;

  case 'login':
    ?>
    <link href="css/forms.css" rel="stylesheet">
    <?php
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
    show_tickets(db_get_tickets());
    break;

  default:
    echo 'Page not found.';
    break;
}
 ?>
