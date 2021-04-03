<?php

namespace Dao\Mnt;

class Categorias extends \Dao\Table
{
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * from categorias;", array());
    }

    public static function getOne($idCategoria)
    {
        $sqlstr = "Select * from categorias where idCategoria=:idCategoria;";
        return self::obtenerUnRegistro($sqlstr, array("idCategoria"=>$idCategoria));
    }

    public static function insert($idCategoria, $nombreCategoria)
    {
        $insstr = "insert into categorias (idCategoria, nombreCategoria) values (:idCategoria, :nombreCategoria);";
        return self::executeNonQuery(
            $insstr,
            array("idCategoria"=>$idCategoria, "nombreCategoria"=>$nombreCategoria)
        );
    }
    public static function update($nombreCategoria, $idCategoria)
    {
        $updsql = "update categorias set nombreCategoria = :nombreCategoria where idCategoria=:idCategoria;";
        return self::executeNonQuery(
            $updsql,
            array("nombreCategoria" => $nombreCategoria, "idCategoria" => $idCategoria)
        );
    }
    public static function delete( $idCategoria)
    {
        $delsql = "delete from categorias where idCategoria=:idCategoria;";
        return self::executeNonQuery(
            $delsql,
            array( "idCategoria" => $idCategoria)
        );
    }

}

?>
