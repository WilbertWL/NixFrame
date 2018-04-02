<?php

session_start();
# System URL   -----------------------------------------------------------------
    const FUNCTION_BIN  = './System/Functions/';
    const KERNEL        = './System/Kernel/';
    const SYS_CONFIG     = './System/Config/';
    const SYS_PAGES      = './System/Pages/';
    
    const CONFIG        = 'Contens/Config/';
    const MAINMENU      = 'Contens/Config/MainMenu/';
    const PAGES         = 'Contens/Pages/';
    const PLUGINS       = 'Contens/Themes/';
    const IMAGES        = 'Contens/Images/';

# Conexiones   -----------------------------------------------------------------
# Load  ------------------------------------------------------------------------
# Fuciones  --------------------------------------------------------------------
    
    
    require_once FUNCTION_BIN.'DataManager.php';
    require_once FUNCTION_BIN.'Manager.php';
    require_once FUNCTION_BIN.'App.php';
    require_once FUNCTION_BIN.'Encrypt.php';
    require_once FUNCTION_BIN.'Pages.php';
    require_once FUNCTION_BIN.'Plugins.php';
    require_once FUNCTION_BIN.'MainMenu.php';
    require_once FUNCTION_BIN.'LoginManager.php';

# Configurations files   -------------------------------------------------------
    require_once SYS_CONFIG.'Config.php';
    $_Manager = new AdminManager();
# Modulos   --------------------------------------------------------------------
# Clases   ---------------------------------------------------------------------
# Detalles de la APP  ----------------------------------------------------------
    const APP_KEYWORD       = "TMP tmp Template";
    const APP_AUTOR         = "Ing. Wilbert N.";
    const APP_AUTOR_MAIL    = "w.lbertjose@gmail.com";
    const APP_AUTOR_WEBSITE = "http://gosuresuccess.com.ve";
   