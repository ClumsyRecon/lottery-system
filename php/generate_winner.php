<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=lottery_system;charset=utf8","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE lotteries SET win_1 = " . $_POST['num1'] . ", win_2 = " . $_POST['num2'] . ", win_3 = " . $_POST['num3'] . ", win_4 = " . $_POST['num4'] . ", win_5 = " . $_POST['num5'] . ", win_6 = " . $_POST['num6'] . " WHERE lotteries.lotto_id = ". $_POST['id'];
    $conn->exec($sql);
    echo "Numbers have been generated successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
 ?>
