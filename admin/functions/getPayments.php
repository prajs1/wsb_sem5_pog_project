<?php
  function getPayments($mysqli,$user_id)
  {
    $payments_query = "SELECT * FROM transactions WHERE `private` like 'n' or `id_user`='".$user_id."' ORDER BY transfer_date DESC";
    $payments_result = $mysqli->query($payments_query) or die("Zapytanie payments_query nie działa");

    $payments = array();

    if ($payments_result->num_rows) {
      while ($a = $payments_result->fetch_array(MYSQLI_ASSOC)) {
        $payments[] = $a;
      }
    }

    return $payments;
  }
?>