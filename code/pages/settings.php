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
  Imie: <input type="text" value="<?php echo $user_data['name']; ?>" readonly /> </br>
  Nazwisko: <input type="text" value="<?php echo $user_data['surname']; ?>" readonly /> </br>
  Login: <input type="text" value="<?php echo $user_data['login']; ?>" readonly /> </br>
  Rola: <input type="text" value="<?php echo $user_data['role']; ?>" readonly /> </br>
  Limit wydatków: <input type="text" value="<?php echo ($user_data['personal_limit'] != -1) ? $user_data['personal_limit'] : "Brak"; ?>" readonly />
</form>