<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

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
        $this->get('/books');

        $this->assertStatus(200);
    }

    public function testApiBookShow()
    {
        $this->get('/books/1');

        $this->assertStatus(200);
    }

    public function testApiBookStore()
    {
        $this->post('/books');

        $this->assertStatus(200);
    }

    public function testApiBookUpdate()
    {
        $this->put('/books/1');

        $this->assertStatus(200);
    }

    public function testApiBookDestroy()
    {
        $this->delete('/books/1');

        $this->assertStatus(200);
    }
}
