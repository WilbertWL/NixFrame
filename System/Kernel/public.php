<?php

    $Plugin = new Plugins();
    $MainMenu = new MainMenu();
    $DM = new DataManager();
    $PAGES = new Pages();
    $APP = new App();
    $GET = "U";
    
    if($PAGES->Active($GET)):
        $_Page = $PAGES->OpenPage($DM->U());        
    else:
        $_Page = $PAGES->DefaultPage();
    endif;

    
    $_BuildHTML = $DM->GetFileContents(PAGES."build_html.html");
    
$toHTML = array(
    "TITLE_WEBSITE"             => Website_Name,
    "OWNER_WEBSITE"             => Website_Owner,
    "URL_WEBSITE"               => Website_URL,
    "KEYWORDS"                  => 'Template Website',
    "INDEXABLE"                 => "",
    "AUTOR_WEBSITE"             => 'Wilbert Nuñez',
    "FRAMEWORK_APP"             => App_Name,
    "PAGE_LANG"                 => 'ES',
    "PLUGINS_CSS"               => $Plugin->CSS(),
    "PLUGINS_JS"                => $Plugin->JS(),
    "TOPMAIN"                   => $MainMenu->ApplyTopMain(),
    "BODYPAGE"                  => $_Page,
    "URL_FACEBOOK"              => Website_URL_Facebook,
    "URL_TWITTER"               => Website_URL_Twitter,
    "URL_LINKEDIN"              => Website_URL_Linkedin,
    "URL_INSTAGRAM"             => Website_URL_Instagram,
    "URL_YOUTUBE"               => Website_URL_Youtube,
    "COPYRIGHT"                 => "© ".date("Y")." Copyright:"
    );

foreach ($toHTML as $clave => $valor) {
    $_BuildHTML = str_replace('<!--['.$clave.']-->', $valor, $_BuildHTML);
}

print $_BuildHTML;