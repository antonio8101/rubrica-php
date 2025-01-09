<?php

namespace Abruno\Rubrica;

class Request {

    public object $params;

    public function __construct(){

        $params = array_merge($_GET, $_POST);

        if (isset($_FILES)){
			// QUI UNA FIX
            $params = array_merge($params, ["files" => $_FILES]);
        }

        $this->params = (object) $params;

    }

    public function __get($name){
        if (property_exists($this->params, $name)) {
			return $this->params->$name;
		}

        return null;
    }

    public function __set($name, $value){
        $this->params->$name = $value;
    }

    public function __isset(string $name): bool {
		return isset($this->params->$name);
	}

	public function has(string $string): bool {
		return property_exists($this->params, $string);
	}

    public static function Capture():Request {
		return new Request();
	}

}