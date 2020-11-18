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
      if(isset($this->data[$key]))
        return $this->data[$key];
        //TODO: sprawdzić działanie thow new exception
    //  throw new Exception('In template ' . $this->filename . ' key ' . $key . ' is not set');
    }

    public function ToString() {
        ob_start();
        include $this->filename;
        return ob_get_clean();
    }
  }
?>
