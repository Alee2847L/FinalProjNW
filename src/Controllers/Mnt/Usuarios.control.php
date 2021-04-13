<?php 
namespace Controllers\Mnt;

class Usuarios extends \Controllers\PrivateController
{
    public function run() :void
    {
        $dataview = array();
        $dataview["items"] = \Dao\Mnt\Usuarios::getAll();
        //\Views\Renderer::render("mnt/Usuarios", array());
        \Views\Renderer::render("mnt/usuarios", $dataview);
    }
}