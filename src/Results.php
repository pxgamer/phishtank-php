<?php

namespace pxgamer\PhishTank;

use DateTime;

/**
 * Class Results
 * @package pxgamer\PhishTank
 */
class Results
{
    /**
     * @var string
     */
    protected $url;
    /**
     * @var bool
     */
    protected $in_database;
    /**
     * @var int
     */
    protected $phish_id;
    /**
     * @var string
     */
    protected $phish_detail_page;
    /**
     * @var bool
     */
    protected $verified;
    /**
     * @var \DateTime
     */
    protected $verified_at;
    /**
     * @var bool
     */
    protected $valid;

    /**
     * Populates the attributes using the response data
     *
     * @param $jsonResults
     * @return $this
     */
    public function populate($jsonResults)
    {
        $this->url = $jsonResults['url'];
        $this->in_database = $jsonResults['in_database'];

        if ($this->in_database) {

            // Set strings
            $this->phish_detail_page = $jsonResults['phish_detail_page'];

            // Set integers
            $this->phish_id = (int)$jsonResults['phish_id'];

            // Set timestamps
            $this->verified_at = new DateTime($jsonResults['verified_at']);

            // Set booleans
            $this->verified = ($jsonResults['verified'] === 'y') ? true : false;
            $this->valid = ($jsonResults['valid'] === 'y') ? true : false;

        }

        return $this;
    }

    /**
     * @param string $name
     * @return null
     */
    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        }

        return null;
    }
}