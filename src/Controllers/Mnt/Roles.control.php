<?php 
namespace Controllers\Mnt;

class Roles extends \Controllers\PublicController
{
    public function run() :void
    {
        $dataview = array();
        $dataview["items"] = \Dao\Mnt\Roles ::getAll();
        //\Views\Renderer::render("mnt/Roles", array());
        \Views\Renderer::render("mnt/roles", $dataview);
    }
}