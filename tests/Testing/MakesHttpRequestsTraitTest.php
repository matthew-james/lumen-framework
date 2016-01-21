<?php

use Laravel\Lumen\Application;
use Laravel\Lumen\Testing\Concerns\MakesHttpRequests;

class MakesHttpRequestsTraitTest extends PHPUnit_Framework_TestCase
{
    use MakesHttpRequests;

    protected $app;

    protected $baseUrl = 'http://localhost';

    public function setUp()
    {
        parent::setUp();

        $this->app = new Application;
    }

    public function testReturnsAnIlluminateResponse()
    {
        $this->app->get('/', function () {
            return response('Hello World');
        });

        $response = $this->call('GET', '/');

        $this->assertInstanceOf(\Illuminate\Http\Response::class, $response);
    }
}
