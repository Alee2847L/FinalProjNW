<?php 
namespace Controllers\Mnt;

class Dispositivos extends \Controllers\PrivateController
{
    public function run() :void
    {
        $dataview = array();
        $userId = \Utilities\Security::getUserId();
        $dataview["delete_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Categorias\Del"
        );
        $dataview["edit_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Categorias\Upd"
        );
        $dataview["new_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Categorias\New"
        );
        $dataview["items"] = \Dao\Mnt\Dispositivos::getAll();
        \Views\Renderer::render("mnt/dispositivos", $dataview);
    }
}
