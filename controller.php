<?php
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
    header('Location: index.php');
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['register'])) {
    $first_name = !empty($_POST['first_name'])? test_user_input(($_POST['first_name'])): null;
    $last_name = !empty($_POST['last_name'])? test_user_input(($_POST['last_name'])): null;
    $dob = !empty($_POST['dob'])? test_user_input(($_POST['dob'])): null;
    $email = !empty($_POST['email'])? test_user_input(($_POST['email'])): null;
    $password2 = !empty($_POST['password'])? test_user_input(($_POST['password'])): null;
    $usertype = !empty($_POST['usertype'])? test_user_input(($_POST['usertype'])): null;
    $password = password_hash($password2, PASSWORD_DEFAULT);
    try {
      $data = array(
        'first_name' => $first_name,
        'last_name' => $last_name,
        'dob' => $dob,
        'email' => $email,
        'password' => $password,
        'usertype' => $usertype
      );
      $table = "members";
      insertData($table,$data);
      header('location:index.php');
    } catch (PDOException $e) {
      echo $e->getMessage();
      die();
    }
  }

  if(isset($_POST['login'])) {
    $email = !empty($_POST['email'])? test_user_input(($_POST['email'])): null;
  	$password = !empty($_POST['password'])? test_user_input(($_POST['password'])): null;
  	try
  	{
    $conn = db_object();
  	$stmt = $conn->prepare("SELECT first_name, email, member_id, password, usertype FROM members WHERE email=:user");
  	$stmt->bindParam(':user', $email);
  	$stmt->execute();
    $rows = $stmt -> fetch();
  		if (password_verify($password, $rows['password'])) {
  		   $_SESSION["user"] = $rows['first_name'];
     		 $_SESSION["email"] = $rows['email'];
  			 $_SESSION["user_id"] = $rows['member_id'];
  	 		 $_SESSION["usertype"] = $rows['usertype'];
  		   $_SESSION["login"] = true;
  			 //print_r($_SESSION);
         if($rows['usertype'] == 'admin') {
           header('location:admin/admin.php');
         }
         if($rows['usertype'] == 'member') {
           header('location:index.php');
         }
  		}
  		else {
  			header('location:view.php?page=login');
  		}
  	}
  	catch(PDOException $e) {
  		echo "Account creation problems".$e -> getMessage();
  		die();
  	}
  }

  if(isset($_POST['lotto_id'])) {
    echo $_SESSION["user"];
    echo $_SESSION["email"];
    echo $_SESSION["user_id"];
    echo $_POST["lotto_id"];
  }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if(isset($_GET['lotto_id'])) {
    $_SESSION["lotto_id"] = $_GET['lotto_id'];
    $_SESSION["lotto_name"] = $_GET['lotto_name'];
    $_SESSION["lotto_date"] = $_GET['lotto_date'];
    $_SESSION["lotto_prize"] = $_GET['lotto_prize'];
    header('location:view.php?page=buy_tickets');
  }
}
?>
