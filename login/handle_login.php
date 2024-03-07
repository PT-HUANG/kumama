<?php 
  session_start();
  require_once("../conn.php");
  $username = $_POST['username'];
  $password = $_POST['password'];


  if (empty($username)||empty($password)){
    header("Location:../index.php?err_code=1");
    die("資料不齊全");
  }

  $sql = "SELECT * FROM users WHERE username = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $username);
  $result = $stmt->execute();

  if (!$result) {
    die($conn->error);
  }

  $result = $stmt->get_result();
  if($result->num_rows === 0) {
    header("Location:../index.php?err_code=2");
    exit();
  }

  $row = $result->fetch_assoc();
  if (password_verify($password, $row['password'])) {
    $_SESSION['username'] = $username;
    header("Location:../index.php");
  } else {
    header("Location:../index.php?err_code=2");
    die("帳號或密碼有誤");
  }

  
  
?>