<?php
  function checkLimitUsed($mysqli, $user_id, $payment_amount, $payment_private){
    if ($payment_private == 'y') {
      $limit_p_query = "SELECT `personal_limit`, `personal_limit_used` FROM users WHERE id_user='".$_SESSION['logged']['id']."'";
      $limit_p_result = $mysqli->query($limit_p_query) or die("Zapytanie limit_p_query nie działa");

      $num_rows = $limit_p_result->num_rows;
      $r = $limit_p_result->fetch_assoc();

      if ($num_rows == 1) {
        $limit = $r['personal_limit'];
        $limit_used = $r['personal_limit_used'];
      }

      if ($limit >= ($payment_amount + $limit_used) ) {
        return true;
      } else {
        return false;
      }
    } else {
      $limit_h_query = "SELECT `house_limit`, `house_limit_used` FROM users WHERE id_user='".$_SESSION['logged']['id']."'";
      $limit_h_result = $mysqli->query($limit_h_query) or die("Zapytanie limit_h_query nie działa");

      $num_rows = $limit_h_result->num_rows;
      $r = $limit_h_result->fetch_assoc();

      if ($num_rows == 1) {
        $limit = $r['house_limit'];
        $limit_used = $r['house_limit_used'];
      }

      if ($limit >= ($payment_amount + $limit_used) ) {
        return true;
      } else {
        return false;
      }
    }
  }
?>