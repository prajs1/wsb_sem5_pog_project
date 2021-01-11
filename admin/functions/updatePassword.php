<?php
  //Plik wywoływany przez skrypt JavaScript za pomocą jQuery z pliku settings.php
  require_once "dbConnect.php";

  if (isset($_POST['username']) && isset($_POST['password'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
      $plu_query = "UPDATE users SET password='".$_POST['password']."' WHERE login LIKE '".$_POST['username']."'";
      $result_plu_query = $mysqli->query($plu_query) or die("Zapytanie plu_query nie działa");

      //TODO zmienić przekazywanie hasła w UPDATE na bezpeiczny sposób, najlepiej dodać jakieś szyfrowanie w bazie danych sha1 na podstawie hasa i "soli"

      if (!$result_plu_query)
        echo json_encode(2); //Zapytanie nie powiodło się

      echo json_encode(3); //Wszystko działa
    } else {
      echo json_encode(1); //Zmienne username i password puste
    }
  } else {
    echo json_encode(0); //Zmienne username i password nie istnieją
  }
  
?>