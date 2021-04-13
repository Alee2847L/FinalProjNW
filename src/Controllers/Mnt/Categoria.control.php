<?php 
namespace Controllers\Mnt;

class Categoria extends \Controllers\PrivateController
{
    private $idCategoria = 0;
    private $nombreCategoria = "";
    private $catest_ACT = "";
    private $catest_INA = "";
    private $catest_PLN = "";

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
        $this->catid = isset($_GET["idCategoria"])?$_GET["idCategoria"]:0;
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
                    if (\Dao\Mnt\Categorias::insert($this->idCategoria, $this->nombreCategoria)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_categorias",
                            "¡Categoría Agregada Satisfactoriamente!"
                        );
                    }
                    break;
                case "UPD":
                    if (\Dao\Mnt\Categorias::update($this->nombreCategoria, $this->idCategoria)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_categorias",
                            "¡Categoría Actualizada Satisfactoriamente!"
                        );
                    }
                    break;
                case "DEL":
                    if (\Dao\Mnt\Categorias::delete($this->idCategoria)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_categorias",
                            "¡Categoría Eliminada Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("mnt/categoria", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\Mnt\Categorias::getOne($this->idCategoria);
        if ($_data) {
            $this->idCategoria = $_data["idCategoria"];
            $this->nombreCategoria = $_data["nombreCategoria"];
            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->idCategoria = isset($_POST["idCategoria"]) ? $_POST["idCategoria"] : 0 ;
        $this->nombreCategoria = isset($_POST["nombreCategoria"]) ? $_POST["nombreCategoria"] : "" ;

        //validaciones
        //aplicar todas la reglas de negocio
        if (preg_match('/^\s*$/', $this->nombreCategoria)) {
            $this->aErrors[] = "¡La categoría no puede ir vacia!";
        }
        //
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function _setViewData()
    {
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->idCategoria,
            $this->nombreCategoria
        );
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}

?>
