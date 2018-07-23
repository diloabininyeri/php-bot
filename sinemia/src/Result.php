<?php

namespace Sinemia\src;


class Result
{
    /**
     * @var array
     *
     */
    private $array = [];

    private $regexSinemia;

    /**
     * @param Content $content
     * @return array
     *
     *
     */


    public function __construct()
    {

        $this->regexSinemia = new RegexSinemia();

    }


    /**
     * @param $content
     * @return array
     *
     *
     */
    public function getResultRegex($content)
    {


        preg_match_all('@<div class="movie-box-new">(.*?)</div>@si', $content, $found);

        $index = 0;


        foreach ($found[0] as $val) {


            $this->array[$index]["title"] = $this->regexSinemia->getTitleFromContentWithRegex($val);
            $this->array[$index]["resim"] = $this->regexSinemia->getImagefromContentWithRegex($val)[1];
            $this->array[$index]["href"] = $this->regexSinemia->getTHrefFromContentWithRegex($val);
            //$this->array[$index]["description"] = $this->regexSinemia->getDescriptionFromContentWithRegex(file_get_contents($this->regexSinemia->getTHrefFromContentWithRegex($val)));

            $index += 1;
        }


        return $this->array;


    }

}