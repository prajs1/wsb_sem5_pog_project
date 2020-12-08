<?php
  	$login_frame = '
  	<form method="POST">
  	<fieldset id="log"><legend><b><i>Logowanie</i></b></legend>
  	<b><i>Nazwa użytkownika</i></b> <br><input type="text" id="pole" name="login"><br>
  	<b><i>Hasło</i></b> <br><input type="password" id="pole" name="pass"><br>
  	<input type="submit" id="button" value="Zaloguj">
  	</fieldset>
  	</form>
  	';

  	if( !empty($_POST["login"]))
  	{
  		$login = $_POST['login'];
  		$haslo = $_POST['pass'];

  		if(checkCredentials($login, $haslo))
  		{
  				if(checkPermissions($login, $haslo))
  				{
  					$_SESSION['zalogowany'] = 2;
  					$_SESSION['log'] = $login;
  				}
  				else
  				{
  					$_SESSION['zalogowany'] = 1;
  					$_SESSION['log'] = $login;
  				}

  				echo "<fieldset id=\"l\"><legend><b><i>Uwagi</i></b></legend>Zalogowano pomyslnie</fieldset>";
  				#echo "<meta http-equiv=\"refresh\" content=\"1; url='../menu.php'\">";
  		}
  		else
  		{
  			echo $login_frame;
  			echo "<fieldset id=\"l\"><legend><b><i>Uwagi</i></b></legend>Podany login lub haslo sa nieprawidlowe</fieldset>";
  		}
  	}
  	else
  	{
  		echo $login_frame;
  		echo "<fieldset id=\"l\"><legend><b><i>Uwagi</i></b></legend>Nalezy wypelnic wszystkie pola</fieldset>";
  	}
?>
