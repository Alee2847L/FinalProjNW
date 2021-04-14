<?php 
namespace Controllers\Compras;

class Carrito extends \Controllers\PublicController
{
    public function run() :void
    {
        $dataview = array();
        $dataview["items"] = \Dao\Compras\Carrito::getAll();
        \Views\Renderer::render("compras/carrito", $dataview);
    }
}
