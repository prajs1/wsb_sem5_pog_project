<?php
  class PageTemplate extends Template
  {

    public function __construct($pagename)
    {
      parent::__construct("./code/pages/".$pagename.".php");
    }
  }
?>
