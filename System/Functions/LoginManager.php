<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginManager
 *
 * @author Administrador
 */
class LoginManager extends DataManager {
    public function Dir(){
        $app = new App();
        if($this->U() == $app->Website_AdminDir()):
            return TRUE; 
        else:
            return FALSE;
        endif;
    }
}
