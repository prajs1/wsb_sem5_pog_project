<?php
    $mysqli = new mysqli("localhost", "studia_user", "\$tud1@", "studia");
    if ($mysqli->connect_errno) {
       echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
?>