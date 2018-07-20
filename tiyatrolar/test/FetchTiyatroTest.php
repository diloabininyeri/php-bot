<?php

use PHPUnit\Framework\TestCase;

use Tiyatrolar\src\{
    Result,Content
};

class FetchTiyatroTest extends TestCase
{
    /**
     *
     * @test
     */
    public function testFetchTitleHrefImg()
    {


        $content = (new Content())->fileGetContentRemoteSite("https://tiyatrolar.com.tr/sahnedekiler?d=20180716-20180731&il=34&f=");

        $result = (new Result())->getResultRegex($content);


        print_r($result);


    }
}