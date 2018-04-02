<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Plugins
 *
 * @author wilbertwl
 */

class Plugins extends AdminManager {
    public function CSS(){
        $C = $this->ReadPropertiesAllPlugins();
        $e = "";
        for ($i = 0; $i < count($C); $i++) {
            if($C[$i]["Type"] == "Theme" and (bool)$C[$i]["Active"] and $C[$i]["UrlCSS"]!= ""):
                $path =  $C[$i]['Folder']."/".$C[$i]['UrlCSS'];
                $e = $e."\n".(string)'<link href="'.Path_Plugins.$path.'" rel="stylesheet" />';
            endif;
        }
        return $e;
    }
    
    public function JS(){
        $C = $this->ReadPropertiesAllPlugins();
        $e = "";
        for ($i = 0; $i < count($C); $i++) {
            if($C[$i]["Type"] == "Theme" and (bool)$C[$i]["Active"] and $C[$i]["UrlJS"]!= ""):
                $path =  $C[$i]['Folder']."/".$C[$i]['UrlJS'];
                $e .= "\n".(string)'<script src="'.Path_Plugins.$path.'"></script>';
            endif;
        }
        return $e;
    }
    
    public function PluginCheck_DataAssing($param) {
        $arrayFormat = ["HTML" => "", "CSS" => "", "JS" => ""];
        for ($$i = 0; $$i < count($param); $$i++) {
            $arrayFormat[$i] = $param[$i];
        }
        return $arrayFormat;
    }
}
