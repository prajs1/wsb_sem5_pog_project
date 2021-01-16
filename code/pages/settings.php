<?php
  $query_user = "SELECT `name`, `surname`, `login`, `role`, `personal_limit`, `house_limit`, `personal_limit_used`, `house_limit_used` FROM users WHERE `login` LIKE '" . $_SESSION['username'] . "'";
  $result_user = $mysqli->query($query_user) or die("Zapytanie query_user nie działa");

  if ($result_user->num_rows) {
    while ($a = $result_user->fetch_assoc()) {
      $user_data = array(
        'name' => $a['name'],
        'surname' => $a['surname'],
        'login' => $a['login'],
        'role' => $a['role'],
        'personal_limit' => $a['personal_limit'],
        'house_limit' => $a['house_limit'],
        'personal_limit_used' => $a['personal_limit_used'],
        'house_limit_used' => $a['house_limit_used']
      );
    }
  }
?>

  <fieldset class="fieldsets"><legend><b><i>Dane użytkownika</i></b></legend>
    <div class="fieldsets_input_div_parts">Imie: <br><input class="input" type="text" value="<?php echo $user_data['name']; ?>" readonly /> </div>
    <div class="fieldsets_input_div_parts">Nazwisko: <br><input class="input" type="text" value="<?php echo $user_data['surname']; ?>" readonly /> </div></br>
    <div class="fieldsets_input_div_parts">Login: <br><input class="input" type="text" value="<?php echo $user_data['login']; ?>" readonly /> </div>
    <div class="fieldsets_input_div_parts">Rola: <br><input class="input" type="text" value="<?php echo $user_data['role']; ?>" readonly /> </div>
  </fieldset>
  </br>

  
  <fieldset class="fieldsets"><legend><b><i>Limit wydatków Domu</i></b></legend>
    <?php 
      if ($_SESSION['logged']['role'] == "Moderator" || $_SESSION['logged']['role'] == "Administrator") {
        $limit = ($user_data['house_limit'] != -1) ? $user_data['house_limit'] : "Brak";
        echo "<input type=\"text\" class=\"input\" id=\"house_limit_input\" value=\"".$limit."\" name=\"house_limit\"/> <br> Dla braku limitu ustaw '-1' 
        </br>
        <input class=\"button\" type=\"button\" value=\"Zaktualizuj\" onclick=\"updateHouseLimit()\">";
      } else {
        $limit = ($user_data['house_limit'] != -1) ? $user_data['house_limit'] : "Brak";
        echo "<input type=\"text\" class=\"input\" id=\"house_limit_input\" value=\"".$limit."\" name=\"house_limit\" readonly/> <br>";
      }
    ?>
  </fieldset>
  </br>

  <fieldset class="fieldsets"><legend><b><i>Wykorzystany limit wydatków domu</i></b></legend>
      <?php 
        if ($_SESSION['logged']['role'] == "Moderator" || $_SESSION['logged']['role'] == "Administrator") {
          echo "<input type=\"text\" class=\"input\" id=\"house_limit_used_input\" value=\"".$user_data['house_limit_used']."\" name=\"house_limit_used_input\" />
          </br>
          <input class=\"button\" type=\"button\" value=\"Wyzeruj\" onclick=\"clearHouseLimit('".$_SESSION['username']."')\">";
        } else {
          echo "<input type=\"text\" class=\"input\" id=\"house_limit_used_input\" value=\"".$user_data['house_limit_used']."\" name=\"house_limit_used_input\" /> <br>";
        }
      ?>
    </fieldset>
    </br>

  <form method="post">
    <fieldset class="fieldsets"><legend><b><i>Limit wydatków osobistych</i></b></legend>
      <input type="text" class="input" id="personal_limit_input" value="<?php echo ($user_data['personal_limit'] != -1) ? $user_data['personal_limit'] : "Brak";?>" name="personal_limit" /> <br> Dla braku limitu ustaw '-1' 
      </br>
      <input class="button" type="button" value="Zaktualizuj" onclick="updatePersonalLimit('<?php echo $_SESSION['username'];?>')">
    </fieldset>
    </br>

    <fieldset class="fieldsets"><legend><b><i>Wykorzystany limit wydatków osobistych</i></b></legend>
      <input type="text" class="input" id="personal_limit_used_input" value="<?php echo $user_data['personal_limit_used'];?>" name="personal_limit_used_input" />
      </br>
      <input class="button" type="button" value="Wyzeruj" onclick="clearPersonalLimit('<?php echo $_SESSION['username'];?>')">
    </fieldset>
    </br>

    <fieldset class="fieldsets"><legend><b><i>Zmiana hasła</i></b></legend>
      <!-- TODO ustawić pattern na input hasła dla większego bezpieczeństwa -->
      <input type="password" class="pass_input input" name="pass1" placeholder="Wprowadź nowe hasło"></br>
      <input type="password" class="pass_input input" name="pass2" placeholder="Wprowadź ponownie hasło">
      </br>
      <input class="button" type="button" value="Zaktualizuj" onclick="updatePassword('<?php echo $_SESSION['username'];?>')">
    </fieldset>
  </form> 