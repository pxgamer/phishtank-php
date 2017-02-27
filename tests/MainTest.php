<?php

use pxgamer\PhishTank\Hook;

class MainTest extends PHPUnit_Framework_TestCase
{

    public function testCheckUrl()
    {
        $result = Hook::checkUrl('https://github.com');

        $this->assertArrayHasKey('meta', $result);
    }
}
