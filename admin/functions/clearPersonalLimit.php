<?php
  //Plik wywoływany przez skrypt JavaScript za pomocą jQuery z pliku settings.php
  require_once "dbConnect.php";

  if (isset($_POST['username'])) {
    if (!empty($_POST['username'])) {
      $pluc_query = "UPDATE users SET personal_limit_used='0' WHERE login LIKE '".$_POST['username']."'";
      $result_pluc_query = $mysqli->query($pluc_query) or die("Zapytanie pluc_query nie działa");

      if (!$result_pluc_query)
        echo json_encode(2); //Zapytanie nie powiodło się

      echo json_encode(3); //Wszystko działa
    } else {
      echo json_encode(1); //Zmienne username i personal_limit puste
    }
  } else {
    echo json_encode(0); //Zmienne username i personal_limit nie istnieją
  }
  
?>