<?php
namespace Tests;
````````````````````
use PHPUnit\Framework\TestCase;
use Gappy\User;

class UserTest extends TestCase{
    public function test_username_of_user_2_is_admin(){
        User::byId(2)->username === 'admin';
    }
}