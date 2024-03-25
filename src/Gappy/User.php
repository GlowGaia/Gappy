<?php

namespace Gappy;

use GlowGaia\Grabbit\Grabbit;

class User{

    private $grabbit;

    public $username;
    public $id;

    public function __construct($id){
        $this->grabbit = new Grabbit();

        $response = $this->grabbit->it(102, [2])->grab();

        dd($response);
    }

    public static function byId($id){
        return new self($id);
    }
}