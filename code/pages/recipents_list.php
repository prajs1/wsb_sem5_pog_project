<div class="modal" id="modal_edit_recipent">
  <div class="modal_content">
    <form method="post">
      <fieldset class="fieldsets">
        <legend><b><i>Zaktualizuj dane odbiorcy</i></b></legend>
        <input type="text" name="ecit_recipent_id" id="edit_recipent_id" readonly>
        <input type="text" name="edit_recipent_name" class="input" id="edit_recipent_name" placeholder="Wprowadź nazwę odbiorcy">
        <input type="text" name="edit_recipent_acc_number" class="input" id="edit_recipent_acc_number" pattern="(\d*).{26,}" maxlength="26" placeholder="Wprowadź numer konta odbiorcy"><br>
        <input type="button" value="Zaktualizuj" class="button" onclick="editRecipent()">
      </fieldset>
    </form>
  </div>
</div>

<?php
  echo listRecipent($mysqli);
?>