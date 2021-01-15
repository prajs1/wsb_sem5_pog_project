<?php
  function listRecipent($mysqli){
    $recipents = getRecipents($mysqli);

    $name_div = "<div class=\"fieldsets_input_div_parts\">Nazwa:<br>";
    $acc_number_div = "<div class=\"fieldsets_input_div_parts\">Numer konta:<br>";

    if ($_SESSION['logged']['role'] == "Moderator" || $_SESSION['logged']['role'] == "Administrator") {
      $edit_button_div = "<div class=\"fieldsets_input_div_parts\">Edytuj:<br>";
      $delete_button_div = "<div class=\"fieldsets_input_div_parts\">Usuń:<br>";

      foreach ($recipents as $recipent) {
        $name_div .= "<input class=\"input\" id=\"recipent".$recipent['id_recipent']."\" type=\"text\" value=\"".$recipent['name']."\" onclick=\"copy('recipent".$recipent['id_recipent']."')\" readonly><br>";
        if ($recipent['acc_number'] == NULL) {
          $acc_number_div .= "<input class=\"input\" id=\"acc_number".$recipent['id_recipent']."\" type=\"text\" value=\"Brak\" onclick=\"copy('acc_number".$recipent['id_recipent']."')\" readonly><br>";
        } else {
          $acc_number_div .= "<input class=\"input\" id=\"acc_number".$recipent['id_recipent']."\" type=\"text\" value=\"".$recipent['acc_number']."\" onclick=\"copy('acc_number".$recipent['id_recipent']."')\" readonly><br>";
        }
        $edit_button_div .= "<input class=\"button rec_button\" id=\"edit_recipent".$recipent['id_recipent']."\" type=\"button\" value=\"Edytuj\" onclick=\"showModal('recipent".$recipent['id_recipent']."','acc_number".$recipent['id_recipent']."')\"><br>";
        $delete_button_div .= "<input class=\"button button rec_button\" id=\"delete_recipent".$recipent['id_recipent']."\" type=\"button\" value=\"Usuń\" onclick=\"deleteRecipent('recipent".$recipent['id_recipent']."')\"><br>";
      }

      $name_div .= "</div>";
      $acc_number_div .= "</div>";
      $edit_button_div .= "</div>";
      $delete_button_div .= "</div>";
      
      $full_list = "<fieldset class=\"fieldsets\"><legend><b><i>Lista odbiorców</i></b></legend>\n" . $name_div . $acc_number_div . $edit_button_div . $delete_button_div . "\n</fieldset>";
    } else {
      foreach ($recipents as $recipent) {
        $name_div .= "<input class=\"input\" id=\"recipent".$recipent['id_recipent']."\" type=\"text\" value=\"".$recipent['name']."\" onclick=\"copy('recipent".$recipent['id_recipent']."')\" readonly><br>";
        if ($recipent['acc_number'] == NULL) {
          $acc_number_div .= "<input class=\"input\" id=\"acc_number".$recipent['id_recipent']."\" type=\"text\" value=\"Brak\" onclick=\"copy('acc_number".$recipent['id_recipent']."')\" readonly><br>";
        } else {
          $acc_number_div .= "<input class=\"input\" id=\"acc_number".$recipent['id_recipent']."\" type=\"text\" value=\"".$recipent['acc_number']."\" onclick=\"copy('acc_number".$recipent['id_recipent']."')\" readonly><br>";
        }
      }

      $name_div .= "</div>";
      $acc_number_div .= "</div>";

      $full_list = "<fieldset class=\"fieldsets\"><legend><b><i>Lista odbiorców</i></b></legend>\n" . $name_div . $acc_number_div . "\n</fieldset>";
    }

    return $full_list;
  }
?>