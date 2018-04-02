<?php
    require_once './System/kernel.php';
    $l = new LoginManager();
    $DM = new DataManager();
    if($l->Dir()):
        $DM->IncludeFile(KERNEL."manager.php"); 
    else: 
        $DM->IncludeFile(KERNEL."public.php");
    endif;