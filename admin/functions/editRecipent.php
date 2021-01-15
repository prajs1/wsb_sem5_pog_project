<?php
  //Plik wywoływany przez skrypt JavaScript za pomocą jQuery z pliku recipents_list.php
  require_once "dbConnect.php";

  if (isset($_POST['new_recipent_name']) && isset($_POST['new_recipent_acc_number']) && isset($_POST['new_recipent_id'])) {
    if (!empty($_POST['new_recipent_name']) && !empty($_POST['new_recipent_acc_number']) && !empty($_POST['new_recipent_id'])) {
      if ($_POST['new_recipent_acc_number'] != '-1' && strlen($_POST['new_recipent_acc_number']) == 26) {
        $edit_recipent_query = "UPDATE recipent SET name='".$_POST['new_recipent_name']."', acc_number='".$_POST['new_recipent_acc_number']."' WHERE id_recipent='".$_POST['new_recipent_id']."'";
      } elseif ($_POST['new_recipent_acc_number'] != '-1' && strlen($_POST['new_recipent_acc_number']) != 26) {
        echo json_encode(4); //Nieprawidłowy numer bankowy
      } else {
        $edit_recipent_query = "UPDATE recipent SET name='".$_POST['new_recipent_name']."' WHERE id_recipent='".$_POST['new_recipent_id']."'";
      }

      $edit_recipent_result = $mysqli->query($edit_recipent_query) or die("Zapytanie edit_recipent_query nie działa");
    
      if (!$edit_recipent_result)
        echo json_encode(2); //Zapytanie nie powiodło się

      echo json_encode(3); //Wszystko działa
    } else {
      echo json_encode(1); //Zmienne  puste
    }
  } else {
    echo json_encode(0); //Zmienne nie istnieją
  }
?>