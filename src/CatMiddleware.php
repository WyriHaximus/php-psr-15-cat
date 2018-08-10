<?php declare(strict_types=1);

namespace WyriHaximus\Psr15\Cat;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use function WyriHaximus\Psr7\asciiArtHeaders;

final class CatMiddleware implements MiddlewareInterface
{
    const HEADER = 'X-Cat';

    /**
     * @var string[][]
     */
    private $cats = [];

    private $catCount = 0;

    public function __construct()
    {
        foreach (glob(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . '*.cat') as $cat) {
            $this->cats[] = explode("\t", str_replace(["\r", "\n"], "\t", file_get_contents($cat)));
        }
        $this->catCount = count($this->cats);
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);

        return asciiArtHeaders($response, self::HEADER, ...$this->cats[random_int(0, $this->catCount - 1)]);
    }
}
