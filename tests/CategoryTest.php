<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseTransactions;
    public function test_category_has_a_name()
    {
        $category = factory(App\Category::class)->create();        
        $this->assertEquals('Hello', $category->name);
    }
    
    public function test_hasMany_method_in_Category_model(){
        $category = App\Category::first();
        
        $book = new App\Book;
        $book->name = 'abc';
        $book->save();
        
        $category->books()->save($book);
        
        $this->assertEquals($category->id, $book->category_id);
    }
}
