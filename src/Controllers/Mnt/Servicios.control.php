<?php 
namespace Controllers\Mnt;

class Servicios extends \Controllers\PrivateController
{
    public function run() :void
    {
        $dataview = array();
        $dataview["items"] = \Dao\Mnt\Servicios::getAll();
        \Views\Renderer::render("mnt/servicios", $dataview);
    }
}
