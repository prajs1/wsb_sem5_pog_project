<?php
  function checkPermissions($l,$h,$mysqli)
  {
    $query_permissions = "SELECT * FROM users WHERE login = '".$l."' && password = '".$h."'";
    $result_permissions = $mysqli->query($query_permissions) or die("query_permissions nie działa");

    if(!$result_permissions)
      return false;

    $num_rows = $result_permissions->num_rows;
    $r = $result_permissions->fetch_assoc();

    if ($num_rows == 1 && $r['role'] == "Domownik")
      return "Domownik";
    elseif ($num_rows == 1 && $r['role'] == "Moderator")
      return "Moderator";
    elseif ($num_rows == 1 && $r['role'] == "Administrator")
      return "Administrator";

    return false;

  }
 ?>
