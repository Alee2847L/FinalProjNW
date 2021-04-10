<?php 
namespace Controllers\Mnt;

class Proveedor extends \Controllers\PublicController
{
    private $idProveedor = 0;
    private $nombreProveedor = "";
    private $correoProveedor = "";
    private $numeroProveedor = "";
    private $direccionProveedor = "";

    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nuevo Proveedor",
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
        $this->idProveedor = isset($_GET["idProveedor"])?$_GET["idProveedor"]:0;
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
                    if (\Dao\Mnt\Proveedores::insert($this->idProveedor, $this->nombreProveedor, $this->correoProveedor, $this->numeroProveedor, $this->direccionProveedor)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_proveedores",
                            "¡Proveedor Agregado Satisfactoriamente!"
                        );
                    }
                    break;
                case "UPD":
                    if (\Dao\Mnt\Proveedores::update($this->idProveedor, $this->nombreProveedor, $this->correoProveedor, $this->numeroProveedor, $this->direccionProveedor)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_proveedores",
                            "¡Proveedor Agregado Satisfactoriamente!"
                        );
                    }
                    break;
                case "DEL":
                    if (\Dao\Mnt\Proveedores::delete($this->idProveedor)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_proveedores",
                            "¡Proveedor Eliminada Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("mnt/proveedor", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\Mnt\Proveedores::getOne($this->idProveedor);
        if ($_data) {
            $this->idProveedor = $_data["idProveedor"];
            $this->nombreProveedor = $_data["nombreProveedor"];
            $this->correoProveedor = $_data["correoProveedor"];
            $this->numeroProveedor = $_data["numeroProveedor"];
            $this->direccionProveedor = $_data["direccionProveedor"];
            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->idProveedor = isset($_POST["idProveedor"]) ? $_POST["idProveedor"] : 0 ;
        $this->nombreProveedor = isset($_POST["nombreProveedor"]) ? $_POST["nombreProveedor"] : "" ;
        $this->correoProveedor = isset($_POST["correoProveedor"]) ? $_POST["correoProveedor"] : "" ;
        $this->numeroProveedor = isset($_POST["numeroProveedor"]) ? $_POST["numeroProveedor"] : "" ;
        $this->direccionProveedor = isset($_POST["direccionProveedor"]) ? $_POST["direccionProveedor"] : "" ;

        //validaciones
        //aplicar todas la reglas de negocio
        if (preg_match('/^\s*$/', $this->nombreProveedor)) {
            $this->aErrors[] = "¡El Proveedor no puede ir vacio!";
        }
        //
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function _setViewData()
    {
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->idProveedor,
            $this->nombreProveedor,
            $this->correoProveedor,
            $this->numeroProveedor,
            $this->direccionProveedor
        );
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}

?>
