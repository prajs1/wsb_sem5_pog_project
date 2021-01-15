<?php
  //TODO dodać komunikaty przy przekroczeniu limitu
  //Plik wywoływany przez skrypt JavaScript za pomocą jQuery z pliku add_payment.php
  session_start();
  require_once "dbConnect.php";

  if (isset($_POST['payment_recipent_id']) && isset($_POST['payment_category']) && isset($_POST['payment_amount']) && isset($_POST['payment_private']) && isset($_POST['payment_date']) && isset($_POST['payment_perm_date'])) {

    if (!empty($_POST['payment_recipent_id']) && !empty($_POST['payment_category']) && !empty($_POST['payment_amount']) && !empty($_POST['payment_private']) && !empty($_POST['payment_date']) && !empty($_POST['payment_perm_date'])) {

      if ($_POST['payment_perm_date'] == 'n') {
        $add_payment_query = "INSERT INTO transactions(`id_user`,`id_recipent`,`perm_transaction`,`amount`,`transfer_date`,`private`,`category`) values('".$_SESSION['logged']['id']."','".$_POST['payment_recipent_id']."','n','".$_POST['payment_amount']."','".$_POST['payment_date']."','".$_POST['payment_private']."','".$_POST['payment_category']."')";

        $add_payment_result = $mysqli->query($add_payment_query) or die("Zapytanie add_payment_query nie działa");

        if (!$add_payment_result)
          echo json_encode(2); //Zapytanie nie powiodło się
      } else {
        $add_payment_query = "INSERT INTO transactions(`id_user`,`id_recipent`,`perm_transaction`,`amount`,`transfer_date`,`private`,`category`) values('".$_SESSION['logged']['id']."','".$_POST['payment_recipent_id']."','y','".$_POST['payment_amount']."','".$_POST['payment_date']."','".$_POST['payment_private']."','".$_POST['payment_category']."')";

        $add_payment_result = $mysqli->query($add_payment_query) or die("Zapytanie add_payment_query nie działa");

        $add_perm_payment_query = "INSERT INTO perm_transactions(`id_user`,`id_recipent`,`amount`,`when_to_transfer_date`,`private`,`category`) values('".$_SESSION['logged']['id']."','".$_POST['payment_recipent_id']."','".$_POST['payment_amount']."','".$_POST['payment_perm_date']."','".$_POST['payment_private']."','".$_POST['payment_category']."')";

        $add_perm_payment_result = $mysqli->query($add_perm_payment_query) or die("Zapytanie add_perm_payment_query nie działa");

        if (!$add_perm_payment_result || $add_payment_result)
          echo json_encode(2); //Zapytanie nie powiodło się
      }

      echo json_encode(3); //Wszystko działa
    } else {
      echo json_encode(1); //Zmienne  puste
    }
  } else {
    echo json_encode(0); //Zmienne nie istnieją
  }
?>