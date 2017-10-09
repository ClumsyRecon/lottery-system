<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Admin Panel</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/styled.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="../css/modal.css">
  <script src="../js/showhide.js"></script>
  <script src="../js/genwin.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
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
      <h1 class="header center orange-text">Welcome, Admin!</h1>
      <div class="row center">
        <h5 class="header col s12 light">Create and Manage Lotteries</h5>
      </div>
    </div>
  </div>

  <div class="container">
    <?php include('../php/lottery_results.php') ?>
    <div class="row" onClick="display(true)">
      <div class="col s2">
        <a id="new_lotto" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
      </div>
      <div class="col s4">
        <h3 id="new_lotto_label">Create Lottery</h3>
      </div>
    </div>
  </div>

  <div id="modal">
    <div id="closeModal" onClick="display(false)">X</div>
    <?php include('../php/form_lottery.php'); ?>
  </div>
  </body>
</html>
