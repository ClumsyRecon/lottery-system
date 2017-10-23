<?php
include_once('model.php');
include_once('css/cdn.php');

switch ($_GET['page']) {
  case 'register':
    ?>
    <link href="css/forms.css" rel="stylesheet">
    <?php
    include_once('php/header.php');
    include_once('php/form_registration.php');
    break;

  case 'login':
    ?>
    <link href="css/forms.css" rel="stylesheet">
    <?php
    include_once('php/header.php');
    include_once('php/form_login.php');
    break;

  case 'logout':
    session_destroy();
    header('location:index.php');
    break;

  case 'lotteries':
    include_once('php/header.php');
    show_lotteries(db_get_lotteries());
    break;

  case 'tickets':
    include_once('php/header.php');
    show_tickets(db_get_tickets());
    break;

  default:
    echo 'Page not found.';
    break;
}
 ?>
