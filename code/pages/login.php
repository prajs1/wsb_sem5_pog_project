<?php
  $login_frame = '
  	<form method="POST" action="index.php">
  	<fieldset class="fieldsets"><legend><b><i>Logowanie</i></b></legend>
  	<div class="fieldsets_input_div_parts"><b><i>Nazwa użytkownika</i></b> <br><input type="text" name="login" class="input" placeholder="Wprowadź nazwę użytkownika"></div>
  	<div class="fieldsets_input_div_parts"><b><i>Hasło</i></b> <br><input type="password" name="pass" class="input" placeholder="Wprowadź hasło"></div><br>
  	<input type="submit" value="Zaloguj" class="button">
  	</fieldset>
  	</form>
	';

  if( !empty($_POST["login"]) && !empty($_POST["pass"])){
  	$login = $_POST['login'];
  	$pass = $_POST['pass'];

  	if(checkCredentials($login, $pass,$mysqli)){
  			$_SESSION['logged'] = checkPermissions($login, $pass, $mysqli);
  			$_SESSION['username'] = $login;

  			echo "<fieldset class=\"fieldsets\"><legend><b><i>Uwagi</i></b></legend>Zalogowano pomyslnie</fieldset>";
  			echo "<meta http-equiv=\"refresh\" content=\"1; url='./index.php'\">";
  	}else{
  		echo $login_frame;
  		echo "<fieldset class=\"fieldsets\"><legend><b><i>Uwagi</i></b></legend>Podany login lub haslo sa nieprawidlowe</fieldset>";
  	}
  }else{
  	echo $login_frame;
  	echo "<fieldset class=\"fieldsets\"><legend><b><i>Uwagi</i></b></legend>Nalezy wypelnic wszystkie pola</fieldset>";
  }
?>
