<?php
  	$login_frame = '
  	<form method="POST" action="index.php">
  	<fieldset id="log"><legend><b><i>Logowanie</i></b></legend>
  	<b><i>Nazwa użytkownika</i></b> <br><input type="text" name="login"><br>
  	<b><i>Hasło</i></b> <br><input type="password" name="pass"><br>
  	<input type="submit" value="Zaloguj">
  	</fieldset>
  	</form>
  	';

  	if( !empty($_POST["login"]) && !empty($_POST["pass"]))
  	{
  		$login = $_POST['login'];
  		$pass = $_POST['pass'];

  		if(checkCredentials($login, $pass))
  		{
  				$_SESSION['logged'] = checkPermissions($login, $pass);
  				$_SESSION['username'] = $login;

  				echo "<fieldset><legend><b><i>Uwagi</i></b></legend>Zalogowano pomyslnie</fieldset>";
  				#echo "<meta http-equiv=\"refresh\" content=\"1; url='../menu.php'\">";
  		}
  		else
  		{
  			echo $login_frame;
  			echo "<fieldset><legend><b><i>Uwagi</i></b></legend>Podany login lub haslo sa nieprawidlowe</fieldset>";
  		}
  	}
  	else
  	{
  		echo $login_frame;
  		echo "<fieldset><legend><b><i>Uwagi</i></b></legend>Nalezy wypelnic wszystkie pola</fieldset>";
  	}
?>
