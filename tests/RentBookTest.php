<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RentBookTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use WithoutMiddleware;
    use DatabaseTransactions;
    
    public function test_show_book_page(){
        $response = $this->call('GET', '/showBooksPage');
        $this->assertEquals(200, $response->status());
    }
    
    
    
}
