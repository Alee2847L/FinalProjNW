<?php 
namespace Controllers\Mnt;

class Role extends \Controllers\PublicController
{
    private $rolescod = 0;
    private $rolesdsc = "";
    private $rolesest = "";
    private $catest_ACT = "";
    private $catest_INA = "";
    private $catest_PLN = "";

    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nueva Rol",
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
        $this->rolescod = isset($_GET["rolescod"])?$_GET["rolescod"]:0;
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
                    if (\Dao\Mnt\Roles::insert($this->rolesdsc, $this->rolesest)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_roles",
                            "¡Rol Agregada Satisfactoriamente!"
                        );
                    }
                    break;
                case "UPD":
                    if (\Dao\Mnt\Roles::update($this->rolesdsc, $this->rolesest, $this->rolescod)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_roles",
                            "¡rol Actualizada Satisfactoriamente!"
                        );
                    }
                    break;
                case "DEL":
                    if (\Dao\Mnt\Roles::delete($this->rolescod)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_roles",
                            "¡rol Eliminada Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("mnt/role", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\Mnt\Roles::getOne($this->rolescod);
        if ($_data) {
            $this->rolescod = $_data["rolescod"];
            $this->rolesdsc = $_data["rolesdsc"];
            $this->rolesest = $_data["rolesest"];
            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->rolescod = isset($_POST["rolescod"]) ? $_POST["rolescod"] : 0 ;
        $this->rolesdsc = isset($_POST["rolesdsc"]) ? $_POST["rolesdsc"] : "" ;
        $this->rolesest = isset($_POST["rolesest"]) ? $_POST["rolesest"] : "ACT" ;

        //validaciones
        //aplicar todas la reglas de negocio
        if (preg_match('/^\s*$/', $this->rolesdsc)) {
            $this->aErrors[] = "¡La categoría no puede ir vacia!";
        }
        //
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function _setViewData()
    {
        $this->rolesest_ACT = ($this->rolesest === "ACT") ? "selected" : "";
        $this->rolesest_INA = ($this->rolesest === "INA") ? "selected" : "";
        $this->rolesest_PLN = ($this->rolesest === "PLN") ? "selected" : "";
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->rolescod,
            $this->rolesdsc
        );
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}

?>