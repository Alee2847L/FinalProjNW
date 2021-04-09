<?php 
namespace Controllers\Mnt;

class Funcion extends \Controllers\PublicController
{
    private $fncod = 0;
    private $fndsc = "";
    private $fnest = "";
    private $fnest_ACT = "";
    private $fnest_INA = "";
    private $fnest_PLN = "";

    private $fntyp = "";
    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nueva Funcion",
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
        $this->fncod = isset($_GET["fncod"])?$_GET["fncod"]:0;
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
                    if (\Dao\Mnt\Funciones::insert($this->fndsc, $this->fnest,$this->fntyp)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_funciones",
                            "¡funcion Agregada Satisfactoriamente!"
                        );
                    }
                    break;
                case "UPD":
                    if (\Dao\Mnt\Funciones::update($this->fndsc, $this->fnest,$this->fntyp, $this->fncod)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_funciones",
                            "¡funcion Actualizada Satisfactoriamente!"
                        );
                    }
                    break;
                case "DEL":
                    if (\Dao\Mnt\Funciones::delete($this->fncod)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_funciones",
                            "¡funcion Eliminada Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("mnt/funcion", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\Mnt\Funciones::getOne($this->fncod);
        if ($_data) {
            $this->fncod = $_data["fncod"];
            $this->fndsc = $_data["fndsc"];
            $this->fnest = $_data["fnest"];
            $this->fntyp = $_data["fntyp"];
            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->fncod = isset($_POST["fncod"]) ? $_POST["fncod"] : 0 ;
        $this->fndsc = isset($_POST["fndsc"]) ? $_POST["fndsc"] : "" ;
        $this->fnest = isset($_POST["fnest"]) ? $_POST["fnest"] : "ACT" ;
        $this->fntyp = isset($_POST["fntyp"]) ? $_POST["fntyp"] : "" ;

        //validaciones
        //aplicar todas la reglas de negocio
        if (preg_match('/^\s*$/', $this->fndsc)) {
            $this->aErrors[] = "¡Funcion no puede ir vacia!";
        }
        //
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function _setViewData()
    {
        $this->fnest_ACT = ($this->fnest === "ACT") ? "selected" : "";
        $this->fnest_INA = ($this->fnest === "INA") ? "selected" : "";
        $this->fnest_PLN = ($this->fnest === "PLN") ? "selected" : "";
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->fncod,
            $this->fndsc,
            $this->fntyp
        );
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}

?>