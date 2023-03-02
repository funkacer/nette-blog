<?php

namespace App\Models;

class MujAuthenticator implements \Nette\Security\IAuthenticator
{
    //public $url_config;
    
    function __construct() {
        //$this->url_config = $url;
    }
    
    public function authenticate(array $credentials): \Nette\Security\IIdentity {                                        
        
        $userData = [
            'username' => $credentials[0],
            'password' => $credentials[1]
        ];
        
        $users = [
            ['username' => 'jirka',
            'password' => 'sirka'],
            ['username' => 'admin',
            'password' => 'secret']
        ];

        foreach($users as $user) {
            if ($userData['username'] == $user['username'] && $userData['password'] != $user['password']){
                throw new \Nette\Security\AuthenticationException("Nasprosto nesprávné přihlášení");            
            }
        }
        
        // id je vždycky 1...
        return new \Nette\Security\Identity(1, null, $userData);
    }        
}