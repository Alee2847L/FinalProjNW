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