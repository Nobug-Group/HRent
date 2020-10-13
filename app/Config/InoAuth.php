<?php namespace Config;

class IonAuth extends \IonAuth\Config\IonAuth
{
    // set your specific config
     public $siteTitle                = 'hrent.local';       // Site Title, example.com
     public $adminEmail               = 'bruno.gl.higuera@gmail.com'; // Admin Email, admin@example.com
     public $emailTemplates           = 'App\\Views\\auth\\email\\';
}