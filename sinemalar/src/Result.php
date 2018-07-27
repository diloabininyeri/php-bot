<?php

namespace Sinemalar\src;

use Interfaces\ResultRegex;
use PHPHtmlParser\Dom;

/**
 * Class Result
 * @package Sinemalar\src
 *
 *
 */
class Result implements ResultRegex
{

    /**
     * @var
     *
     */
    private $array, $regexSinemalar, $contentSinemalar;

    /**
     * Result constructor.
     *
     */
    public function __construct()
    {
        $this->regexSinemalar = new RegexSinemalar();
        $this->contentSinemalar = new Content();
    }


    /**
     * @param $content
     * @return array
     *
     *
     */
    public function getResultRegex($content)
    {

        $dom = new Dom();
        $dom->load($content);
        $find = $dom->find("#topBanner");

        $i = 0;
        foreach ($find as $item) {
            $href = $this->regexSinemalar->getHrefFromContentWithRegex($item->innerhtml);
            $this->array[$i]["href"] = $href;
            $this->array[$i]["title"] = $this->regexSinemalar->getTitleFromcontentWithRegex($item->innerhtml);
            $this->array[$i]["img"] = $this->regexSinemalar->getImgSrcFromcontentWithRegex($item->innerhtml);


            $i++;
        }


        $videoArray = [];

        $a = 0;
        foreach ($this->array[0]["href"] as $url) {

            $visitPageContent = $this->contentSinemalar->fileGetContentRemoteSite($url);

            $videoArray[$a] = $this->regexSinemalar->getVideoSrcFromContentInMeta($visitPageContent);

            $a++;
        }


        $this->array[0]["video"] = $videoArray;


        $descriptionArray = [];

        $c = 0;


        foreach ($this->array[0]["href"] as $url) {

            $newContentForDescription = $this->contentSinemalar->fileGetContentRemoteSite($url);

            $descriptionArray[$c] = $this->regexSinemalar->getDescriptionFromContent($newContentForDescription);

            $c++;
        }


        $this->array[0]["description"] = $descriptionArray;


        $returnArray = [];

        foreach ($this->array[0] as $key => $value) {
            for ($i = 0; $i < count($value); $i++) {
                $returnArray[$i][$key] = $value[$i];
            }
        }

        return $returnArray;


    }
}