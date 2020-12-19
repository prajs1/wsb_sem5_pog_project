<?php
  //Plik wywoływany przez skrypt JavaScript za pomocą jQuery z pliku settings.php
  require_once "dbConnect.php";

  if (isset($_POST['username']) && isset($_POST['personal_limit'])) {
    if (!empty($_POST['username']) && !empty($_POST['personal_limit'])) {
      $plu_query = "UPDATE users SET personal_limit='".$_POST['personal_limit']."' WHERE login LIKE '".$_POST['username']."'";
      $result_plu_query = $mysqli->query($plu_query) or die("Zapytanie plu_query nie działa");

      if (!$result_plu_query)
        echo json_encode(2); //Zapytanie nie powiodło się

      echo json_encode(3); //Wszystko działa
    } else {
      echo json_encode(1); //Zmienne username i personal_limit puste
    }
  } else {
    echo json_encode(0); //Zmienne username i personal_limit nie istnieją
  }
  
?>