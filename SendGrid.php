<?php

class SendGrid
{
  protected $namespace = "SendGrid",
            $username, // Set in config/options.php
            $password; // Set in config/options.php

  // Available transport mechanisms
  protected $web,
            $smtp;

  public function __construct()
  {
    $this->username = Config::get('sendgrid::options.username');
    $this->password = Config::get('sendgrid::options.password');
  }

  public function __get($api)
  {
    $name = $api;

    if($this->$name != null)
    {
      return $this->$name;
    }

    $api = $this->namespace . "\\" . ucwords($api);
    $class_name = str_replace('\\', '/', "$api.php");
    $file = __dir__ . DIRECTORY_SEPARATOR . $class_name;

    if (!file_exists($file))
    {
      throw new Exception("Api '$class_name' not found.");
    }
    require_once $file;

    $this->$name = new $api($this->username, $this->password);
    return $this->$name;
  }

}
