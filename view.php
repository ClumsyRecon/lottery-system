<?php
include_once('model.php');
show_tickets(db_get_tickets());

switch ($_GET['page']) {
  case 'login':
    include_once('php/form_login.php');
    break;

  default:
    # code...
    break;
}
 ?>
