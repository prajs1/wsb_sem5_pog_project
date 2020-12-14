<?php
  class Template
  {
    private $filename;

    public function __construct($filename)
    {
      $this->filename = $filename;
    }

    private $data = array();

    public function Set($key, $value)
    {
      $this->data[$key] = $value;
    }

    public function Get($key)
    {
      try {
        if(isset($this->data[$key]))
          return $this->data[$key];
        throw new Exception();
      } catch (\Exception $e) {
        echo "Coś poszło nie tak przy tworzeniu klucza $key";
      }
    }

    public function ToString() {
        ob_start();
        include $this->filename;
        return ob_get_clean();
    }
  }
?>
