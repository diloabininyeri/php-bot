<?php
/**
 * Created by PhpStorm.
 * User: muzlu
 * Date: 20.07.2018
 * Time: 14:42
 */

namespace Biletix\src;


class Content
{
    /**
     * @param $contentUrl
     * @return mixed
     *
     *
     *
     * @link  http://www.biletix.com/solr/tr/select/?start=0&rows=300&q=subcategory:tiyatro$ART&qt=standard&indent=true&fq=start%3A%5B2018-07-20T00%3A00%3A00Z%20TO%202020-07-20T00%3A00%3A00Z%2B1DAY%5D&sort=start%20asc,%20vote%20desc&&wt=json&indent=true&facet=true&facet.field=category&facet.field=venuecode&facet.field=region&facet.field=subcategory&facet.mincount=1&json.wrf=jQuery111303694218199738495_1532085330403&_=1532085330404
     *
     *
     *
     */
    public function fileGetContentRemoteSite($contentUrl,$parameters=[])
    {


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_URL,$contentUrl);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
        $data = curl_exec($ch);
        curl_close($ch);
        return file_get_contents(urldecode($contentUrl));

        return $data;

    }


}