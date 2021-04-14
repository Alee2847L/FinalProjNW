<?php 
namespace Controllers\Mnt;

class Venta extends \Controllers\PrivateController
{
    private $idventas = 0;
    private $usercodp = 0;
    private $idDispositivo = 0;
    private $idServicio = 0;
    private $precio = "";
    private $isv = "";
    private $total = "";
    private $fechaFact = "";

    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nueva Venta",
        "UPD" => "Editar %s %s",
        "DEL" => "Eliminar %s %s",
        "DSP" => "%s %s"
    );

    private $readonly = "";
    private $showaction= true;

    private $hasErrors = false;
    private $aErrors = array();

    public function run() :void
    {
        /*
        1) Verificamos si es un postback o un get
        2) si es un get simplemente obtenemos datos y mostramos datos
        3) si es un post
          3.1) validamos datos del post
          3.2) realizamos la acción segun el modo del post
          3.3) verificamos el resultado de la acción
            3.3.1) si hay errores mostramos los errores en pantalla
            3.3.2) si no hay errores, mostramos mensaje de exito
                    y redirigimos a la lista
         */
        $this->mode = isset($_GET["mode"])?$_GET["mode"]:"";
        $this->idventas = isset($_GET["idventas"])?$_GET["idventas"]:0;
        if (!$this->isPostBack()) {
            if ($this->mode !== "INS") {
                $this->_load();
            } else {
                $this->mode_dsc = $this->mode_adsc[$this->mode];
            }
        } else {
            $this->_loadPostData();
            if (!$this->hasErrors) {
                switch ($this->mode){
                case "INS":
                    if (\Dao\Mnt\Ventas::insert($this->idventas, $this->usercodp, $this->idDispositivo, $this->idServicio, $this->precio, $this->isv, $this->total, $this->fechaFact)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_ventas",
                            "¡Venta Agregada Satisfactoriamente!"
                        );
                    }
                    break;
                case "UPD":
                    if (\Dao\Mnt\Ventas::update($this->usercodp, $this->idDispositivo, $this->idServicio, $this->precio, $this->isv, $this->total, $this->fechaFact, $this->idventas)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_ventas",
                            "¡Venta Actualizada Satisfactoriamente!"
                        );
                    }
                    break;
                case "DEL":
                    if (\Dao\Mnt\Ventas::delete($this->idventas)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_ventas",
                            "¡Venta Eliminada Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("mnt/venta", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\Mnt\Ventas::getOne($this->idventas);
        if ($_data) {
            $this->idventas = $_data["idventas"];
            $this->usercodp = $_data["usercodp"];
            $this->idDispositivo = $_data["idDispositivo"];
            $this->idServicio = $_data["idServicio"];
            $this->precio = $_data["precio"];
            $this->isv = $_data["isv"];
            $this->total = $_data["total"];
            $this->fechaFact = $_data["fechaFact"];
            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->idventas = isset($_POST["idventas"]) ? $_POST["idventas"] : 0 ;
        $this->usercodp = isset($_POST["usercodp"]) ? $_POST["usercodp"] : 0 ;
        $this->idDispositivo = isset($_POST["idDispositivo"]) ? $_POST["idDispositivo"] : 0 ;
        $this->idServicio = isset($_POST["idServicio"]) ? $_POST["idServicio"] : 0 ;
        $this->precio = isset($_POST["precio"]) ? $_POST["precio"] : "" ;
        $this->isv = isset($_POST["isv"]) ? $_POST["isv"] : "" ;
        $this->total = isset($_POST["total"]) ? $_POST["total"] : "" ;
        $this->fechaFact = isset($_POST["fechaFact"]) ? $_POST["fechaFact"] : "" ;

        //validaciones
        //aplicar todas la reglas de negocio
        if (preg_match('/^\s*$/', $this->usercodp)) {
            $this->aErrors[] = "¡La Venta no puede ir vacia!";
        }
        //
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function _setViewData()
    {
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->idventas,
            $this->usercodp, 
            $this->idDispositivo, 
            $this->idServicio, 
            $this->precio, 
            $this->isv, 
            $this->total, 
            $this->fechaFact
        );
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}

?>
