<?php declare(strict_types=1);

namespace WyriHaximus\Psr15\Cat;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class CatMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);

        $response = $response->withAddedHeader('X-Cat', '+----------------------------+');
        $response = $response->withAddedHeader('X-Cat', '|   |\      _,,,---,,_       |');
        $response = $response->withAddedHeader('X-Cat', '|   /,`.-\'`\'    -.  ;-;;,_   |');
        $response = $response->withAddedHeader('X-Cat', '|  |,4-  ) )-,_..;\ (  `\'-\'  |');
        $response = $response->withAddedHeader('X-Cat', '| \'---\'\'(_/--\'  `-\'\_)       |');
        $response = $response->withAddedHeader('X-Cat', '+----------------------------+');

        return $response;
    }
}
