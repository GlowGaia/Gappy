<?php

namespace Glowgaia\Gappy;

use GlowGaia\Grabbit\Grabbit;

class User{
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


    public function __construct($userdata = null){
        $this->loadUser($userdata);

        return $this;
    }

    protected function loadUser($userdata){
        if($userdata){
            foreach ($userdata as $property => $value) {
                if (property_exists($this, $property)) {
                    $this->$property = $value;
                }
                elseif($property === 'gaia_id'){
                    $this->id = $value;
                }
            }
        }
    }

    protected function fetchUser($query = null, $method = 102){
        $response = Grabbit::make($method, $query)->grab()->get(0);

        if($response && $response->has('gaia_id')){
            $this->loadUser($response);
        }

        return $this;
    }

    public static function byId($id){
        $user = (new User)->fetchUser($id);

        return $user;
    }

    public static function byEmail($email){
        $user = (new User)->fetchUser($email);
        $user->email = $email;

        return $user;
    }

    public static function byUsername($username){
        if($username === "3.14"){
            $username = "3-14";
        }
        $user = (new User)->fetchUser($username);

        return $user;
    }

    public static function bySid($session_id){
        $user = (new User)->fetchuser($session_id, 107);

        return $user;
    }

    public function getAquariumId(){
        if($this->id){
            $aquarium_id = Grabbit::make(6513, [$this->id])->grab()[0];
            if(is_numeric($aquarium_id) && $aquarium_id > 0){
                return $aquarium_id;
            }
        }

        return null;
    }
}