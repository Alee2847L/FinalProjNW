<?php

namespace Utilities;

class Nav {

    public static function setNavContext(){
        $tmpNAVIGATION = array();
        $userID = \Utilities\Security::getUserId();
        if (\Utilities\Security::isAuthorized($userID, "Mntdisp")) {
            $tmpNAVIGATION[] = array(
                "nav_url"=>"index.php?page=disp",
                "nav_label"=>"Dispositivos"
            );
        }
        if (\Utilities\Security::isAuthorized($userID, "MntServ")) {
            $tmpNAVIGATION[] = array(
                "nav_url"=>"index.php?page=serv",
                "nav_label"=>"Servicios"
            );
        }
        if (\Utilities\Security::isAuthorized($userID, "MnUsuarios")) {
            $tmpNAVIGATION[] = array(
                "nav_url"=>"index.php?page=mnt_usuarios",
                "nav_label"=>"Usuarios"
            );
        }
        if (\Utilities\Security::isAuthorized($userID, "Mncheckout")) {
            $tmpNAVIGATION[] = array(
                "nav_url"=>"index.php?page=checkout_checkout",
                "nav_label"=>"placer order"
            );
        }
        \Utilities\Context::setContext("NAVIGATION", $tmpNAVIGATION);
    }


    private function __construct()
    {
        
    }
    private function __clone()
    {
        
    }
}
?>