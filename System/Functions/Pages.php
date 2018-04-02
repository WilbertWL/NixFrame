<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pages
 *
 * @author Administrador
 */

class Pages extends AdminManager {
    
# Funciones Admin-Manager  ---------------------------------------
    public function Manager_CurrentPage_Descript(){ return $this->Manager_CurrentPage("Descrip"); }
    public function Manager_CurrentPage_Folder(){ return $this->Manager_CurrentPage("Folder"); }
    public function Manager_CurrentPage_CSS(){ 
        $css = $this->Manager_CurrentPage("UrlCSS");
        $e ="";
        if($css!=""):
            $file = str_split($css, ";");
            foreach ($file as $value) {
                if($value!=""):
                    $e .= '\n'.'<link href="'.Path_Plugins.$this->Manager_CurrentPage('Folder').$value.'" rel="stylesheet" />';
                endif;
            }
        endif;
        return $e!=""? $e : "";
    }
    public function Manager_CurrentPage_JS(){
        $js = $this->Manager_CurrentPage("UrlJS"); 
        $e ="";
        if($js!=""):
            $file = str_split($js, ";");
            foreach ($file as $value) {
                if($value!=""):
                    $e .= "\n".(string)'<script src="'.Path_Plugins.$this->Manager_CurrentPage('Folder').$value.'"></script>';
                endif;
            }
        endif;
        return $e!=""? $e : "";
    }
    
    public function Manager_CurrentPage_HTML(){
        $e ="";
        return $e!=""? $e :"Not Found";
    }

    public function Manager_CurrentPage_WindowPlugin_Config(){ 
        return $this->IncludeFile(PLUGINS.$this->Manager_CurrentPage_Folder()."/".$this->Manager_CurrentPage("FileName"));        
    }
        
    public function Manager_CurrentPage_Exist(){ 
        $DataPage = FALSE;
        if($this->O(TRUE)):
            $C = $this->ReadPropertiesAllPlugins();
            for ($i = 0; $i < count($C); $i++) {
                if($C[$i]["Type"] == "Plugin" and $C[$i]["NameURL"] == $this->O()):
                    $DataPage = TRUE;
                endif;
            }
        endif;
        return $DataPage;
    }
    
    private function Manager_CurrentPage($data){
        $DataPage = "";
        if($this->O(TRUE)):
            $C = $this->ReadPropertiesAllPlugins();
            for ($i = 0; $i < count($C); $i++) {
                if($C[$i]["Type"] == "Plugin" and $C[$i]["NameURL"] == $this->O()):
                    $DataPage = $C[$i][$data];
                endif;
            }
        endif;
        return $DataPage;
    }
# Funciones Admin-Manager  ---------------------------------------
    
    
    
    
    private function PagesSite(){
        $pagesWebsite = json_decode(parent::GetFileContents(PAGES."Pages.json"), TRUE);
        return $pagesWebsite;
    }
    
    public function DefaultPage(){
        $pagesWebsite = $this->PagesSite();
        for ($i = 0; $i < count($pagesWebsite); $i++) {
            if($pagesWebsite[$i]["Default"]):
                return $pagesWebsite[$i]["Name"];
            else:
                return "Internal Error: Pagina por defecto no asignada";
            endif;
        }
    }
    
    public function OpenPage($page){
        $e = "<div class='jumbotron'><h1 class='display-4 text-center'>Page Not Found</h1></div><br />\n";
        if($this->PageExist($page)):
            $e = $page;
        endif;
        return $e;
    }
    
    public function PageExist($page){
        $e = FALSE;
        for ($i = 0; $i < count($this->PagesSite()); $i++) {
            if($this->PagesSite()[$i]["Name"] == $page):
                $e = TRUE;
                $i = count($this->PagesSite());
            endif;
        }
        return $e;
    }
    
    # Admin Manager ------------------------------------------------------
    
   

}