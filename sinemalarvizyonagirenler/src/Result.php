<?php

namespace Sinemalarvizyonagirenler\src;

use Interfaces\ResultRegex;
use PHPHtmlParser\Dom;

class Result implements ResultRegex
{

    /**
     * @var Result
     *
     */
    private $regexSinemalarvizyonagirenler,$array=[];

    /**
     * Result constructor.
     *
     */
    public function __construct()
    {

        $this->regexSinemalarvizyonagirenler=new Result();
    }

    public function getResultRegex($content)
    {



        return 455;

    }

}

