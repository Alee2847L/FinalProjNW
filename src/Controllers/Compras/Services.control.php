<?php 
namespace Controllers\Compras;

class Services extends \Controllers\PublicController
{
    public function run() :void
    {
        $dataview = array();
        $dataview["items"] = \Dao\Compras\Services::getAll();
        \Views\Renderer::render("compras/services", $dataview);
    }
}