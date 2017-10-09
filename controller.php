<?php
session_start();
include_once('model.php');

if(isset($_POST['create'])) {
  if($_POST['create'] == 'lottery') {
    $values = array('name' => $_POST['name'],
                    'prize' => $_POST['prize'],
                    'date' => $_POST['date']
                  );
    create_lottery($values);
    header('Location: admin/admin.php');
  }
  if($_POST['create'] == 'ticket') {
    $values = array('lotto_id' => $_POST['lotto_id'],
                    'user_id' => $_POST['user_id'],
                    'num_1' => $_POST['num_1'],
                    'num_2' => $_POST['num_2'],
                    'num_3' => $_POST['num_3'],
                    'num_4' => $_POST['num_4'],
                    'num_5' => $_POST['num_5'],
                    'num_6' => $_POST['num_6']
                  );
    new_ticket($values);
    header('Location: view.php?request=tickets');
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['loggingin'])) {
    $username = !empty($_POST['username'])? test_user_input(($_POST['username'])): null;
  	$password = !empty($_POST['password'])? test_user_input(($_POST['password'])): null;
  	try
  	{
  	$stmt = $conn->prepare("SELECT password, usertype FROM admin WHERE username=:user");
  	$stmt->bindParam(':user', $username);
  	$stmt->execute();
  	$rows = $stmt -> fetch();
  		if (password_verify($password, $rows['password'])) {
  		   $_SESSION["user"] = $username;
     		 $_SESSION["userType"] = $rows['usertype'];
  		   $_SESSION["loggedin"] = true;
  		   header('location:../admin/admin.php');
  		}
  		else {
  			header('location:../view.php?page=login');
  		}
  	}
  	catch(PDOException $e) {
  		echo "Account creation problems".$e -> getMessage();
  		die();
  	}
  }
}
?>
