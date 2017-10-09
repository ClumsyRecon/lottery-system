<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/genwin.js"></script>
    <script src="../js/showhide.js"></script>
  </head>
  <body>
    <div id="overlay" onClick="display(false)"></div>
    <header>
      <h1>Admin Panel</h1>
      <button id="log" type="button" name="logout" onclick="gen_winner()">Generate Winner</button>
    </header>
    <?php include('../php/lottery_results.php') ?>
    <button id="new" onClick="display(true)">Create Lottery</button>
    <div id="modal">
      <div id="closeModal" onClick="display(false)">X</div>
      <?php include('../php/form_lottery.php'); ?>
    </div>
  </body>
</html>
