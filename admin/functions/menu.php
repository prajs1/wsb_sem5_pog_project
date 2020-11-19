<?php
  function menu($mysqli)
  {
    $menu = "<div id="menu"><ol id=\"ol\">";

    $query_menu = "SELECT * FROM menu";

    $wynik_menu = $mysqli->query($query_menu) or die("Zapytanie query_menu nie działa");

    if ($wynik_menu->num_rows)
    {
      while ($a = $wynik_menu->fetch_assoc())
      {
        if($a['shows'] == 'y'){
          $menu .= "<li><a href=\"".$a['link']."\">".$a['name']."</a></li>";
        }
      }
    }

    $menu .="</ol></div>";

    return $menu;
  }
?>
