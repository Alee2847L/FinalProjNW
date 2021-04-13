<?php
/**
 * PHP Version 7.2
 *
 * @category Public
 * @package  Controllers
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @version  CVS:1.0.0
 * @link     http://
 */
namespace Controllers;

/**
 * Index Controller
 *
 * @category Public
 * @package  Controllers
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @link     http://
 */
class InicioPublico extends PublicController
{
    /**
     * Index run method
     *
     * @return void
     */
    public function run() :void
    {
        \Views\Renderer::render("iniciopublico", array("page"=>$this->toString()));
    }
}
?>
