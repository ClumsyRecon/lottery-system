<html>
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
  </head>
  <body>
    <form action="register.php" method="post">
      <label>First Name: </label><input type="text" name="first_name">
      <label>Last Name: </label><input type="text" name="last_name">
      <label>Date of Birth: </label><input type="date" name="dob">
      <label>Email: </label><input type="email" name="email">
      <label>Password: </label><input type="password" name="password">
      <input type="submit" value="Submit">
    </form>
    <?php
    if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['dob']) && isset($_POST['email']) && isset($_POST['password'])) {
      try {
          $conn = new PDO("mysql:host=localhost;dbname=lottery_system;charset=utf8","root","");
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO members (first_name, last_name, dob, email, password) VALUES ('" . $_POST['first_name'] . "', '" .  $_POST['last_name'] . "', '" .  $_POST['dob'] . "', '" .  $_POST['email'] . "', '" .  $_POST['password'] . "')";
          $conn->exec($sql);
          echo "Registration has been completed.";
          }
      catch(PDOException $e)
          {
          echo $sql . "<br>" . $e->getMessage();
          }

      $conn = null;
    }
    ?>
  </body>
</html>
