<?php
  function checkPermissions($l,$h)
  {
    $query_login = "SELECT * FROM users WHERE login = '".$l."' && password = '".$h."'";
    $result_login = mysql_query($query_login) or die("query_login nie działa");

    if(!$wynik)
      return false;

    $liczba_wierszy = mysql_num_rows($wynik);
    $r = mysql_fetch_assoc($wynik);

    if ($liczba_wierszy == 1 && $r['rank'] == 2)
      return true;

    return false;

  }
 ?>
