<?php
  function getRecipents($mysqli)
  {
    $recipents_query = "SELECT * FROM recipent";
    $recipents_result = $mysqli->query($recipents_query) or die("Zapytanie recipents_query nie działa");

    $recipents = array();

    if ($recipents_result->num_rows) {
      while ($a = $recipents_result->fetch_array(MYSQLI_ASSOC)) {
        $recipents[] = $a;
      }
    }

    return $recipents;
  }
?>