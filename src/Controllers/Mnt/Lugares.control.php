<?php 
namespace Controllers\Mnt;

class Lugares extends \Controllers\PublicController
{
    public function run() :void
    {
        $dataview = array();
        $dataview["items"] = \Dao\Mnt\Lugares::getAll();
        \Views\Renderer::render("mnt/lugares", $dataview);
    }
}
