<form method="post">
  <fieldset class="fieldsets"><legend><b><i>Dodaj odbiorcę</i></b></legend>
    <div class="fieldsets_input_div_parts">
      Nazwa: <br>
      <input type="text" name="name" class="input" id="recipent_name_input" placeholder="Wprowadź nazwę odbiorcy">
    </div>
    <div class="fieldsets_input_div_parts">
      <!-- TODO poprawić pattern na numer konta bankowego-->
      Numer bankowy: <br>
      <input type="text" name="acc_number" class="input" id="acc_number_input" pattern="(\d*).{26,}" maxlength="26" placeholder="Wprowadź numer konta odbiorcy">
    </div><br>
    <input type="submit" value="Dodaj" class="button" onclick="addRecipent()">
  </fieldset>
</form>