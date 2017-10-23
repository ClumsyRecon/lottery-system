<div id="login">
  <form class="col s12" action="controller.php" method="post">
    <div>
      <div class="input-field s12">
        <input placeholder="Enter your email" id="email" name="email" type="email" class="validate">
        <label for="email" class="active">Email</label>
      </div>
    </div>
    <div>
      <div class="input-field s12">
        <label for="password">Password: </label>
        <input id="password" type="password" name="password" class="validate" placeholder="Enter your password">
      </div>
    </div>
    <input type="hidden" name="login" value="true">
    <button class="btn waves-effect waves-light" type="submit" name="action">Login
      <i class="material-icons right">send</i>
    </button>
  </form>
</div>
<?php include_once('footer.php'); ?>
