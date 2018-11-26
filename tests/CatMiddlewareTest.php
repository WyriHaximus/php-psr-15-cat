<?php declare(strict_types=1);

namespace WyriHaximus\Tests\Psr15\Cat;

use ApiClients\Tools\TestUtilities\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use WyriHaximus\Psr15\Cat\CatMiddleware;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;

/**
 * @internal
 */
final class CatMiddlewareTest extends TestCase
{
    public function providePreload()
    {
        yield [true];
        yield [false];
    }

    /**
     * @param bool $preload
     * @dataProvider providePreload
     */
    public function testHeader(bool $preload): void
    {
        $cats = new CatMiddleware($preload);
        $response = $cats->process(new ServerRequest(), new class() implements RequestHandlerInterface {
            public function handle(ServerRequestInterface $request): ResponseInterface
            {
                return new Response();
            }
        });

        self::assertTrue(isset($response->getHeaders()[CatMiddleware::HEADER]));
    }
}
