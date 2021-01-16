<?php
  // Plik wywoływany przez skrypt JavaScript za pomocą jQuery z pliku add_user.php
  session_start();
  require_once "dbConnect.php";

  if (isset($_POST['user_name']) && isset($_POST['user_surname']) && isset($_POST['user_login']) && isset($_POST['user_password']) && isset($_POST['user_role'])) {

    if (!empty($_POST['user_name']) && !empty($_POST['user_surname']) && !empty($_POST['user_login']) && !empty($_POST['user_password']) && !empty($_POST['user_role'])) {

      $limit_h_query = "SELECT `house_limit` FROM users WHERE id_user='".$_SESSION['logged']['id']."'";
      $limit_h_result = $mysqli->query($limit_h_query) or die("Zapytanie limit_h_query nie działa");

      $num_rows = $limit_h_result->num_rows;
      $r = $limit_h_result->fetch_assoc();

      if ($num_rows == 1) {
        $limit = $r['house_limit'];
      }
      
      $add_user_query = "INSERT INTO users(`name`,`surname`,`login`,`password`,`role`,`house_limit`) VALUES('".$_POST['user_name']."','".$_POST['user_surname']."','".$_POST['user_login']."','".$_POST['user_password']."','".$_POST['user_role']."','".$limit."')";
      $add_user_result = $mysqli->query($add_user_query) or die("Zapytanie add_user_query nie działa");

      if (!$add_user_result)
        echo json_encode(2); //Zapytanie nie powiodło się

      echo json_encode(3); //Wszystko działa
    } else {
      echo json_encode(1); //Zmienne  puste
    }
  } else {
    echo json_encode(0); //Zmienne nie istnieją
  }

?>