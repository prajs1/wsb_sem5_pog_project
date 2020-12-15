<?php
  $query_user = "SELECT `name`, `surname`, `login`, `role`, `personal_limit` FROM users where `login` LIKE " . $_SESSION['login'];
  $result_user = $mysqli->query($query_user) or die("Zapytanie query_user nie działa");
?>
<form action="" method="post"><!-- TODO action do pliku aktualizującego dane i hasło użytkownika -->
  Imie:
  Nazwisko:
  Login:
  Rola:
  Limit wydatków:
</form>