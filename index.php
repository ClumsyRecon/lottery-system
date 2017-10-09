<?php
session_start();
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
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">My Lotto</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="view.php?page=lotteries">View Lotteries</a></li>
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

      <?php
      $user = ", Guest!";
      if(isset($_SESSION['user'])) {
        $user = ', '.$_SESSION['user'].'!';
      }
      ?>

      <h1 class="header center orange-text">Welcome<?php echo $user ?></h1>
      <div class="row center">
        <h5 class="header col s12 light">View Lotteries and Purchase Tickets for a chance to win</h5>
      </div>
      <br><br>
    </div>
  </div>

  <div class="container">
      <div class="section">
        <div class="row">
          <div class="col s12 m4">
            <div class="icon-block">
              <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
              <h5 class="center">Speeds up development</h5>

              <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
            </div>
          </div>

          <div class="col s12 m4">
            <div class="icon-block">
              <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
              <h5 class="center">User Experience Focused</h5>

              <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
            </div>
          </div>

          <div class="col s12 m4">
            <div class="icon-block">
              <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
              <h5 class="center">Easy to work with</h5>

              <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
            </div>
          </div>
        </div>

      </div>
      <br><br>
    </div>

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
        </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by Daniel Johansson
      </div>
    </div>
  </footer>
  </body>
</html>
