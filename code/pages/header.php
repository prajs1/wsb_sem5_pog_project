<div id="logout_button">
  Witaj <?php echo $_SESSION['username']; ?> | <a href="./index.php?action=logout">Wyloguj</a>
</div>
<?php echo menu($mysqli); ?>
