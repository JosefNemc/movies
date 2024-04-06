<?php

declare(strict_types=1);

namespace App\Router;

use Nette;

use Nette\Application\Routers\RouteList;
use Nette\Http\IRequest;


final class RouterFactory
{
	use Nette\StaticClass;



    public static function createRouter(): RouteList
	{

        $baseUrl = '/movies/www/';

        $router = new RouteList;

        // Routy pro API
        $router->addRoute("$baseUrl/api/movies", 'Api:movies');
        $router->addRoute("$baseUrl/api/movies/<id>", 'Api:movie');
        $router->addRoute("$baseUrl/api/movies/create", 'Api:create');
        $router->addRoute("$baseUrl/api/movies/<id>/update", 'Api:update');
        $router->addRoute("$baseUrl/api/movies/<id>/delete", 'Api:delete');

        // Routa pro domovskou stránku
        $router->addRoute("<presenter>/<action>[/<id>]", 'Home:default');

        return $router;
	}
}
