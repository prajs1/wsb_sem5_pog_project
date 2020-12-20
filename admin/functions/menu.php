<?php
  function menu($mysqli)
  {
    $menu = "<div id=\"menu\"><ol id=\"ol\">";

    $query_menu = "SELECT * FROM menu WHERE active LIKE 'y'";
    $result_menu = $mysqli->query($query_menu) or die("Zapytanie query_menu nie działa");

    if ($result_menu->num_rows) {
      while ($a = $result_menu->fetch_assoc()) {
        if ($a['link'] != NULL)
          $menu .= "<li><a href=\"?page=".$a['link']."\">".$a['name']."</a></li>";
        else {
          $query_submenu = "SELECT * FROM submenu WHERE active LIKE 'y' AND id_menu='" . $a['id_menu'] . "'";
          $result_submenu = $mysqli->query($query_submenu) or die("Zapytanie query_submenu nie działa");
          
          $menu .= "<li>".$a['name'];

          if ($result_submenu->num_rows) {
            while ($b = $result_submenu->fetch_assoc())
              $menu .= "<ul><a href=\"?page=".$b['link']."\">".$b['name']."</a></ul>";
          }

          $menu .= "</li>";
        }
      }
    }

    $menu .="</ol></div>";

    return $menu;
  }
?>
