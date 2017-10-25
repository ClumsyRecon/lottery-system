<link href="css/forms.css" rel="stylesheet">
<div id="registration">
  <form class="col s12" action="controller.php" method="post">
    <div>
      <div class="input-field s12">
        <input placeholder="Enter your first name" id="first_name" name="first_name" type="text" class="validate">
        <label for="first_name">First Name</label>
      </div>
    </div>

    <div>
      <div class="input-field s12">
        <input placeholder="Enter your last name" id="last_name" name="last_name" type="text" class="validate">
        <label for="last_name">Last Name</label>
      </div>
    </div>

    <div>
      <div class="input-field s12">
        <input id="dob" name="dob" type="date" class="datepicker" placeholder="yyyy-mm-dd">
        <label for="dob">Date of Birth</label>
      </div>
    </div>

    <div>
      <div class="input-field s12">
        <input placeholder="Enter your email" id="email" name="email" type="email" class="validate">
        <label for="email" class="active">Email</label>
      </div>
    </div>

    <div>
      <div class="input-field s12">
        <input id="password" type="password" name="password" class="validate" placeholder="Enter your password">
        <label for="password">Password</label>
      </div>
    </div>

    <input type="hidden" name="usertype" value="member">

    <input type="hidden" name="register" value="true">
    <button class="btn waves-effect waves-light" type="submit" name="action">Register
      <i class="material-icons right">send</i>
    </button>
  </form>
</div>
<script type="text/javascript">
  $('.datepicker').pickadate({
  selectMonths: true,
  selectYears: 100,
  max: new Date(),
  today: 'Today',
  clear: 'Clear',
  close: 'Ok',
  closeOnSelect: true,
  format: 'yyyy-mm-dd'
  });
</script>
