# phishtank-php

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Style CI][ico-styleci]][link-styleci]
[![Code Coverage][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A simple PHP wrapper for the [PhishTank][pt] API.

## Install

Via Composer

``` bash
$ composer require pxgamer/phishtank-php
```

## Usage

**__construct($url, $api_key = null)**

This will initialise the object with all details.

```php
// Api Key parameter is optional. Should be a string if included.
$client = new \pxgamer\PhishTank\Hook($url);
```

**getResults()**

This will refresh the results and fetch new ones from the server.

#### Example code

```php
use pxgamer\PhishTank\Hook;

$result = new Hook('https://github.com');

echo '<pre>' . print_r($result, true) . '</pre>';
```
#### Example response

```php
pxgamer\PhishTank\Hook Object
(
    [url:pxgamer\PhishTank\Hook:private] => https://github.com
    [requestData:pxgamer\PhishTank\Hook:private] => Array
        (
            [format] => json
            [url] => https://github.com
        )

    [app_key:pxgamer\PhishTank\Hook:private] => 
    [meta:pxgamer\PhishTank\Hook:private] => pxgamer\PhishTank\Meta Object
        (
            [timestamp:protected] => DateTime Object
                (
                    [date] => 2017-08-07 13:18:13.000000
                    [timezone_type] => 1
                    [timezone] => +00:00
                )

            [serverid:protected] => ab9f6c17
            [status:protected] => 1
            [requestid:protected] => 146.112.225.22.59886895b52782.72884672
        )

    [results:pxgamer\PhishTank\Hook:private] => pxgamer\PhishTank\Results Object
        (
            [url:protected] => https://github.com
            [in_database:protected] => 
            [phish_id:protected] => 
            [phish_detail_page:protected] => 
            [verified:protected] => 
            [verified_at:protected] => 
            [valid:protected] => 
        )

)
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email owzie123@gmail.com instead of using the issue tracker.

## Credits

- [pxgamer][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[pt]: https://www.phishtank.com

[ico-version]: https://img.shields.io/packagist/v/pxgamer/phishtank-php.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/pxgamer/phishtank-php/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/83330775/shield
[ico-code-quality]: https://img.shields.io/codecov/c/github/pxgamer/phishtank-php.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pxgamer/phishtank-php.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pxgamer/phishtank-php
[link-travis]: https://travis-ci.org/pxgamer/phishtank-php
[link-styleci]: https://styleci.io/repos/83330775
[link-code-quality]: https://codecov.io/gh/pxgamer/phishtank-php
[link-downloads]: https://packagist.org/packages/pxgamer/phishtank-php
[link-author]: https://github.com/pxgamer
[link-contributors]: ../../contributors
