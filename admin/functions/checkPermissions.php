<?php
  function checkPermissions($l,$h)
  {
    $query_permissions = "SELECT * FROM users WHERE login = '".$l."' && password = '".$h."'";
    $result_permissions = mysql_query($query_permissions) or die("query_permissions nie działa");

    if(!$result_permissions)
      return false;

    $num_rows = mysql_num_rows($result_permissions);
    $r = mysql_fetch_assoc($result_permissions);

    if ($num_rows == 1 && $r['role'] == "Domownik")
      return "Domownik";
    elseif ($num_rows == 1 && $r['role'] == "Moderator")
      return "Moderator";
    elseif ($num_rows == 1 && $r['role'] == "Administrator")
      return "Administrator";

    return false;

  }
 ?>
