<?php

namespace pxgamer\PhishTank;

use DateTime;

/**
 * Class Meta
 * @package pxgamer\PhishTank
 */
class Meta
{
    /**
     * @var DateTime
     */
    protected $timestamp;
    /**
     * @var string
     */
    protected $serverid;
    /**
     * @var bool
     */
    protected $status;
    /**
     * @var string
     */
    protected $requestid;

    /**
     * Populates the attributes using the response data
     *
     * @param $jsonMeta
     * @return $this
     */
    public function populate($jsonMeta)
    {
        // Set strings
        $this->serverid = $jsonMeta['serverid'];
        $this->requestid = $jsonMeta['requestid'];

        // Set timestamps
        $this->timestamp = new DateTime($jsonMeta['timestamp']);

        // Set booleans
        $this->status = ($jsonMeta['status'] === 'success') ? true : false;

        return $this;
    }
}