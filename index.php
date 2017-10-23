<?php
include("model.php");
?>

<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>My Lotto</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/styled.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="css/modal.css">
  <script src="js/showhide.js"></script>
  <script src="js/genwin.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</head>
<body>
  <div id="overlay" onClick="display(false)"></div>

  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">My Lotto</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php">Home</a></li>
        <?php
        if(isset($_SESSION["login"])) {
          ?>
          <li><a href="view.php?page=tickets">My Tickets</a></li>
          <li><a href="view.php?page=logout">Logout</a></li>
          <?php
        } else {
          ?>
          <li><a href="view.php?page=register">Register</a></li>
          <li><a href="view.php?page=login">Login</a></li>
          <?php
        }
        ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="view.php?page=lotteries">View Lotteries</a></li>
        <?php
        if(isset($_SESSION["login"])) {
          ?>
          <li><a href="view.php?page=logout">Logout</a></li>
          <?php
        } else {
          ?>
          <li><a href="view.php?page=register">Register</a></li>
          <li><a href="view.php?page=login">Login</a></li>
          <?php
        }
        ?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <script src="js/display-user.js"></script>

      <h1 class="header center orange-text">Welcome!</h1>
      <div class="row center">
        <h5 class="header col s12 light">View Lotteries and Purchase Tickets for a chance to win</h5>
      </div>
    </div>
  </div>
  <?php show_lotteries(db_get_lotteries()); ?>

  <?php include('php/footer.php'); ?>

  </body>
</html>
