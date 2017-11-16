<nav class="light-blue lighten-1" role="navigation">
  <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">My Lotto</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="index.php">Home</a></li>
      <?php
      if(isset($_SESSION["login"])) {
        ?>
        <li><a href="view.php?page=tickets">My Tickets</a></li>
        <li><a href="view.php?page=edit">Edit Details</a></li>
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
      <li><a href="index.php">Home</a></li>
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
