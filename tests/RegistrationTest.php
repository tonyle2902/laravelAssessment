<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseTransactions;
    public function test_registration_page(){
        $this->visit('getRegister')
                ->type('bob', 'name')
                ->type('hello1@in.com', 'email')
                ->type('hello1', 'password')
                ->type('hello1', 'password_confirmation')
                ->press('Register')
                ->seePageIs('/login');
        }
        
    
}
