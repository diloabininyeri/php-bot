<?php

namespace Showtv\src;


/**
 * Class Result
 * @package Showtv\src
 *
 *
 */
class Result
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