<?php
  include_once './admin/classes/Template.php';
  include_once './admin/classes/pageTemplate.php';
  include_once './admin/functions/menu.php';

  $mysqli = new mysqli("localhost", "studia_user", "\$tud1@", "studia");
  if ($mysqli->connect_errno) {
     echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }

  $html = new Template("./code/html.php");

  $html->Set("head","<title>Budżet domowy</title><meta charset=\"UTF-8\"/><meta name=\"description\" content=\"Domowy budzet\"><meta name=\"keywords\" content=\"HTML,CSS,JavaScript,PHP,MySQL\"><meta name=\"author\" content=\"Robert Prajs, Mateusz Przybylski, Przemysaw Przybyła\"><link rel=\"stylesheet\" type=\"text/css\" href=\"./css/main.css?\">");

  $body = new Template("./code/body.php");

  $body->Set("header", menu($mysqli));

  $body->Set("footer", "<h5 id=\"footer2\">Image by <a href=\"https://pixabay.com/users/olichel-529835/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=912719\">Olya Adamovich</a> from <a href=\"https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=912719\">Pixabay</a></h5><h5 id=\"footer1\">Created by Robert Prajs, Przemysław Przybyła, Mateusz Przybylski</h5>");

  $html->Set("body", $body->ToString());

  echo $html->ToString();
?>
