<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginControllerTest extends TestCase
{
    /**
     * testIndex
     *
     * @return void
     */
    public function testIndex()
    {
        $this->visit('/admin/login')
             ->see('test index');
    }

    /**
     * testLoginOK
     *
     * @return void
     */
     public function testLoginOK()
     {
         $this->visit('/admin/login')
              ->type('admins', 'loginid')
              ->type('testtest', 'password')
              ->press('submit')
              ->see('TOP')
              ->assertSessionHas('login.user');
     }

     /**
      * testLoginNG
      *
      * @return void
      */
      public function testLoginNG()
      {
          $this->visit('/admin/login')
               ->type('', 'loginid')
               ->type('', 'password')
               ->press('submit')
               ->see('Input Error');
      }
}
