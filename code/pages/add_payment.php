<!-- TODO postrona z dodawaniem płatności -->
<form method="POST">
  <fieldset class="fieldsets"><legend><b><i>Dodaj płatność</i></b></legend>
    <select name="add_payment_recipents_select" id="add_payment_recipents_select">
      <?php
        $recipents = getRecipents($mysqli);

        foreach ($recipents as $recipent) {
          echo "<option value=\"recipent" . $recipent['id_recipent'] . "\">" . $recipent['name'] . "</option>";
        }
      ?>
    </select><br>
    <input type="checkbox" name="add_payment_recipents_checkbox" id="add_payment_recipents_checkbox"> Przelew stały <br>
    Kwota przelewu: <input type="number" name="add_payment_recipents_amount" id="add_payment_recipents_amount" min="0">
    <input type="button" value="Prześlij" class="button" onclick="">
  </fieldset>
</form>