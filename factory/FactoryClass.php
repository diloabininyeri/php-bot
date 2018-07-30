<?php

namespace Factory;


use Biletix\src\Content as BiletixContent;
use Biletix\src\Result as BiletixResult;
use Diziler\src\{
    Content as DizilerContent, Result as DizilerResult
};
use Dizimag\src\{
    Content as DizimagContent, Result as DizimagResult
};
use Fragmanlar\src\Content as FragmanlarContent;
use Fragmanlar\src\Result as FragmanlarResult;
use Puhu\src\{
    Content as PuhuContent, Result as PuhuResult
};
use Reyting\src\{
    Content as ReytingContent, Result as ReytingResult
};
use Sinemalar\src\{
    Content as SinemalarContent, Result as SinemalarResult
};
use Sinemalarvizyonagirenler\src\{
    Content as SinemalarvizonagirenlerContent, Result as SinemavizyonagirenlerResult
};
use Sinemia\src\{
    Content as SinemiaContent, Result as SinemiaResult
};
use Star\src\Content as StartTvContent;
use Star\src\Result as StartTvResult;
use Tiyatrolar\src\{
    Content as TiyatrolarContent, Result as TiyatrolarResult
};


class FactoryClass
{

    /**
     * @var
     * @example ["startDate"=>"20180718,"finishDate"=>"20180828","province"=>34]
     * @author dılo sürücü <berxudar@gmail.com>
     *
     */


    private $getParametersFromUrl;


    /**
     * @param $number
     * @return \Dizimag\src\RegexDiziMag
     *
     */
    public function createClass($number)
    {


        switch ($number) {

            /*---------------------------------------------------------------------------------
            Tiyatrolar.com.tr content çekme 1
            -----------------------------------------------------------------------------------*/
            case 1:

                if ($this->getParametersFromUrl["d"] == null) {

                    $startDate = date("Ymd");
                    $finishdate = date("Ymd", strtotime("+1 month"));
                    $date = $startDate . "-" . $finishdate;

                } else {

                    $date = $this->getParametersFromUrl["d"];

                }


                $province = $this->getParametersFromUrl["province"] != null ? $this->getParametersFromUrl["province"] : 34;
                $content = (new TiyatrolarContent())->fileGetContentRemoteSite("https://tiyatrolar.com.tr/sahnedekiler?d=$date&il=$province&f=");
                $result = (new TiyatrolarResult())->getResultRegex($content);


                return $result;
                break;


            /*  -------------------------------------------------------------------------------------
                Sinemia content çekilme 2  description  eklenecektir
            *----------------------------------------------------------------------------------------*/


            case 2:
                $content = (new SinemiaContent)->fileGetContentRemoteSite("https://www.sinemia.com/gelecek-filmler");
                $result = (new SinemiaResult())->getResultRegex($content);


                return $result;
                break;


            /*-----------------------------------------------------------------------------------------
             Biletix content çekme 3
            -------------------------------------------------------------------------------------------*/


            case 3:
                $content = (new BiletixContent())->fileGetContentRemoteSite('http://www.biletix.com/solr/tr/select/?start=0&rows=300&q=*%3A*&fq=city%3A%22%C4%B0stanbul%22&sort=start%20asc%2C%20vote%20desc&&wt=json&indent=true&facet=true&facet.field=subcategory&facet.mincount=1&json.wrf=jQuery1113005863541098341596_1532070846337&_=1532070846338');
                $result = (new BiletixResult())->getResultRegex($content);

                return $result;
                break;


            /*----------------------------------------------------------------------------------------
             Diziler fragmanı çekme 4
            -----------------------------------------------------------------------------------------*/

            case 4:

                $content = (new DizilerContent())->fileGetContentRemoteSite("https://www.diziler.com/video-galerisi/fragmanlar");
                $result = (new DizilerResult())->getResultRegex($content);

                return $result;

                break;

            /* -----------------------------------------------------------------------------------------
            showtv diziler arsivdeki diziler http://localhost:8888/?number=5&page=2
            -----------------------------------------------------------------------------------------*/

            case 5:


                $page = $this->getParametersFromUrl["page"] != null ? $this->getParametersFromUrl["page"] : 1;
                if ($page == 1) {
                    $contentUrl = "http://www.fragmanlarim.com";
                } else {
                    $contentUrl = "http://www.fragmanlarim.com/page/$page/";
                }


                $content = (new FragmanlarContent())->fileGetContentRemoteSite($contentUrl);
                $result = (new FragmanlarResult())->getResultRegex($content);


                $arraySlice = array_slice($result, 7);

                return array_slice($arraySlice, -25, 10, true);

                break;


            /*-----------------------------------------------------------------------------------------------
            reytingleri çekme
            ------------------------------------------------------------------------------------*/
            case 6:


                $content = (new ReytingContent())->fileGetContentRemoteSite("http://www.ranini.tv/reyting");


                $result = (new ReytingResult())->getResultRegex($content);

                return $result;


                break;

            /*------------------------------------------------------------------------------------------------------
              vizyondaki filmler
             ----------------------------------------------------------------------------------------------------*/

            case 7:

                $content = (new SinemalarContent())->fileGetContentRemoteSite("https://www.sinemalar.com/");


                $result = (new SinemalarResult())->getResultRegex($content);

                return $result;


                break;

            /*---------------------------------------------------------------
            popüler diziler
            ----------------------------------------------------------------*/
            case 8:

                $content = (new DizimagContent())->fileGetContentRemoteSite("http://dizimag.net/populer/");
                $result = (new DizimagResult())->getResultRegex($content);

                return $result;

                break;
            /*---------------------------------------------------------------------------------------
              puhu tv
            --------------------------------------------------------------------------------------*/

            case 9:

                $content = (new PuhuContent())->fileGetContentRemoteSite("https://puhutv.com/dizi");

                $result = (new PuhuResult())->getResultRegex($content);

                return $result;


                break;

            /*----
            star tv
            ------------*/

            case 10:


                $content = (new StartTvContent())->fileGetContentRemoteSite("https://www.startv.com.tr/dizi");
                $result = (new StartTvResult())->getResultRegex($content);

                return $result;


            case 11:

                $content = (new SinemalarvizonagirenlerContent())->fileGetContentRemoteSite("https://www.sinemalar.com/filmler/vizyondaki");
                $result = (new SinemavizyonagirenlerResult())->getResultRegex($content);

                return $result;

                break;


            default:


                return ["error" => "geçersiz istek numarası"];


        }


    }


    /**
     * @param array $parameters
     * @return $this
     *
     *
     */
    public function sendParameters(array $parameters)
    {


        $this->getParametersFromUrl = $parameters;


        return $this;
    }


}