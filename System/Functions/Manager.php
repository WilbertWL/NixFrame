<?php

/**
 * Description of AdminManager
 *
 * @author WL
 */

class AdminManager extends DataManager{
    
    public function __construct(){
        $this->UpdatePropertiesManagerItemMainMenu();
    }
    
    // Imprime todo el Sider Menu del Manager
    public function MainMenu(){
        $C = $this->ReadPropertiesAllPlugins();
        $data = "";
        for ($i = 0; $i < count($C); $i++) {
            ($this->O() == $C[$i]["NameURL"])? $state = "active" : $state = "";
            $Default_Main = '<li class="nav-item"><a class="nav-link $state" href="'.Website_URL.APP_AdminDir.'/[-NameURL-]">[-Name-]</a></li>';
            if($C[$i]["Type"] == "Plugin" and (bool)$C[$i]["Active"] and (bool)$C[$i]["AccessMainMenu"]):
                foreach ($C[$i] as $key => $DataValue) {
                    $Default_Main = str_replace("[-".$key."-]", $DataValue, $Default_Main);
                }
                $data .=$Default_Main;
            endif;
        }
        return $data;
    }
    // Re-escribe 
    public function UpdatePropertiesManagerItemMainMenu(){
        $e = new Encrypt();
        $dataNew = $e->Encode($this->GetFileContents(SYS_CONFIG."Plugins.json"));
        $x = 1;
        $a1 = "";
        for ($i = 0; $i < strlen($dataNew); $i++) {
            if(($i/(80*$x))==1):
                $a1 .="\n";
                $x++;
            endif;
            $a1 .= $dataNew[$i];
        }
        file_put_contents(SYS_CONFIG."Plugins.properties", $a1);
    }
    public function CurrentPlugin_Directory(){
        $C = $this->ReadPropertiesAllPlugins();
        $DataPage = "";
        for ($i = 0; $i < count($C); $i++) {
            if($C[$i]["Type"] == "Plugin" and $C[$i]["NameURL"] == $this->O()):
                $DataPage = PLUGINS."/".$C[$i]["Folder"]."/";
            endif;
        }
        return $DataPage;
    }
    
    public function ReadPropertiesAllPlugins(){
        $e = new Encrypt();
        if($this->GetFileContents(SYS_CONFIG."Plugins.properties", TRUE)):
            $a = str_replace("\n", "", $this->GetFileContents(SYS_CONFIG."Plugins.properties"));
            return json_decode($e->Decode($a), TRUE);
        endif;
    }
}