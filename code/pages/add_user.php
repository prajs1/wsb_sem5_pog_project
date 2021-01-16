<form method="post">
  <fieldset class="fieldsets"><legend><b><i>Dodaj odbiorcę</i></b></legend>
    Imie: <br>
    <input type="text" name="user_name_input" class="input" id="user_name_input" placeholder="Wprowadź imię użytkownika">
    <br>
    Nazwisko: <br>
    <input type="text" name="user_surname_input" class="input" id="user_surname_input" placeholder="Wprowadź nazwisko użytkownika">
    <br>
    Login: <br>
    <input type="text" name="user_login_input" class="input" id="user_login_input" placeholder="Wprowadź login użytkownika">
    <br>
    Hasło: <br>
    <!-- TODO ustawić pattern na input hasła dla większego bezpieczeństwa -->
    <input type="password" class="pass_input input" name="pass1" placeholder="Wprowadź nowe hasło"></br>
    <input type="password" class="pass_input input" name="pass2" placeholder="Wprowadź ponownie hasło">
    <br>
    Rola: <br>
    <select name="user_role_select" class="input_select" id="user_role_select">
      <option class="input_select_option" value="inmate">Domownik</option>
      <option class="input_select_option" value="moderator">Moderator</option>
      <option class="input_select_option" value="administrator">Administrator</option>
    </select>
    <br>
    <br>
    <input type="submit" value="Dodaj" class="button" onclick="addUser()">
  </fieldset>
</form>