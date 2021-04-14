<?php 
namespace Controllers\Compras;

class Devices extends \Controllers\PublicController
{
    public function run() :void
    {
        $dataview = array();
        $dataview["items"] = \Dao\Compras\Devices::getAll();
        \Views\Renderer::render("compras/devices", $dataview);
    }
}
