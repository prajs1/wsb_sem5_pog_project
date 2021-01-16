<?php
  $payments = getPayments($mysqli,$_SESSION['logged']['id']);
  $users = getUsers($mysqli);
  $recipents = getRecipents($mysqli);

  $user_login_div = "<div class=\"fieldsets_input_div_parts\">Dodał:<br>";
  $recipent_div = "<div class=\"fieldsets_input_div_parts\">Odbiorca:<br>";
  $amount_div = "<div class=\"fieldsets_input_div_parts\">Kwota:<br>";
  $date_div = "<div class=\"fieldsets_input_div_parts\">Data:<br>";
  $category_div = "<div class=\"fieldsets_input_div_parts\">Kategoria:<br>";

  foreach ($payments as $payment) {
    foreach ($users as $user) {
      if ($user['id_user'] == $payment['id_user']) {
        $payment_user = $user['login'];
        break;
      }
    }
    $user_login_div .= "<input class=\"input user_list_short_input\" id=\"payment".$payment['id_transaction']."\" type=\"text\" value=\"".$payment_user."\" readonly><br>";
    foreach ($recipents as $recipent) {
      if ($recipent['id_recipent'] == $payment['id_recipent']) {
        $payment_recipent = $recipent['name'];
        break;
      }
    }
    $recipent_div .= "<input class=\"input user_list_short_input\" id=\"payment".$payment['id_transaction']."\" type=\"text\" value=\"".$payment_recipent."\" readonly><br>";
    $amount_div .= "<input class=\"input user_list_short_input\" id=\"payment".$payment['id_transaction']."\" type=\"text\" value=\"".$payment['amount']."\" readonly><br>";
    $date_div .= "<input class=\"input user_list_short_input\" id=\"payment".$payment['id_transaction']."\" type=\"text\" value=\"".$payment['transfer_date']."\" readonly><br>";
    $category_div .= "<input class=\"input user_list_short_input\" id=\"payment".$payment['id_transaction']."\" type=\"text\" value=\"".$payment['category']."\" readonly><br>";
  }

  $user_login_div .= "</div>";
  $recipent_div .= "</div>";
  $amount_div .= "</div>";
  $date_div .= "</div>";
  $category_div .= "</div>";
      
  $full_list = "<fieldset class=\"fieldsets\"><legend><b><i>Historia płatności</i></b></legend>\n" . $user_login_div . $recipent_div . $amount_div . $date_div . $category_div . "\n</fieldset>";

  echo $full_list;
?>