<?php 
namespace Controllers\Mnt;

class Usuario extends \Controllers\PublicController
{
    private $usercod = 0;
    private $username = "";
    private $userest = "";
    private $useremail = "";
    private $userfching = "";
    private $userpswdest = "";
    private $userpswdexp = "";
    private $useractcod = "";
    private $userpswdchg = "";
    private $usertipo = "";
    private $catest_ACT = "";
    private $catest_INA = "";
    private $catest_PLN = "";

    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nuevo Usuario",
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
        $this->usercod = isset($_GET["usercod"])?$_GET["usercod"]:0;
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
                    if (\Dao\Mnt\Usuarios::insert($this->username, $this->userest, $this->useremail,
                    $this->userfching, $this->userpswdest, $this->userpswdexp,
                    $this->useractcod, $this->userpswdchg, $this->usertipo)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_usuarios",
                            "¡Usuarios Agregada Satisfactoriamente!"
                        );
                    }
                    break;
                case "UPD":
                    if (\Dao\Mnt\Usuarios::update($this->username, $this->userest,
                    $this->userfching, $this->userpswdest, $this->userpswdexp,$this->useremail, 
                    $this->useractcod, $this->userpswdchg, $this->usertipo,
                    $this->usercod)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_usuarios",
                            "¡Usuarios Actualizada Satisfactoriamente!"
                        );
                    }
                    break;
                case "DEL":
                    if (\Dao\Mnt\Usuarios::delete($this->usercod)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_usuarios",
                            "¡Usuarios Eliminada Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("mnt/usuario", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\Mnt\Usuarios::getOne($this->usercod);
        if ($_data) {
            $this->usercod = $_data["usercod"];
            $this->username = $_data["username"];
            $this->userest = $_data["userest"];
            $this->useremail = $_data["useremail"];
            $this->userfching = $_data["userfching"];
            $this->userpswdest = $_data["userpswdest"];
            $this->userpswdexp = $_data["userpswdexp"];
            $this->useractcod = $_data["useractcod"];
            $this->userpswdchg = $_data["userpswdchg"];
            $this->usertipo = $_data["usertipo"];
            
            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->usercod = isset($_POST["usercod"]) ? $_POST["usercod"] : 0 ;
        $this->username = isset($_POST["username"]) ? $_POST["username"] : "" ;
        $this->userest = isset($_POST["userest"]) ? $_POST["userest"] : "ACT" ;
        $this->useremail = isset($_POST["useremail"]) ? $_POST["useremail"] : "" ;
        $this->userfching = isset($_POST["userfching"]) ? $_POST["userfching"] : "" ;
        $this->userpswdest = isset($_POST["userpswdest"]) ? $_POST["userpswdest"] : "" ;
        $this->userpswdexp = isset($_POST["userpswdexp"]) ? $_POST["userpswdexp"] : "" ;
        $this->useractcod = isset($_POST["useractcod"]) ? $_POST["useractcod"] : "" ;
        $this->userpswdchg = isset($_POST["userpswdchg"]) ? $_POST["userpswdchg"] : "" ;
        $this->usertipo = isset($_POST["usertipo"]) ? $_POST["usertipo"] : "" ;

        //validaciones
        //aplicar todas la reglas de negocio
        if (preg_match('/^\s*$/', $this->username)) {
            $this->aErrors[] = "¡Usuario no puede ir vacio!";
        }
        //
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function _setViewData()
    {
        $this->userest_ACT = ($this->userest === "ACT") ? "selected" : "";
        $this->userest_INA = ($this->userest === "INA") ? "selected" : "";
        $this->userest_PLN = ($this->userest === "PLN") ? "selected" : "";
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->usercod,
            $this->username,
            $this->userfching,
            $this->userpswdest,
            $this->userpswdexp,
            $this->useractcod,
            $this->userpswdchg,
            $this->usertipo
        );
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}

?>