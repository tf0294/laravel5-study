<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserControllerTest extends TestCase
{
    /**
     * testIndex
     *
     * @param none
     */
    public function testIndex()
    {
        $this->visit('/admin/user')
             ->see('管理ユーザ一覧');
    }

    /**
     * testComplateOK
     *
     * @return void
     */
    public function testComplateOK()
    {
        $this->visit('/admin/user/')
             ->type('test_user', 'user_name')
             ->type('test_user', 'loginid')
             ->type('testtest', 'password')
             ->press('登録')
             ->assertRedirectedTo('/admin/user');
    }

    /**
     * testComplateNG
     *
     * @return void
     */
     public function testComplateNG()
     {
         $this->visit('/admin/user/')
               ->type('', 'user_name')
               ->type('', 'loginid')
               ->type(''. 'password')
               ->press('登録')
               ->see('Error')
               ->assertRedirectTo('/admin/user');
     }
}
