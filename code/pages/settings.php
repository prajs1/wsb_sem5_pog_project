<?php
  $query_user = "SELECT `name`, `surname`, `login`, `role`, `personal_limit` FROM users WHERE `login` LIKE '" . $_SESSION['username'] . "'";
  $result_user = $mysqli->query($query_user) or die("Zapytanie query_user nie działa");

  if ($result_user->num_rows) {
    while ($a = $result_user->fetch_assoc()) {
      $user_data = array(
        'name' => $a['name'],
        'surname' => $a['surname'],
        'login' => $a['login'],
        'role' => $a['role'],
        'personal_limit' => $a['personal_limit']
      );
    }
  }
?>

<form action="" method="post"><!-- TODO action do pliku aktualizującego dane i hasło użytkownika -->
  <fieldset><legend><b><i>Dane użytkownika</i></b></legend>
    Imie: <input type="text" value="<?php echo $user_data['name']; ?>" readonly /> </br>
    Nazwisko: <input type="text" value="<?php echo $user_data['surname']; ?>" readonly /> </br>
    Login: <input type="text" value="<?php echo $user_data['login']; ?>" readonly /> </br>
    Rola: <input type="text" value="<?php echo $user_data['role']; ?>" readonly /> 
  </fieldset>
  </br>

  <fieldset><legend><b><i>Limit wydatków osobistych</i></b></legend>
    <input type="text" id="personal_limit_input" value="<?php echo ($user_data['personal_limit'] != -1) ? $user_data['personal_limit'] : "Brak";?>" name="personal_limit" /> Dla braku limitu ustaw '-1' 
    </br>
    <input type="button" value="Zaktualizuj" onclick="updatePersonalLimit('<?php echo $_SESSION['username'];?>')">
  </fieldset>
  </br>

  <fieldset><legend><b><i>Zmiana hasła</i></b></legend>
    <input type="password" class="pass_input" name="pass1" placeholder="Podaj hasło"></br>
    <input type="password" class="pass_input" name="pass2" placeholder="Podaj ponownie hasło">
    </br>
    <input type="button" value="Zaktualizuj" onclick="updatePassword('<?php echo $_SESSION['username'];?>')">
  </fieldset>
</form>