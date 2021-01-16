<?php
  function listUsers($mysqli){
    $users = getUsers($mysqli);

    $name_div = "<div class=\"fieldsets_input_div_parts\">Imie:<br>";
    $surname_div = "<div class=\"fieldsets_input_div_parts\">Nazwisko:<br>";
    $login_div = "<div class=\"fieldsets_input_div_parts\">Login:<br>";
    $role_div = "<div class=\"fieldsets_input_div_parts\">Rola:<br>";
    $pass_reset_button_div = "<div class=\"fieldsets_input_div_parts\">Restartuj hasło:<br>";
    $delete_button_div = "<div class=\"fieldsets_input_div_parts\">Usuń:<br>";

    foreach ($users as $user) {
      $name_div .= "<input class=\"input user_list_short_input\" id=\"user_name".$user['id_user']."\" type=\"text\" value=\"".$user['name']."\" readonly><br>";
      $surname_div .= "<input class=\"input user_list_short_input\" id=\"user_surname".$user['id_user']."\" type=\"text\" value=\"".$user['surname']."\" readonly><br>";
      $login_div .= "<input class=\"input user_list_short_input\" id=\"user_login".$user['id_user']."\" type=\"text\" value=\"".$user['login']."\" readonly><br>";
      $role_div .= "<input class=\"input user_list_short_input\" id=\"user_role".$user['id_user']."\" type=\"text\" value=\"".$user['role']."\" readonly><br>";
      $pass_reset_button_div .= "<input class=\"button rec_button\" id=\"pass_reset_user".$user['id_user']."\" type=\"button\" value=\"Resetuj\" onclick=\"showModalUser('".$user['login']."')\"><br>";
      $delete_button_div .= "<input class=\"button button rec_button\" id=\"delete_user".$user['id_user']."\" type=\"button\" value=\"Usuń\" onclick=\"deleteUser('user".$user['id_user']."')\"><br>";
    }

    $name_div .= "</div>";
    $surname_div .= "</div>";
    $login_div .= "</div>";
    $role_div .= "</div>";
    $pass_reset_button_div .= "</div>";
    $delete_button_div .= "</div>";
      
    $full_list = "<fieldset class=\"fieldsets\"><legend><b><i>Lista użytkowników</i></b></legend>\n" . $name_div . $surname_div . $login_div . $role_div . $pass_reset_button_div . $delete_button_div . "\n</fieldset>";

    return $full_list;
  }
?>