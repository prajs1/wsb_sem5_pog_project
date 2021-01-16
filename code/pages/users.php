<div class="modal" id="modal_id">
  <div class="modal_content">
    <form method="post">
      <fieldset class="fieldsets">
        <legend><b><i>Zrestartuj hasło użytkownika</i></b></legend>
        <input type="text" name="reset_pass_user_id" id="reset_pass_user_id" readonly>
        <input type="password" class="pass_input input" name="pass1" placeholder="Wprowadź nowe hasło"></br>
        <input type="password" class="pass_input input" name="pass2" placeholder="Wprowadź ponownie hasło">
        </br>
        <input class="button" type="button" value="Zaktualizuj" onclick="updatePassword('user_pass_reset')">
      </fieldset>
    </form>
  </div>
</div>

<?php
  echo listUsers($mysqli);
?>