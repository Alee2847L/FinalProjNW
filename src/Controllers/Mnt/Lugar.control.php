<?php 
namespace Controllers\Mnt;

class Lugar extends \Controllers\PublicController
{
    private $idCiudad = 0;
    private $nombreCiudad = "";
    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nueva Ciudad",
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
        $this->idCiudad = isset($_GET["idCiudad"])?$_GET["idCiudad"]:0;
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
                    if (\Dao\Mnt\Lugares::insert($this->idCiudad, $this->nombreCiudad)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_lugares",
                            "Ciudad Agregada Satisfactoriamente!"
                        );
                    }
                    break;
                case "UPD":
                    if (\Dao\Mnt\Lugares::update($this->nombreCiudad, $this->idCiudad)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_ciudades",
                            "Ciudad Actualizada Satisfactoriamente!"
                        );
                    }
                    break;
                case "DEL":
                    if (\Dao\Mnt\Lugares::delete($this->idCiudad)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_ciudades",
                            "Ciudad Eliminada Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("mnt/lugar", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\Mnt\Lugares::getOne($this->idCiudad);
        if ($_data) {
            $this->idCiudad = $_data["idCiudad"];
            $this->nombreCiudad = $_data["nombreCiudad"];
            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->idCiudad = isset($_POST["idCiudad"]) ? $_POST["idCiudad"] : 0 ;
        $this->nombreCiudad = isset($_POST["nombreCiudad"]) ? $_POST["nombreCiudad"] : "" ;

        //validaciones
        //aplicar todas la reglas de negocio
        if (preg_match('/^\s*$/', $this->nombreCiudad)) {
            $this->aErrors[] = "¡La Ciudad no puede ir vacia!";
        }
        //
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function _setViewData()
    {
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->idCiudad,
            $this->nombreCiudad
        );
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}

?>
