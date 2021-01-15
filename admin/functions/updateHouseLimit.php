<?php
  //Plik wywoływany przez skrypt JavaScript za pomocą jQuery z pliku settings.php
  require_once "dbConnect.php";

  if (isset($_POST['house_limit'])) {
    if (!empty($_POST['house_limit'])) {
      $hlu_query = "UPDATE users SET house_limit='".$_POST['house_limit']."'";
      $result_hlu_query = $mysqli->query($hlu_query) or die("Zapytanie hlu_query nie działa");

      if (!$result_hlu_query)
        echo json_encode(2); //Zapytanie nie powiodło się

      echo json_encode(3); //Wszystko działa
    } else {
      echo json_encode(1); //Zmienne username i personal_limit puste
    }
  } else {
    echo json_encode(0); //Zmienne username i personal_limit nie istnieją
  }
  
?>