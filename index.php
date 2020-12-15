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

  $head = new pageTemplate('head');
  $html->Set("head", $head->ToString());

  $body = new Template("./code/body.php");
  if(isset($_SESSION['logged']) && isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset();
    echo "<meta http-equiv=\"refresh\" content=\"1; url='./index.php'\">";
  } elseif(isset($_SESSION['logged']) && !isset($_GET['action'])) {
    $header = new pageTemplate('header');
    $body->Set("header", $header->ToString(array('mysqli' => $mysqli)));

    if (isset($_GET['page'])) {
      if ($_GET['page'] == "settings") {
        // code...
      } elseif ($_GET['page'] == "add_payment") {
        // code...
      } elseif ($_GET['page'] == "reports") {
        // code...
      } elseif ($_GET['page'] == "payment_history") {
        // code...
      }
    }
  } elseif (!isset($_SESSION['logged'])) {
    $login = new pageTemplate('login');
    $body->Set("content", $login->ToString(array('mysqli' => $mysqli)));
  }

  $footer = new pageTemplate('footer');
  $body->Set("footer", $footer->ToString());

  $html->Set("body", $body->ToString());

  echo $html->ToString();
?>
