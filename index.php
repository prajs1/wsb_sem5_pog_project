<?php
  session_start();

  #Classes
  require_once './admin/classes/Template.php';
  require_once './admin/classes/pageTemplate.php';

  #Functions
  require_once './admin/functions/menu.php';
  require_once './admin/functions/checkCredentials.php';
  require_once './admin/functions/checkPermissions.php';

  $mysqli = new mysqli("localhost", "studia_user", "\$tud1@", "studia");
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }

  $html = new Template("./code/html.php");

  $html->Set("head","<title>Budżet domowy</title><meta charset=\"UTF-8\"/><meta name=\"description\" content=\"Domowy budzet\"><meta name=\"keywords\" content=\"HTML,CSS,JavaScript,PHP,MySQL\"><meta name=\"author\" content=\"Robert Prajs, Mateusz Przybylski, Przemysaw Przybyła\"><link id=\"size-stylesheet\" rel=\"stylesheet\" type=\"text/css\" href=\"./css/main.css?\"><script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script><script src=\"./admin/scripts/main.js\"></script>");

  $body = new Template("./code/body.php");
  if(isset($_SESSION['logged']) && isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset();
    echo "<meta http-equiv=\"refresh\" content=\"1; url='./index.php'\">";
  } elseif(isset($_SESSION['logged']) && !isset($_GET['action'])) {
    $body->Set("header", menu($mysqli));

    $body->Set("content", "Witaj ".$_SESSION['username']." | <a href=\"./index.php?action=logout\">Wyloguj</a>");
  } elseif (!isset($_SESSION['logged'])) {
    $login = new pageTemplate('login');
    $body->Set("content", $login->ToString(array('mysqli' => $mysqli)));
  }


  $body->Set("footer", "<h5 id=\"footer2\">Image by <a href=\"https://pixabay.com/users/olichel-529835/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=912719\">Olya Adamovich</a> from <a href=\"https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=912719\">Pixabay</a></h5><h5 id=\"footer1\">Created by Robert Prajs, Przemysław Przybyła, Mateusz Przybylski</h5>");

  $html->Set("body", $body->ToString());

  echo $html->ToString();
?>
