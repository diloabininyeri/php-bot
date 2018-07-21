<?php

namespace Diziler\src;


class Result
{
    /**
     * @var array
     *
     */
    private $array = [];

    private $regexTiyatrolarComTr;

    /**
     * @param Content $content
     * @return array
     *
     *
     */


    public function __construct()
    {

        $this->regexTiyatrolarComTr = new RegexSinemia();

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




            $this->array[$index]["title"] = $this->regexTiyatrolarComTr->getTitleFromContentWithRegex($val);
            $this->array[$index]["resim"] = $this->regexTiyatrolarComTr->getImagefromContentWithRegex($val)[1];
            $this->array[$index]["href"] = $this->regexTiyatrolarComTr->getTHrefFromContentWithRegex($val);
            $index += 1;
        }


        return $this->array;


    }

}