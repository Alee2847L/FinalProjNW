<?php 
namespace Controllers\Mnt;

class Dispositivos extends \Controllers\PublicController
{
    public function run() :void
    {
        $dataview = array();
        $dataview["items"] = \Dao\Mnt\Dispositivos::getAll();
        \Views\Renderer::render("mnt/dispositivos", $dataview);
    }
}
