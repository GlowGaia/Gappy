<?php
namespace Gappy\Tests;

use Glowgaia\Gappy\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase{
    public function test_username_of_user_2_is_admin(){
        $this->assertSame('admin', User::byId(2)->username);
    }
    public function test_username_of_email_lanzer_at_gmail_dot_com_is_lanzer(){
        $this->assertSame('Lanzer', User::byEmail('lanzer@gmail.com')->username);
    }

    public function test_id_of_username_awesomolocity_is_19722273(){
        $this->assertSame(19722273, User::byUsername('awesomolocity')->id);
    }

    public function test_aquarium_id_lookup_works(){
        $this->assertSame('9116373', User::byId(37285493)->getAquariumId());
    }
}