<form action="controller.php" method="post">
  <label>First Name: </label>
  <input type="text" name="first_name" placeholder="Enter your first name..">

  <label>Last Name: </label>
  <input type="text" name="last_name" placeholder="Enter your last name..">

  <label>Date of Birth: </label>
  <input type="date" name="dob">

  <label>Email: </label>
  <input type="text" name="email" placeholder="Enter your email..">

  <label>Password: </label>
  <input type="password" name="password" placeholder="Enter your password..">

  <label>Usertype: </label>
  <input type="text" name="usertype">

  <input type="hidden" name="register" value="true">
  <input type="submit" value="Register">
</form>
