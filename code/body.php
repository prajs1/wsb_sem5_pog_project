<div class="frame">
  <div class="header">
    <?php if (isset($_SESSION['logged'])) echo $this->Get("header"); ?>
  </div>
</br>
  <div class="under_construct">Page under construct</div>
  <div class="content">
    <?php echo $this->Get("content"); ?>
  </div>
  <div class="footer">
    <?php echo $this->Get("footer"); ?>
  </div>
</div>
