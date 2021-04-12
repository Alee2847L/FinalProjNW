<?php 
namespace Controllers\Mnt;

class Proveedores extends \Controllers\PublicController
{
    public function run() :void
    {
        $dataview = array();
        $dataview["items"] = \Dao\Mnt\Proveedores::getAll();
        \Views\Renderer::render("mnt/proveedores", $dataview);
    }
}
