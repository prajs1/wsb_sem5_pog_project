<?php
  $recipents = getRecipents($mysqli);

  $name_div = "<div class=\"fieldsets_input_div_parts\">Nazwa:<br>";
  $acc_number_div = "<div class=\"fieldsets_input_div_parts\">Numer konta:<br>";

  foreach ($recipents as $recipent) {
    $name_div .= "<input class=\"input\" id=\"recipent".$recipent['id_recipent']."\" type=\"text\" value=\"".$recipent['name']."\" onclick=\"copy('recipent".$recipent['id_recipent']."')\" readonly><br>";
    $acc_number_div .= "<input class=\"input\" id=\"acc_number".$recipent['id_recipent']."\" type=\"text\" value=\"".$recipent['acc_number']."\" onclick=\"copy('acc_number".$recipent['id_recipent']."')\" readonly><br>";
  }

  //TODO: dokończyć listę odbiorców(dodać opcje edycji dla moderatora i administratora)

  $name_div .= "</div>";
  $acc_number_div .= "</div>";

  $full_list = "<fieldset class=\"fieldsets\"><legend><b><i>Lista odbiorców</i></b></legend>\n" . $name_div . $acc_number_div . "\n</fieldset>";

  echo $full_list;
?>