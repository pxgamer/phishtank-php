<?php

use PHPUnit\Framework\TestCase;
use pxgamer\PhishTank\Hook;

/**
 * Class MainTest
 */
class MainTest extends TestCase
{
    /**
     * @var Hook
     */
    private $result;

    /**
     * MainTest constructor.
     *
     * @param null   $name
     * @param array  $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->result = new Hook('https://github.com');
    }

    /**
     * Check that the meta attribute is a valid instance of the Meta class
     */
    public function testUrlMetaValid()
    {
        $this->assertObjectHasAttribute('meta', $this->result);
        $this->assertTrue(is_a($this->result->meta(), 'pxgamer\PhishTank\Meta'));
    }

    /**
     * Check that the results attribute is a valid instance of the Results class
     */
    public function testUrlResultsValid()
    {
        $this->assertObjectHasAttribute('results', $this->result);
        $this->assertTrue(is_a($this->result->results(), 'pxgamer\PhishTank\Results'));
    }
}
