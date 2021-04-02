<?php 
namespace Controllers\Mnt;

class Dispositivo extends \Controllers\PublicController
{
    private $idDispositivo = 0;
    private $nombre = "";
    private $marca = "";
    private $serie = "";
    private $categorias_idCategoria = "";
    private $precioUnitario = "";
    private $stock = "";

    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nuevo Dispositivo",
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
        $this->idDispositivo = isset($_GET["idDispositivo"])?$_GET["idDispositivo"]:0;
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
                    if (\Dao\Mnt\Dispositivos::insert($this->idDispositivo, $this->nombre, $this->marca, $this->serie, $this->categorias_idCategoria, $this->precioUnitario, $this->stock)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_dispositivos",
                            "Dispositivo Agregado Satisfactoriamente!"
                        );
                    }
                    break;
                case "UPD":
                    if (\Dao\Mnt\Dispositivos::update($this->nombre, $this->marca, $this->serie, $this->categorias_idCategoria, $this->precioUnitario, $this->stock, $this->idDispositivo)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_dispositivos",
                            "Dispositivo Actualizado Satisfactoriamente!"
                        );
                    }
                    break;
                case "DEL":
                    if (\Dao\Mnt\Dispositivos::delete($this->idDispositivo)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_dispositivos",
                            "Dispositivo Eliminado Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("mnt/dispositivo", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\Mnt\Dispositivos::getOne($this->idDispositivo);
        if ($_data) {
            $this->idDispositivo = $_data["idDispositivo"];
            $this->nombre = $_data["nombre"];
            $this->marca = $_data["marca"];
            $this->serie = $_data["serie"];
            $this->categorias_idCategoria = $_data["categorias_idCategoria"];
            $this->precioUnitario = $_data["precioUnitario"];
            $this->stock = $_data["stock"];
            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->idDispositivo = isset($_POST["idDispositivo"]) ? $_POST["idDispositivo"] : 0 ;
        $this->nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "" ;
        $this->marca = isset($_POST["marca"]) ? $_POST["marca"] :  "" ;
        $this->serie = isset($_POST["serie"]) ? $_POST["serie"] :  "" ;
        $this->categorias_idCategoria = isset($_POST["categorias_idCategoria"]) ? $_POST["categorias_idCategoria"] :  "" ;
        $this->precioUnitario = isset($_POST["precioUnitario"]) ? $_POST["precioUnitario"] :  "" ;
        $this->stock = isset($_POST["stock"]) ? $_POST["stock"] :  "" ;

        //validaciones
        //aplicar todas la reglas de negocio
        if (preg_match('/^\s*$/', $this->nombre)) {
            $this->aErrors[] = "¡El Dispositivo no puede ir vacia!";
        }
        //
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function _setViewData()
    {
        $this->categorias_idCategoria_Movil = ($this->categorias_idCategoria === "01") ? "selected" : "";
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->idDispositivo,
            $this->nombre,
            $this->marca,
            $this->serie,
            $this->precioUnitario,
            $this->stock
        );
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}

?>
