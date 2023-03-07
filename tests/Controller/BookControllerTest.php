<?php

namespace App\Tests\Controller;

use App\Controller\BookController;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BookControllerTest extends WebTestCase
{
    public function testBookByCategory ()
    {
        $client = static::createClient();
        $client->request('GET', '/api/v1/category/2/books');
        $responseContent = $client->getResponse()->getContent();

        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonFile(
            __DIR__. '/response/BookControllerTest_testBookByCategory.json',
            $responseContent
        );
    }
}
