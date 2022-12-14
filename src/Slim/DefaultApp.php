<?php
declare(strict_types=1);

namespace SpaethTech\HTTP\Slim;

use SpaethTech\HTTP\Slim\Middleware\Handlers\MethodNotAllowedHandler;
use SpaethTech\HTTP\Slim\Middleware\Handlers\NotFoundHandler;
use SpaethTech\HTTP\Slim\Middleware\Handlers\UnauthorizedHandler;
use SpaethTech\HTTP\Slim\Middleware\Views\TwigView;
use SpaethTech\HTTP\Twig\Extensions\SwitchExtension;
use Slim\App;

class DefaultApp extends App
{

    public function __construct($container = [])
    {
        $defaults = [
            "settings" => [
                //"displayErrorDetails" => false, // Defaults to FALSE
                "addContentLengthHeader" => false,
                "determineRouteBeforeAppMiddleware" => true,
            ],

            //"twig" => new TwigView(__DIR__."/views/"),

            "notFoundHandler" => new NotFoundHandler(),
            "notAllowedHandler" => new MethodNotAllowedHandler(),
            "unauthorizedHandler" => new UnauthorizedHandler(),
        ];

        $combined = array_merge($defaults, $container);

        parent::__construct($combined);
    }


}
