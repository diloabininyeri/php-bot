<?php

namespace Reyting\src;

use PHPHtmlParser\Dom;


class Result
{
    /**
     * @var array
     *
     */
    private $array = [],$regexReyting;

    public function __construct()
    {

        $this->regexReyting=new RegexReyting();
    }

    /**
     * @param $content
     * @return mixed
     *
     */
    public function getResultRegex($content)
    {




        $dom = new Dom();

        $dom->load($content);

        $find = $dom->find(".my_table_row");



        $i=0;
        foreach ($find as $val) {

            $this->array[$i]["list"] = $this->regexReyting->getProgramNameFromReytingListWithRegex($val);
            $this->array[$i]["chanel"] = $this->regexReyting->getChanelNameFromReytingwithRegex($val);
            $this->array[$i]["href"] = $this->regexReyting->getHrefReytingFromReytingWithRegex($val);

         $i+=1;
        }

        return $this->array;




    }

}