<?php

require 'autoload.php';

session_start();
class Controller extends users
{
    public function __construct()
    {

        $this->DefaultAvatarUser();
        
    }
}

new Controller;
