<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Encrypt
 *
 * @author Administrador
 */
class Encrypt {
    public function Encode($string) {
        $data = base64_encode($string);
        $e = str_replace(array('+','/','='),array('-','_',''),$data);
        return $e;
    }

    public function Decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }
}
