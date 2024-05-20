<?php

namespace App\Tests\Front;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class BaseTest extends WebTestCase
{
    protected static KernelBrowser $client;

    protected function setUp(): void
    {
        parent::setUp();

        static::$client = static::createClient(['environment' => 'test']);
    }

    public function testHomepage(): void
    {
        self::$client->request(Request::METHOD_GET, '/');

        $response = static::$client->getResponse();
        self::assertTrue($response->isSuccessful());

        $content = $response->getContent();
        self::assertIsString($content);
        self::assertStringContainsString('<h1', (string)$response->getContent());
    }
}
