<?php 
namespace Controllers\Mnt;

class Ventas extends \Controllers\PrivateController
{
    public function run() :void
    {
        $dataview = array();
        $dataview["items"] = \Dao\Mnt\Ventas::getAll();
        \Views\Renderer::render("mnt/ventas", $dataview);
    }
}
