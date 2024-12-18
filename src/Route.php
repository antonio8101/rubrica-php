<?php

namespace Abruno\Rubrica;

class Route {

	private static array $get = [];
	private static array $post = [];

	/**
	 * Risolve una richiesta HTTP, in base al metodo ritornando una delle RouteConfig predisposte nei 2 archivi statici
	 *
	 * @return RouteConfig
	 * @throws \Exception
	 */
	public static function Resolve(): RouteConfig {

		$uri = $_SERVER['REQUEST_URI'];

		if ( $_SERVER['REQUEST_METHOD'] == "GET" ) {
			return self::ResolvePage( self::$get, $uri );
		}

		if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
			return self::ResolvePage( self::$post, $uri );
		}

		throw new \Exception( "Method not allowed" );
	}

	/**
	 * Consente di impostare una RouteConfig nell'archivio delle configurazioni GET
	 *
	 * @param string $route
	 * @param callable $delegate
	 *
	 * @return void
	 */
	public static function Get( string $route, callable $delegate ): void {
		self::$get[] = new RouteConfig( $route, $delegate );
	}

	/**
	 * Consente di impostare una RouteConfig nell'archivio delle configurazioni POST
	 *
	 * @param string $route
	 * @param callable $delegate
	 *
	 * @return void
	 */
	public static function Post( string $route, callable $delegate ): void {
		self::$post[] = new RouteConfig( $route, $delegate );
	}

	/**
	 * Restituisce una RouteConfig presa dal array di config trasmesso in base alla URI
	 *
	 * @param array $routes Le RouteConfig tra cui scegliere
	 * @param string $uri La URI da valutare
	 *
	 * @return RouteConfig La RouteConfig corrispondente
	 */
	private static function ResolvePage( array $routes, string $uri ): RouteConfig {
		foreach ( $routes as $value ) {
			if ( $value->pattern == $uri ) {
				return $value;
			}
		};

		return new RouteConfig( "*", function () {
			return "not-found";
		} );
	}

}