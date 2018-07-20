<?php

namespace Factory;


use Biletix\src\Content as BiletixContent;
use Biletix\src\Result as BiletixResult;
use Sinemia\src\Content as SinemiaContent;
use Sinemia\src\Result as SinemiaResult;
use Tiyatrolar\src\Content as TiyatrolarContent;
use Tiyatrolar\src\Result as TiyatrolarResult;


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


        /**
         *$number 1 ise Tiyatrolar.com.tr
         *
         */


        if ($number == 1) {




            $startDate = $this->getParametersFromUrl["startDate"]!=null ? $this->getParametersFromUrl["startDate"] : date("Ymd");
            $finishdate = $this->getParametersFromUrl["finishDate"]!=null  ? $this->getParametersFromUrl["finishDate"] :date("Ymd",strtotime("+1 month"));
            $province = $this->getParametersFromUrl["province"]!=null ? $this->getParametersFromUrl["province"] : 34;


            $content = (new TiyatrolarContent())->fileGetContentRemoteSite("https://tiyatrolar.com.tr/sahnedekiler?d=$startDate-$finishdate&il=$province&f=");
            $result = (new TiyatrolarResult())->getResultRegex($content);


            return $result;


        }



        /**
         *
         * $number==2 ise sineimia çekilecek
         */


        else if ($number == 2) {


            $content = (new SinemiaContent)->fileGetContentRemoteSite("https://www.sinemia.com/gelecek-filmler");

            $result = (new SinemiaResult())->getResultRegex($content);


            return $result;


        }

        /**
         *
         * number==3 ise biletix çekilecek
         */
        else if ($number == 3) {


            $content=(new BiletixContent())->fileGetContentRemoteSite('http://www.biletix.com/solr/tr/select/?start=0&rows=300&q=*%3A*&fq=city%3A%22%C4%B0stanbul%22&sort=start%20asc%2C%20vote%20desc&&wt=json&indent=true&facet=true&facet.field=subcategory&facet.mincount=1&json.wrf=jQuery1113005863541098341596_1532070846337&_=1532070846338');

            $result=(new BiletixResult())->getResultRegex($content);

            return $result;







        } else {


            return ["error" => "1 ile 3 arasında bir istekte bulununuz"];
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