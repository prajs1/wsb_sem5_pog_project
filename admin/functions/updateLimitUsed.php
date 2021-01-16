<?php
  //Plik wywoływany przez skrypt JavaScript za pomocą jQuery z pliku main.js z funkcji addPayment
  session_start();
  require_once "dbConnect.php";

  if (isset($_POST['payment_amount']) && isset($_POST['payment_private'])) {
    if (!empty($_POST['payment_amount']) && !empty($_POST['payment_private'])) {

      if ($_POST['payment_private'] == 'y') {
        $old_limit_u_p_query = "SELECT `personal_limit_used` FROM users WHERE id_user='".$_SESSION['logged']['id']."'";
        $old_limit_u_p_result = $mysqli->query($old_limit_u_p_query) or die("Zapytanie old_limit_u_p_query nie działa");

        if(!$old_limit_u_p_result)
          echo json_encode(2); //Zapytanie nie powiodło się

        $num_rows = $old_limit_u_p_result->num_rows;
        $r = $old_limit_u_p_result->fetch_assoc();

        if ($num_rows == 1)
          $old_limit_used = $r['personal_limit_used'];

        $new_limit_used = $old_limit_used + $_POST['payment_amount'];

        $update_limit_p_used_query = "UPDATE users SET personal_limit_used='".$new_limit_used."' WHERE id_user='".$_SESSION['logged']['id']."'";
        $update_limit_p_used_result = $mysqli->query($update_limit_p_used_query) or die("Zapytanie update_limit_p_used_query nie działa");

        if (!$update_limit_p_used_result)
          echo json_encode(2); //Zapytanie nie powiodło się
      } else {
        $old_limit_u_h_query = "SELECT `house_limit_used` FROM users WHERE id_user='".$_SESSION['logged']['id']."'";
        $old_limit_u_h_result = $mysqli->query($old_limit_u_h_query) or die("Zapytanie old_limit_u_h_query nie działa");

        if(!$old_limit_u_h_result)
          echo json_encode(2); //Zapytanie nie powiodło się

        $num_rows = $old_limit_u_h_result->num_rows;
        $r = $old_limit_u_h_result->fetch_assoc();

        if ($num_rows == 1)
          $old_limit_used = $r['house_limit_used'];

        $new_limit_used = $old_limit_used + $_POST['payment_amount'];

        $update_limit_h_used_query = "UPDATE users SET house_limit_used='".$new_limit_used."'";
        $update_limit_h_used_result = $mysqli->query($update_limit_h_used_query) or die("Zapytanie update_limit_h_used_query nie działa");

        if (!$update_limit_h_used_result)
          echo json_encode(2); //Zapytanie nie powiodło się
      }

      echo json_encode(3); //Wszystko działa
    } else {
      echo json_encode(1); //Zmienne username i personal_limit puste
    }
  } else {
    echo json_encode(0); //Zmienne username i personal_limit nie istnieją
  }
  
?>