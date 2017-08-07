# phishtank-php

A simple PHP wrapper for the [PhishTank][pt] API.

## Usage

__Include the class:__

#### Using Composer  
`composer require pxgamer/phishtank`  
```php
<?php
require 'vendor/autoload.php';
```

#### Including the file manually  
```php
<?php
include 'src/Hook.php';
```

## Functions

**__construct($url, $api_key = null)**

This will initialise the object with all details.

```php
// Api Key parameter is optional. Should be a string if included.
$client = new \pxgamer\PhishTank\Hook($url);
```

**getResults()**

This will refresh the results and fetch new ones from the server.

## Example

```php
<?php

include 'vendor/autoload.php';

use pxgamer\PhishTank\Hook;

$result = new Hook('https://github.com');

echo '<pre>' . print_r($result, true) . '</pre>';
```
#### Example Response

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

[pt]: https://www.phishtank.com