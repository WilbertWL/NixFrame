<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$DM = new DataManager();
$_BuildHTML = $DM->GetFileContents(CURRERNT_PLUGIN."form.html");
   
$toHTML = array(
    "NAMEWEBSITE"               => Website_Name,
    "URL_WEBSITE"               => Website_URL,
    "ADMINDIRECTORY"            => APP_AdminDir,
    "CURRENTDIR"                => CURRERNT_PLUGIN
    );

foreach ($toHTML as $clave => $valor) {
    $_BuildHTML = str_replace('[-'.$clave.'-]', $valor, $_BuildHTML);
}
$_BuildJS = "";
$_BuildCSS = "";

$e = ["HTML" => $_BuildHTML, "JS" => $_BuildJS, "CSS" => $_BuildCSS];

return $e;