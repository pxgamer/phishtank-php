# phishtank-php

A simple PHP wrapper for the [PhishTank][pt] API.

## Usage

__Include the class:__

#### Using Composer  
`composer require pxgamer/phishtank`  
```php
<?php
require 'vendor/autoload.php';
$client = new \pxgamer\PhishTank\Hook;
```

#### Including the file manually  
```php
<?php
include 'src/Hook.php';
$client = new \pxgamer\PhishTank\Hook;
```

## Functions

__checkUrl()__

This is the sole function currently.

```php
// Api Key parameter is optional. Should be 'string' or false
Hook::checkUrl($url, $api_key);
```

## Example

```php
<?php

include 'vendor/autoload.php';

use pxgamer\PhishTank\Hook;

// The Hook::checkUrl() function returns an array.
$result = Hook::checkUrl('https://github.com');

echo '<pre>'.print_r($result, true).'</pre>';
```
#### Example Responses

__URL in Database__
```php
Array
(
    [meta] => Array
        (
            [timestamp] => 2017-02-27T15:45:08+00:00
            [serverid] => ...
            [status] => success
            [requestid] => ...
        )

    [results] => Array
        (
            [url] => https://github.com
            [in_database] => true
            [phish_id] => ...
            [phish_detail_page] => http://www.phishtank.com/phish_detail.php?phish_id=*
            [verified] => y
            [verified_at] => 2006-10-01T02:32:23+00:00
            [valid] => y
        )

)
```

__URL not in Database__
```php
Array
(
    [meta] => Array
        (
            [timestamp] => 2017-02-27T15:45:08+00:00
            [serverid] => ...
            [status] => success
            [requestid] => ...
        )

    [results] => Array
        (
            [url] => https://github.com
            [in_database] => false
        )

)
```

[pt]: https://www.phishtank.com