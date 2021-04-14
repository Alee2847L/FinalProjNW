<?php 
namespace Controllers\Mnt;

class Servicio extends \Controllers\PrivateController
{
    private $idServicio = 0;
    private $usuarios_idUsuario = 0;
    private $dispositivos_idDispositivo = 0;
    private $nombreServicio = "";
    private $tipoServicio = "";
    private $descripcionServicio = "";
    private $precioServicio = "";
    private $ciudades_idCiudad = 0;

    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nueva Categoría",
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
        $this->idServicio = isset($_GET["idServicio"])?$_GET["idServicio"]:0;
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
                    if (\Dao\Mnt\Servicios::insert($this->idServicio, $this->usuarios_idUsuario, $this->dispositivos_idDispositivo, $this->nombreServicio, $this->tipoServicio, $this->descripcionServicio, $this->precioServicio, $this->ciudades_idCiudad)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_atenciones",
                            "¡Atencion Agregada Satisfactoriamente!"
                        );
                    }
                    break;
                case "UPD":
                    if (\Dao\Mnt\Servicios::update($this->usuarios_idUsuario, $this->dispositivos_idDispositivo, $this->nombreServicio, $this->tipoServicio, $this->descripcionServicio, $this->precioServicio, $this->ciudades_idCiudad,$this->idServicio)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_atenciones",
                            "¡Atencion Actualizada Satisfactoriamente!"
                        );
                    }
                    break;
                case "DEL":
                    if (\Dao\Mnt\Servicios::delete($this->idServicio)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_atenciones",
                            "¡Atencion Eliminada Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("mnt/atencion", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\Mnt\Servicios::getOne($this->idServicio);
        if ($_data) {
            $this->idServicio = $_data["idServicio"];
            $this->usuarios_idUsuario = $_data["usuarios_idUsuario"];
            $this->dispositivos_idDispositivo = $_data["dispositivos_idDispositivo"];
            $this->nombreServicio = $_data["nombreServicio"];
            $this->tipoServicio = $_data["tipoServicio"];
            $this->descripcionServicio = $_data["descripcionServicio"];
            $this->precioServicio = $_data["precioServicio"];
            $this->ciudades_idCiudad = $_data["ciudades_idCiudad"];
            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->idServicio = isset($_POST["idServicio"]) ? $_POST["idServicio"] : 0 ;
        $this->usuarios_idUsuario = isset($_POST["usuarios_idUsuario"]) ? $_POST["usuarios_idUsuario"] : 0 ;
        $this->dispositivos_idDispositivo = isset($_POST["dispositivos_idDispositivo"]) ? $_POST["dispositivos_idDispositivo"] : 0 ;
        $this->nombreServicio = isset($_POST["nombreServicio"]) ? $_POST["nombreServicio"] : "" ;
        $this->tipoServicio = isset($_POST["tipoServicio"]) ? $_POST["tipoServicio"] : "" ;
        $this->descripcionServicio = isset($_POST["descripcionServicio"]) ? $_POST["descripcionServicio"] : "" ;
        $this->precioServicio = isset($_POST["precioServicio"]) ? $_POST["precioServicio"] : "" ;
        $this->ciudades_idCiudad = isset($_POST["ciudades_idCiudad"]) ? $_POST["ciudades_idCiudad"] : 0 ;

        //validaciones
        //aplicar todas la reglas de negocio
        if (preg_match('/^\s*$/', $this->nombreServicio)) {
            $this->aErrors[] = "El Servicio no puede ir vacio!";
        }
        //
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function _setViewData()
    {
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->idServicio,
            $this->usuarios_idUsuario,
            $this->dispositivos_idDispositivo,
            $this->nombreServicio,
            $this->tipoServicio,
            $this->descripcionServicio,
            $this->precioServicio,
            $this->ciudades_idCiudad
        );
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}

?>
