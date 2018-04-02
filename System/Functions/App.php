<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of App
 *
 * @author wilbertwl
 */
class App extends AdminManager{
    
    public function APP_Name (){ return $this->ReadPropertiesApp()["App_Name"]; }
    public function APP_Version (){ return $this->ReadPropertiesApp()["App_Version"]; }
    
    public function Website_AdminDir (){ return $this->ReadPropertiesApp()["AdminDirectory"]; }
    
    public function Website_Name (){ return $this->ReadPropertiesApp()["Website_Name"]; }
    public function Website_Description (){ return $this->ReadPropertiesApp()["Website_Description"]; }
    public function Website_Shortname (){ return $this->ReadPropertiesApp()["Website_Shortname"]; }
    //public function Website_URL (){ return $this->ReadPropertiesApp()["Website_URL"]; }
    public function Website_Owner (){ return $this->ReadPropertiesApp()["Website_Owner"]; }
    
    public function Website_SocialUrl_Facebook (){ return $this->ReadPropertiesApp()["Website_SocialUrl_Facebook"]; }
    public function Website_SocialUrl_Twitter (){ return $this->ReadPropertiesApp()["Website_SocialUrl_Twitter"]; }
    public function Website_SocialUrl_Linkedin (){ return $this->ReadPropertiesApp()["Website_SocialUrl_Linkedin"]; }
    public function Website_SocialUrl_Instagram (){ return $this->ReadPropertiesApp()["Website_SocialUrl_Instagram"]; }
    public function Website_SocialUrl_Youtube (){ return $this->ReadPropertiesApp()["Website_SocialUrl_Youtube"]; }
    
    public function newProperties(){
        $e = new Encrypt();
        $dataNew = $e->Encode($this->GetFileContents(SYS_CONFIG."AppTest.json"));
        $this->UpdatePropertiesApp($dataNew);
    }
    
    private function UpdatePropertiesApp($dataNew){
        $e = new Encrypt();
        // $dataNew = $e->Encode($this->GetFileContents(SYSCONFIG."AppTest.json"));
        $x = 1;
        $a1 = "";
        for ($i = 0; $i < strlen($dataNew); $i++) {
            if(($i/(80*$x))==1):
                $a1 .="\n";
                $x++;
            endif;
            $a1 .= $dataNew[$i];
        }
        file_put_contents(SYS_CONFIG."App.properties", $a1);
    }

    private function ReadPropertiesApp(){
        $e = new Encrypt();
        if($this->GetFileContents(SYS_CONFIG."App.properties", TRUE)):
            $a = str_replace("\n", "", $this->GetFileContents(SYS_CONFIG."App.properties"));
            return json_decode($e->Decode($a), TRUE);
        endif;
    }
}
