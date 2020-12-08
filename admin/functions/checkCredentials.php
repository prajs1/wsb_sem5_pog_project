<?php
  function checkCredentials($l,$h)
  {
    $query_login = "SELECT * FROM users WHERE login LIKE '".$l."' && password LIKE '".$h."'";
    $result_login = mysql_query($query_login) or die("query_login nie działa");

    if(!$result_login)
      return false;

    $num_rows = mysql_num_rows($wynik);

    if ($num_rows == 1)
      return true;

    return false;
  }
?>
