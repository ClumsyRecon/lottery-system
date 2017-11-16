<link href="css/forms.css" rel="stylesheet">
<div id="edit">
  <form class="col s12" action="controller.php" method="post">
    <div>
      <div class="input-field s12">
        <input placeholder="Enter your first name" id="first_name" name="first_name" type="text" value=<?php echo $_SESSION["user"] ?> class="validate valid" pattern="[A-Za-z]+" required>
        <label for="first_name">First Name</label>
      </div>
    </div>

    <div>
      <div class="input-field s12">
        <input placeholder="Enter your last name" id="last_name" name="last_name" type="text" value=<?php echo $_SESSION["lname"] ?> class="validate valid" pattern="[A-Za-z]+" required>
        <label for="last_name">Last Name</label>
      </div>
    </div>

    <input type="hidden" name="member_id" value=<?php echo $_SESSION["user_id"] ?>>

    <input type="hidden" name="edit" value="member">

    <button class="btn waves-effect waves-light" type="submit" name="action">Edit
      <i class="material-icons right">send</i>
    </button>
  </form>
  <form class="col s12" action="controller.php" method="post">
    <input type="hidden" name="delete" value=<?php echo $_SESSION["user_id"] ?>>
    <button class="btn waves-effect waves-light" type="submit" name="action">Delete Account
      <i class="material-icons right">send</i>
    </button>
  </form>
</div>
