<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Admin Panel</title>
  <?php
  //session_start();

  include_once('../model.php');

  if(!isset($_SESSION['login'])) {
    header('Location:../index.php');
  }

  if($_SESSION['usertype'] == 'member') {
    header('Location:../index.php');
  }

  include_once('../css/cdn.php');
  ?>
  <link href="../css/styled.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="../css/modal.css">
  <script src="../js/showhide.js"></script>
  <script src="../js/genwin.js"></script>
</head>
<body>
  <div id="overlay" onClick="display(false)"></div>

  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">My Lotto Admin</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="../view.php?page=logout">Logout</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="../view.php?page=logout">Logout</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <script src="../js/display-admin.js"></script>

      <h1 class="header center orange-text">Welcome!</h1>
      <div class="row center">
        <h5 class="header col s12 light">Create and Manage Lotteries</h5>
      </div>
    </div>
  </div>

  <div class="container">
    <script type="text/javascript" src="../js/admin-view.js"></script>
    <div id="lottos"></div>
    <div class="row" onClick="display(true)">
      <div class="col s2">
        <a id="new_lotto" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i><h3 id="new_lotto_label">Create Lottery</h3></a>

      </div>
    </div>
  </div>

  <div id="modal">
    <div id="closeModal" onClick="display(false)">X</div>
    <?php include('../php/form_lottery.php'); ?>
  </div>

  <?php include('../php/footer.php'); ?>
  </body>
</html>
