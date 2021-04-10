<?php 
namespace Controllers\Mnt;

class Servicios extends \Controllers\PublicController
{
    public function run() :void
    {
        $dataview = array();
        $dataview["items"] = \Dao\Mnt\Servicios::getAll();
        \Views\Renderer::render("mnt/servicios", $dataview);
    }
}
