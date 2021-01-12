<?php
  function checkPermissions($l,$h,$mysqli)
  {
    $query_permissions = "SELECT * FROM users WHERE login = '".$l."' && password = '".$h."'";
    $result_permissions = $mysqli->query($query_permissions) or die("query_permissions nie działa");

    if(!$result_permissions)
      return false;

    $num_rows = $result_permissions->num_rows;
    $r = $result_permissions->fetch_assoc();

    if ($num_rows == 1 && $r['role'] == "inmate")
      return array('role' => "Inmate", 'id' => $r['id_user']);
    elseif ($num_rows == 1 && $r['role'] == "moderator")
      return array('role' => "Moderator", 'id' => $r['id_user']);
    elseif ($num_rows == 1 && $r['role'] == "administrator")
      return array('role' => "Administrator", 'id' => $r['id_user']);

    return false;

  }
 ?>
