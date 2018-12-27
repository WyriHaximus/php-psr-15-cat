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

    /** @var string[][] */
    private $cats = [];

    /** @var string[] */
    private $catsList = [];

    /** @var int  */
    private $catCount = 0;

    public function __construct(bool $preload = false)
    {
        foreach (\glob(\dirname(__DIR__) . \DIRECTORY_SEPARATOR . 'etc' . \DIRECTORY_SEPARATOR . '*.cat') as $cat) {
            $this->catsList[] = $cat;
            $contents = [];
            if ($preload) {
                $contents = \file($cat, \FILE_IGNORE_NEW_LINES);
            }
            $this->cats[$cat] = $contents;
        }
        $this->catCount = \count($this->cats);
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);

        $catName = $this->catsList[\random_int(0, $this->catCount - 1)];
        if (\count($this->cats[$catName]) === 0) {
            $this->cats[$catName] = \file($catName, \FILE_IGNORE_NEW_LINES);
        }

        return asciiArtHeaders($response, self::HEADER, ...$this->cats[$catName]);
    }
}
