<?php

namespace Controllers\Checkout;

use Controllers\PublicController;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class Checkout extends PublicController{
    private $username="";
    Private $precioUnitario=0;
    private $serie="";
    private $idDispositivo=0;
    private $categorias_idCategoria="";

    
    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nuevo Dispositivo",
        "UPD" => "Editar %s %s",
        "DEL" => "Eliminar %s %s",
        "DSP" => "%s %s"
    );


    public function run():void
    {
        $this->mode = isset($_GET["mode"])?$_GET["mode"]:"";
        $this->idDispositivo = isset($_GET["idDispositivo"])?$_GET["idDispositivo"]:0;
        try {
            if ($this->mode == "INS") {
                $this->_load();
            } else {
                $this->mode_dsc = $this->mode_adsc[$this->mode];
            }
        $viewData = array();
        if ($this->isPostBack()) {
            $PayPalOrder = new \Utilities\Paypal\PayPalOrder(
                "test".(time() - 10000000),
                "http://localhost/mvco/index.php?page=checkout_error",
                "http://localhost/mvco/index.php?page=checkout_accept"
            );
            $PayPalOrder->addItem("Test1", $this->serie, "PRD1", $this->precioUnitario, 7.5, 1, "DIGITAL_GOODS");
            $response = $PayPalOrder->createOrder();
            $_SESSION["orderid"] = $response[1]->result->id;
            \Utilities\Site::redirectTo($response[0]->href);
            die();
        }

        \Views\Renderer::render("paypal/checkout", $viewData);
    }catch(Exception $error){
        var_dump($error);
    }
    }

    private function _load()
    {
        $_data = \Dao\Mnt\Dispositivos::getOne($this->idDispositivo);
        if ($_data) {
            $this->idDispositivo = $_data["idDispositivo"];
            $this->serie = $_data["serie"];
            $this->categorias_idCategoria = $_data["categorias_idCategoria"];
            $this->precioUnitario = $_data["precioUnitario"];
        }
    }   

    private function _setViewData()
    {
        $this->categorias_idCategoria_Movil = ($this->categorias_idCategoria === "01") ? "selected" : "";
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->idDispositivo,
            $this->precioUnitario,
        );
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}
?>