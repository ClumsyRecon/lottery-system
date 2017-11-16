<?php
include_once('model.php');

if(isset($_POST['create'])) {
  if($_POST['create'] == 'lottery') {
    $values = array('name' => $_POST['name'],
                    'prize' => $_POST['prize'],
                    'date' => $_POST['date'],
                    'image' => $_FILES["image"]["name"]
                  );

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

      $conn = db_object();
      $stmt = $conn->prepare("SELECT first_name, last_name, email, member_id, password, usertype FROM members WHERE email=:user");
      $stmt->bindParam(':user', $email);
      $stmt->execute();
      $rows = $stmt -> fetch();
      $_SESSION["user"] = $rows['first_name'];
      $_SESSION["lname"] = $rows['last_name'];
      $_SESSION["member"] = $rows['first_name'].' '.$rows['last_name'];
      $_SESSION["user_id"] = $rows['member_id'];
      $_SESSION["usertype"] = $rows['usertype'];
      $_SESSION["login"] = true;

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
      $stmt = $conn->prepare("SELECT first_name, last_name, email, member_id, password, usertype FROM members WHERE email=:user");
      $stmt->bindParam(':user', $email);
      $stmt->execute();
      $rows = $stmt -> fetch();
      if (password_verify($password, $rows['password'])) {
        $_SESSION["user"] = $rows['first_name'];
        $_SESSION["lname"] = $rows['last_name'];
        $_SESSION["member"] = $rows['first_name'].' '.$rows['last_name'];
        $_SESSION["user_id"] = $rows['member_id'];
        $_SESSION["usertype"] = $rows['usertype'];
        $_SESSION["login"] = true;

        if($rows['usertype'] == 'admin') {
          header('location:admin/admin.php');
        }
        if($rows['usertype'] == 'member') {
          header('location:index.php');
        }
      }
      else {
        header('location:view.php?page=login&login=failed');
      }
    }
    catch(PDOException $e) {
      echo "Account creation problems".$e -> getMessage();
      die();
    }
  }

  if(isset($_POST['num1'])) {
    try {
      $data = array(
        'win_1' => $_POST['num1'],
        'win_2' => $_POST['num2'],
        'win_3' => $_POST['num3'],
        'win_4' => $_POST['num4'],
        'win_5' => $_POST['num5'],
        'win_6' => $_POST['num6'],
        'lotto_id' => $_POST['lid']
      );
      generate_winner($data);
    } catch (PDOException $e) {
      echo $e->getMessage();
      die();
    }
  }

  if(isset($_POST['lotto_id'])) {
    echo $_SESSION["user"];
    echo $_SESSION["email"];
    echo $_SESSION["user_id"];
    echo $_POST["lotto_id"];
  }

  if(isset($_POST['edit'])) {
    $data = array(
      'first_name' => !empty($_POST['first_name'])? test_user_input(($_POST['first_name'])): null,
      'last_name' => !empty($_POST['last_name'])? test_user_input(($_POST['last_name'])): null,
      'member_id' => !empty($_POST['member_id'])? test_user_input(($_POST['member_id'])): null
    );
    updateMember($data);
    header('location:index.php');
  }
  if(isset($_POST['delete'])) {
    deleteMember($_POST['delete']);
    header('location:view.php?page=logout');
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
  if(isset($_GET['get_user'])) {
    $guest['user'] = 'Guest';
    header('Content-Type: application/json');
    if(isset($_SESSION['user'])) {
      echo json_encode($_SESSION);
    } else {
      echo json_encode($guest);
    }
  }
  if(isset($_GET['get_lotteries'])) {
    header('Content-Type: application/json');
    echo json_encode(db_get_lotteries());
  }
  if(isset($_GET['get_winner'])) {
    header('Content-Type: application/json');
    echo json_encode(db_get_winner());
  }
}
?>
