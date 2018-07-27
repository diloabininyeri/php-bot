<?php

namespace Puhu\src;

use Interfaces\ResultRegex;

/**
 * Class Result
 * @package Puhu\src
 *
 * number=9
 */
class Result implements ResultRegex
{
    private $regexPuhu, $array;

    /**
     * Result constructor.
     *
     */
    public function __construct()
    {


        $this->array = [];
        $this->regexPuhu = new RegexPuhu();
    }


    /**
     * @param $content
     * @return array
     *
     */
    public function getResultRegex($content)
    {

        $re = '/<script>window._INITSTATE_=(.+)<\/script><script>window/m';
        preg_match_all($re, $content, $matches, PREG_SET_ORDER, 0);


        return $matches[0][1];



    }

}

