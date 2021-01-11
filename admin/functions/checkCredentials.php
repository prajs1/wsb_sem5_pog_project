<?php
  function checkCredentials($l,$h,$mysqli)
  {
    $query_login = "SELECT * FROM users WHERE login LIKE '".$l."' && password LIKE '".$h."'";
    $result_login = $mysqli->query($query_login) or die("query_login nie działa");

    if(!$result_login)
      return false;

    if ($result_login->num_rows == 1)
      return true;

    return false;
  }
?>
