<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MainMenu
 *
 * @author Administrador
 */
class MainMenu extends DataManager{
    function SubMain($_item){
        $e = "";
        $ActiveMenu = json_decode(parent::GetFileContents(MAINMENU."ActiveMain.json"), true);
        $BuildTheme = json_decode(parent::GetFileContents(PLUGINS.(string)$ActiveMenu["TopMain"]["Theme"]."/Build.json"), true);
        foreach ($_item as $item => $value) {
            if(!(bool)$value["SubMain"]):
                $TMP = "\n".str_replace('{VALUE}', $item, (string)$BuildTheme["TopMain"][(string)$ActiveMenu["TopMain"]["Style"]][$value["Type"]]);
                $TMP = "\n".str_replace('{URL}', $value["Link"], $TMP);
                $e .=$TMP;
            endif;
        }
        return $e;
    }


    public function ApplyTopMain(){
        $menu = "";
        $MainMenu = json_decode(parent::GetFileContents(MAINMENU."Main.json"), true);
        $ActiveMenu = json_decode(parent::GetFileContents(MAINMENU."ActiveMain.json"), true);
        
        // $estructereMenu = $MainMenu[$ActiveMenu["Name"]];
        
        if($ActiveMenu["TopMain"]["Active"]):
            $BuildTheme = json_decode(parent::GetFileContents(PLUGINS.(string)$ActiveMenu["TopMain"]["Theme"]."/Build.json"), true);
            $menu .= $BuildTheme["TopMain"][(string)$ActiveMenu["TopMain"]["Style"]]["Open"];
            
            $menu .= $this->SubMain($MainMenu[$ActiveMenu["TopMain"]["Name"]]);
            
            $menu .= $BuildTheme["TopMain"][(string)$ActiveMenu["TopMain"]["Style"]]["Close"];
        endif;
        return (string)$menu;
    }
}
