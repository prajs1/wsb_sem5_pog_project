<?php
  // Plik wywoływany przez skrypt JavaScript za pomocą jQuery z pliku add_recipent.php]
  require_once "dbConnect.php";

  if (isset($_POST['recipent_name']) && isset($_POST['acc_number'])) {
    if (!empty($_POST['recipent_name']) && !empty($_POST['acc_number'])) {
      $add_recipent_query = "INSERT INTO recipent(`name`,`acc_number`) values('".$_POST['recipent_name']."','".$_POST['acc_number']."')";

      $result_add_recipent = $mysqli->query($add_recipent_query) or die("Zapytanie add_recipent_query nie powiodło się");
    
      if (!$result_add_recipent)
        echo json_encode(2); //Zapytanie nie powiodło się

      echo json_encode(3); //Wszystko działa
    } else {
      echo json_encode(1); //Zmienne  puste
    }
  } else {
    echo json_encode(0); //Zmienne nie istnieją
  }

?>