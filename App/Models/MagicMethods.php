<?php

namespace App\Models;

class MagicMethods{
	
	private $data;
	
	public function __construct($data = [])
	{
		$this->data = $data;
	}
	
	public function __set($name, $value)
    {
        //echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
       //echo "Getting '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

	public function __isset($name)
    {
        //echo "Is '$name' set?\n";
        return isset($this->data[$name]);
    }
	
}