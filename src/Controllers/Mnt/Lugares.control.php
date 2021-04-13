<?php 
namespace Controllers\Mnt;

class Lugares extends \Controllers\PrivateController
{
    public function run() :void
    {
        $dataview = array();
        $userId = \Utilities\Security::getUserId();
        $dataview["delete_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Lugares\Del"
        );
        $dataview["edit_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Lugares\Upd"
        );
        $dataview["new_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Lugares\New"
        );
        $dataview["items"] = \Dao\Mnt\Lugares::getAll();
        \Views\Renderer::render("mnt/lugares", $dataview);
    }
}
