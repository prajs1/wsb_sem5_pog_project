<?php
  // Plik wywoływany przez skrypt JavaScript za pomocą jQuery z pliku recipent_list.php]
  require_once "dbConnect.php";
  
  if (isset($_POST['recipent_id'])) {
    if (!empty($_POST['recipent_id'])) {
      $delete_recipent_query = "DELETE FROM recipent WHERE id_recipent LIKE '".$_POST['recipent_id']."'";

      $result_delete_recipent = $mysqli->query($delete_recipent_query) or die("Zapytanie delete_recipent_query nie powiodło się");
    
      if (!$result_delete_recipent)
        echo json_encode(2); //Zapytanie nie powiodło się

      echo json_encode(3); //Wszystko działa
    } else {
      echo json_encode(1); //Zmienne  puste
    }
  } else {
    echo json_encode(0); //Zmienne nie istnieją
  }

?>