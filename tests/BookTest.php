<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseTransactions;
    
    public function test_book_has_a_name()
    {
        $book = factory(App\Book::class)->create();        
        $this->assertEquals('Hello', $book->name);
    }
    
    public function test_hasMany_method_in_Book_model(){
        $user = App\User::first();
        
        $book = new App\Book;
        $book->name = 'abc';
        $book->category_id = '2';
        $book->save();
        
        $user->books()->save($book);
        
        $this->assertEquals($user->id, $book->user_id);
    }
    
      
}
