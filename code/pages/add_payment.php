<!-- TODO dokończyć postrone z dodawaniem płatności -->
<form method="POST">
  <fieldset class="fieldsets"><legend><b><i>Dodaj płatność</i></b></legend>
    Odbiorca: <br>
    <select name="add_payment_recipents_select" class="input_select" id="add_payment_recipents_select">
      <?php
        $recipents = getRecipents($mysqli);

        foreach ($recipents as $recipent) {
          echo "<option class=\"input_select_option\" value=\"recipent" . $recipent['id_recipent'] . "\">" . $recipent['name'] . "</option>";
        }
      ?>
    </select><br>
    Kategoria: <br>
    <select name="add_payment_category_select" class="input_select" id="add_payment_category_select">
      <option class="input_select_option" value="house_and_bills">Dom i rachunki</option>
      <option class="input_select_option" value="daily_expenses">Codzienne wydatki</option>
      <option class="input_select_option" value="investments">Inwestycje</option>
      <option class="input_select_option" value="savings">Oszczędności</option>
      <option class="input_select_option" value="entertainment">Rozrywka</option>
      <option class="input_select_option" value="car_adn_transport">Samochód i transport</option>
    </select><br>
    Kwota przelewu: <br>
    <input type="number" name="add_payment_amount" class="input input_payment" id="add_payment_amount" min="0" placeholder="Podaj kwotę przelewu">
    <br>
    Data przelewu: <br>
    <input type="date" name="add_payment_date" class="input input_payment" id="add_payment_date" value="<?php echo date('Y-m-d'); ?>">
    <br>
    <br>
    <input type="checkbox" name="add_payment_private_expenses_checkbox" class="input_checkbox" id="add_payment_private_expenses_checkbox"> Wydatek prywatny 
    <br>
    <br>
    <input type="checkbox" name="add_payment_permament_checkbox" class="input_checkbox" id="add_payment_permament_checkbox"> Przelew stały 
    <br>
    <br>
    Data przelewu stałego: <br>
    <input type="date" name="add_perm_payment_date" class="input input_payment" id="add_perm_payment_date" value="<?php echo date('Y-m-d'); ?>">
    <br>
    <br>
    <input type="button" value="Prześlij" class="button" onclick="addPayment()">  
  </fieldset>
</form>