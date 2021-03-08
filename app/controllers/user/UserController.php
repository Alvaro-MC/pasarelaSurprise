<?php

require_once '../../baseClass/CriptoString.php';
require_once '../../model/UserModel.php';

class UserController{
    private $user;

    function __construct(){
        $this->user = new UserModel;
    }

    function changePassword($user, $newpass){
        return $this->user->changePassword($user,$newpass);
    }
}
