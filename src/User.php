<?php

namespace Glowgaia\Gappy;

use GlowGaia\Grabbit\Grabbit;

class User{

    private $grabbit;

    public $id;
    public $username;

    public $email;

    public $avatar;

    public $user_level;

    public $filter_level;

    public $sushi_id;

    public $session_id;

    public $room_id;

    public $user_active;

    public $user_pms;

    public $towns_address;

    public $avatar_url;

    public $account_age;

    public $gender;


    public function __construct($id){
        $this->grabbit = new Grabbit();

        $user = $this->grabbit->it(102, [$id])->grab()->get(0);

        $this->id = $user->get('gaia_id');
        $this->username = $user->get('username');
        $this->avatar = $user->get('avatar');
        $this->user_level = $user->get('user_level');
        $this->filter_level = $user->get('filter_level');
        $this->sushi_id = $user->get('sushi_id');
        $this->session_id = $user->get('session_id');
        $this->room_id = $user->get('room_id');
        $this->user_active = $user->get('user_active');
        $this->user_pms = $user->get('user_pms');
        $this->towns_address = $user->get('towns_address');
        $this->avatar_url = $user->get('avatar_url');
        $this->account_age = $user->get('account_age');
        $this->gender = $user->get('gender');

        return $this;
    }

    public static function byId($id){
        return new self($id);
    }
    public static function byEmail($email){
        $grabbit = new Grabbit();

        $response = $grabbit->it(102, [$email])->grab()->get(0);

        $user = new self($response->get('gaia_id'));

        $user->email = $email;

        return $user;
    }

    public static function byUsername($username){
        $grabbit = new Grabbit();

        $response = $grabbit->it(102, [$username])->grab()->get(0);

        $user = new self($response->get('gaia_id'));

        return $user;
    }

    public static function bySid($session_id){
        $grabbit = new Grabbit();

        $response = $grabbit->it(107, [$session_id])->grab()->get(0);

        $user = new self($response->get('gaia_id'));

        return $user;
    }
}