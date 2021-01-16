<?php
  function getUsers($mysqli)
  {
    $users_query = "SELECT * FROM users";
    $users_result = $mysqli->query($users_query) or die("Zapytanie users_query nie działa");

    $users = array();

    if ($users_result->num_rows) {
      while ($a = $users_result->fetch_array(MYSQLI_ASSOC)) {
        $users[] = $a;
      }
    }

    return $users;
  }
?>