<?php
  function menu($mysqli)
  {
    $menu = "<div id=\"menu\"><ol id=\"ol\">";

    $query_menu = "SELECT * FROM menu";

    $result_menu = $mysqli->query($query_menu) or die("Zapytanie query_menu nie działa");

    if ($result_menu->num_rows)
    {
      while ($a = $result_menu->fetch_assoc())
      {
        if($a['active'] == 'y'){
          $menu .= "<li><a href=\"page=".$a['link']."\">".$a['name']."</a></li>";
        }
      }
    }

    $menu .="</ol></div>";

    return $menu;
  }
?>
