<?php

namespace Factory;


use Biletix\src\Content as BiletixContent;
use Biletix\src\Result as BiletixResult;

use Sinemia\src\Content as SinemiaContent;
use Sinemia\src\Result as SinemiaResult;

use Tiyatrolar\src\Content as TiyatrolarContent;
use Tiyatrolar\src\Result as TiyatrolarResult;

use Diziler\src\Result as DizilerResult;
use Diziler\src\Content  as DizilerContent;


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
     * @return array
     *
     */
    public function createClass($number)
    {


        switch ($number) {

            /*---------------------------------------------------------------------------------
            Tiyatrolar.com.tr content çekme 1
            -----------------------------------------------------------------------------------*/
            case 1:
                $startDate = $this->getParametersFromUrl["startDate"] != null ? $this->getParametersFromUrl["startDate"] : date("Ymd");
                $finishdate = $this->getParametersFromUrl["finishDate"] != null ? $this->getParametersFromUrl["finishDate"] : date("Ymd", strtotime("+1 month"));
                $province = $this->getParametersFromUrl["province"] != null ? $this->getParametersFromUrl["province"] : 34;

                $content = (new TiyatrolarContent())->fileGetContentRemoteSite("https://tiyatrolar.com.tr/sahnedekiler?d=$startDate-$finishdate&il=$province&f=");
                $result = (new TiyatrolarResult())->getResultRegex($content);


                return $result;
                break;


            /*  -------------------------------------------------------------------------------------
                Sinemia content çekilme 2
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

                $content=(new DizilerContent())->fileGetContentRemoteSite("https://www.diziler.com/video-galerisi/fragmanlar");
                $result=(new DizilerResult())->getResultRegex($content);

                return $result;

                break;

            /*---------------------------------------------------------------------------------------
              tüm ihtiamller dışında number için
            --------------------------------------------------------------------------------------*/
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