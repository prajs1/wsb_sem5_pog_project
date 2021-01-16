<?php
  // Plik wywoływany przez skrypt JavaScript za pomocą jQuery z pliku payment_history.php
  require_once "dbConnect.php";
  
  if (isset($_POST['user_id'])) {
    if (!empty($_POST['user_id'])) {
      $delete_user_query = "DELETE FROM users WHERE id_user LIKE '".$_POST['user_id']."'";

      $result_delete_user = $mysqli->query($delete_user_query) or die("Zapytanie delete_user_query nie powiodło się");
    
      if (!$result_delete_user)
        echo json_encode(2); //Zapytanie nie powiodło się

      echo json_encode(3); //Wszystko działa
    } else {
      echo json_encode(1); //Zmienne  puste
    }
  } else {
    echo json_encode(0); //Zmienne nie istnieją
  }

?>