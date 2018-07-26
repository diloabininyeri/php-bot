<?php

namespace Showtv\src;

use Interfaces\ResultRegex;


/**
 * Class Result
 * @package Showtv\src
 *
 *
 */
class Result implements ResultRegex
{
    /**
     * @var array
     *
     */
    private $array = [], $RegexShowTv;

    public function __construct()
    {
        $this->RegexShowTv = new RegexShowTv();
    }

    /**
     * @param $content
     * @return array
     *
     */
    function getResultRegex($content)
    {


        return $this->array;
    }

}