<?php 
namespace Controllers\Mnt;

class Usuarios extends \Controllers\PrivateController
{
    public function run() :void
    {
        $dataview = array();
        $userId = \Utilities\Security::getUserId();
        $dataview["delete_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Usuarios\Del"
        );
        $dataview["edit_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Usuarios\Upd"
        );
        $dataview["new_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Usuarios\New"
        );
        $dataview["items"] = \Dao\Mnt\Usuarios::getAll();
        //\Views\Renderer::render("mnt/Usuarios", array());
        \Views\Renderer::render("mnt/usuarios", $dataview);
    }
}