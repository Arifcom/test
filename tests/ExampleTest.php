<?php

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }

    public function testApiBookIndex()
    {
        $response = $this->call('GET', '/books?api_token=dXdPaXhhaDZOZFlqU0d5ZVgwSW5yVmJCOTRUWlU1em8=');

        $this->assertEquals(200, $response->status());
    }

    public function testApiBookShow()
    {
        $response = $this->call('GET', '/books/1?api_token=dXdPaXhhaDZOZFlqU0d5ZVgwSW5yVmJCOTRUWlU1em8=');

        $this->assertEquals(200, $response->status());
    }

    public function testApiBookStore()
    {
        $response = $this->call('POST', '/books?api_token=dXdPaXhhaDZOZFlqU0d5ZVgwSW5yVmJCOTRUWlU1em8=');

        $this->assertEquals(200, $response->status());
    }

    public function testApiBookUpdate()
    {
        $response = $this->call('PUT', '/books/1?api_token=dXdPaXhhaDZOZFlqU0d5ZVgwSW5yVmJCOTRUWlU1em8=');

        $this->assertEquals(200, $response->status());
    }

    public function testApiBookDestroy()
    {
        $response = $this->call('DELETE', '/books/1?api_token=dXdPaXhhaDZOZFlqU0d5ZVgwSW5yVmJCOTRUWlU1em8=');

        $this->assertEquals(200, $response->status());
    }
}
