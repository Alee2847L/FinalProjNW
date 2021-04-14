<?php 
namespace Controllers\Mnt;

class Ventas extends \Controllers\PrivateController
{
    public function run() :void
    {
        $dataview = array();
        $userId = \Utilities\Security::getUserId();
        $dataview["delete_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Ventas\Del"
        );
        $dataview["edit_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Ventas\Upd"
        );
        $dataview["new_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Ventas\New"
        );
        $dataview["items"] = \Dao\Mnt\Ventas::getAll();
        \Views\Renderer::render("mnt/ventas", $dataview);
    }
}
