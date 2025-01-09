<?php

namespace Abruno\Rubrica;

class App{

    private static array $services;

    public static function registerService(string $name, $service): void {
		self::$services[$name] = $service;
	}

	public static function getService(string $name): mixed {
		return self::$services[$name];
	}

	public static function hasService(string $name): bool {
		return isset(self::$services[$name]);
	}

}