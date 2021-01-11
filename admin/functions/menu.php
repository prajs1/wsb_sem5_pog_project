<?php
  function menu($mysqli)
  {
    $menu = "<nav><div class=\"container\"><ul class=\"menu\">";

    $query_menu = "SELECT * FROM menu WHERE active LIKE 'y'";
    $result_menu = $mysqli->query($query_menu) or die("Zapytanie query_menu nie działa");

    if ($result_menu->num_rows) {
      while ($a = $result_menu->fetch_assoc()) {
        if ($a['link'] != NULL)
          $menu .= "<li><a href=\"?page=".$a['link']."\">".$a['name']."</a></li>";
        else {
          $query_submenu = "SELECT * FROM submenu WHERE active LIKE 'y' AND id_menu='" . $a['id_menu'] . "'";
          $result_submenu = $mysqli->query($query_submenu) or die("Zapytanie query_submenu nie działa");
          
          $menu .= "<li><a>".$a['name']."</a><ul>";

          if ($result_submenu->num_rows) {
            while ($b = $result_submenu->fetch_assoc())
              $menu .= "<li><a href=\"?page=".$b['link']."\">".$b['name']."</a></li>";
          }

          $menu .= "</ul></li>";
        }
      }
    }

    $menu .="</ul></div></nav>";
    return $menu;
  }
?>
