# [PSR-15](http://www.php-fig.org/psr/psr-15/) middleware that adds a cat to your headers

[![Total Downloads](https://poser.pugx.org/WyriHaximus/psr-15-cat/downloads.png)](https://packagist.org/packages/WyriHaximus/psr-15-cat/stats)
[![License](https://poser.pugx.org/WyriHaximus/psr-15-cat/license.png)](https://packagist.org/packages/wyrihaximus/psr-15-cat)

### Installation ###

To install via [Composer](http://getcomposer.org/), use the command below, it will automatically detect the latest version and bind it with `^`.

```
composer require wyrihaximus/psr-15-cat 
```

## Usage ##

```php
// Add $middleware to your stack
$middleware = new CatMiddleware();
```

## Inspired by ##

[`nixCraft`](https://twitter.com/nixcraft/status/1027639812378054656)

## Contributing ##

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License ##

Copyright 2018 [Cees-Jan Kiewiet](http://wyrihaximus.net/)

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
