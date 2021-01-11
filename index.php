<?php
  session_start();

  #Classes
  require_once './admin/classes/Template.php';
  require_once './admin/classes/pageTemplate.php';

  #Functions
  require_once './admin/functions/menu.php';
  require_once './admin/functions/checkCredentials.php';
  require_once './admin/functions/checkPermissions.php';
  require_once './admin/functions/listRecipent.php';
  require_once './admin/functions/getRecipents.php';
  require_once './admin/functions/dbConnect.php';

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
        $settings = new pageTemplate('settings');
        $body->Set("content", $settings->ToString(array('mysqli' => $mysqli)));
      } elseif ($_GET['page'] == "add_payment") {
        $add_payment = new pageTemplate('add_payment');
        $body->Set("content", $add_payment->ToString(array('mysqli' => $mysqli)));
      } elseif ($_GET['page'] == "reports") {
        // code...
      } elseif ($_GET['page'] == "add_recipent") {
        $add_recipent = new pageTemplate('add_recipent');
        $body->Set("content", $add_recipent->ToString());
      } elseif ($_GET['page'] == "recipents_list") {
        $recipents_list = new pageTemplate('recipents_list');
        $body->Set("content", $recipents_list->ToString(array('mysqli' => $mysqli)));
      }
    }
    else {
      $settings = new pageTemplate('settings');
      $body->Set("content", $settings->ToString(array('mysqli' => $mysqli)));
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
