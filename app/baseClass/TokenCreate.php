<?php

class TokenCreate{

    function getToken16(){
        return substr(md5(rand()), 0, 30);
    }
}