<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DashboardBeforeLoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDashboardBeforeLogin()
    {
        $this->visit('/')
             ->seePageIs('/login');
    }
}
