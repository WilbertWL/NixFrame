                                                                                                                                                                                                                                                                                              <?php
$manager = new AdminManager();
$DM = new DataManager();
$Plugin = new Plugins();
$MainMenu = new MainMenu();
$PAGE = new Pages();
$e = new Encrypt();
$_Page = "";


$_currentMainMenu = $PAGE->Manager_CurrentPage_Descript();

$_BuildHTML = $DM->GetFileContents("./".PAGES."Dashboard2.html");
    
$toHTML = array(
    "TITLE_WEBSITE"             => Website_Name,
    "OWNER_WEBSITE"             => Website_Owner,
    "URL_WEBSITE"               => Website_URL,
    "KEYWORDS"                  => 'Template Website',
    "INDEXABLE"                 => "",
    "AUTOR_WEBSITE"             => 'Wilbert Nuñez',
    "FRAMEWORK_APP"             => App_Name,
    "PAGE_LANG"                 => 'ES',
    "PLUGINS_CSS"               => $Plugin->CSS()."\n".$PAGE->Manager_CurrentPage_CSS(),
    "PLUGINS_JS"                => $Plugin->JS()."\n".$PAGE->Manager_CurrentPage_JS(),
    "TOPMAIN"                   => $MainMenu->ApplyTopMain(),
    "CONTENS_MANAGER"           => $PAGE->Manager_CurrentPage_JS(),
    "CURRENT_MAINMENU"          => $_currentMainMenu,
    "URL_FACEBOOK"              => Website_URL_Facebook,
    "URL_TWITTER"               => Website_URL_Twitter,
    "URL_LINKEDIN"              => Website_URL_Linkedin,
    "URL_INSTAGRAM"             => Website_URL_Instagram,
    "URL_YOUTUBE"               => Website_URL_Youtube,
    "COPYRIGHT"                 => "© ".date("Y")." Copyright:",
    "MAINMENU"                  => $manager->MainMenu()
    );

foreach ($toHTML as $clave => $valor) {
    $_BuildHTML = str_replace('<!--['.$clave.']-->', $valor, $_BuildHTML);
}

print $_BuildHTML;

