<form action="./admin/functions/addRecipent.php" method="post">
  Nazwa: <input type="text" name="name"><br>
  Numer bankowy: <input type="text" name="acc_number" id="acc_numer_input" pattern="(\d*).{26,}" maxlength="26"><br>
  <input type="submit" value="Dodaj">
</form>