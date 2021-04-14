<?php 
namespace Controllers\Mnt;

class Proveedores extends \Controllers\PrivateController
{
    public function run() :void
    {
        $dataview = array();
        $userId = \Utilities\Security::getUserId();
        $dataview["delete_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Proveedores\Del"
        );
        $dataview["edit_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Proveedores\Upd"
        );
        $dataview["new_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Proveedores\New"
        );
        $dataview["items"] = \Dao\Mnt\Proveedores::getAll();
        \Views\Renderer::render("mnt/proveedores", $dataview);
    }
}
