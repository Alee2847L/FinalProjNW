<?php 
namespace Controllers\Mnt;

class Servicios extends \Controllers\PrivateController
{
    public function run() :void
    {
        $dataview = array();
        $userId = \Utilities\Security::getUserId();
        $dataview["delete_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Servicios\Del"
        );
        $dataview["edit_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Servicios\Upd"
        );
        $dataview["new_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Servicios\New"
        );
        $dataview["items"] = \Dao\Mnt\Servicios::getAll();
        \Views\Renderer::render("mnt/servicios", $dataview);
    }
}
