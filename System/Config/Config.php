<?php
    $app = new App();
    
    define("App_Name",              $app->APP_Name());
    define("App_Version",           $app->APP_Version());
    define("APP_AdminDir",          $app->Website_AdminDir());
    
    define("Website_URL",           "http://".$_SERVER['HTTP_HOST']."/Nix/");
    
    define("Path_Plugins",          Website_URL.PLUGINS);
    define("CURRERNT_PLUGIN",       $app->CurrentPlugin_Directory());
    
    define("Website_Name",          $app->Website_Name());
    define("Website_Description",   $app->Website_Description());
    define("Website_Shortname",     $app->Website_Shortname());
    
    define("Website_Owner",         $app->Website_Owner());
    
    define("Website_URL_Facebook",          $app->Website_SocialUrl_Facebook());
    define("Website_URL_Linkedin",          $app->Website_SocialUrl_Linkedin());
    define("Website_URL_Twitter",           $app->Website_SocialUrl_Twitter());
    define("Website_URL_Instagram",         $app->Website_SocialUrl_Instagram());
    define("Website_URL_Youtube",           $app->Website_SocialUrl_Youtube());
    