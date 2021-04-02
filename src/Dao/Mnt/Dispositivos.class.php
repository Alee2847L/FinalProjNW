<?php

namespace Dao\Mnt;

class Dispositivos extends \Dao\Table
{
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * from dispositivos;", array());
    }

    public static function getOne($idDispositivo)
    {
        $sqlstr = "Select * from dispositivos where idDispositivo=:idDispositivo;";
        return self::obtenerUnRegistro($sqlstr, array("idDispositivo"=>$idDispositivo));
    }

    public static function insert($idDispositivo, $nombre, $marca, $serie, $categorias_idCategoria, $precioUnitario, $stock)
    {
        $insstr = "insert into dispositivos (idDispositivo, nombre, marca, serie, categorias_idCategoria, precioUnitario, stock) values (:idDispositivo, :nombre, :marca, :serie, :categorias_idCategoria, :precioUnitario, :stock);";
        return self::executeNonQuery(
            $insstr,
            array("idDispositivo"=>$idDispositivo, "nombre"=>$nombre, "marca"=>$marca, "serie"=>$serie, "categorias_idCategoria"=>$categorias_idCategoria, "precioUnitario"=>$precioUnitario, "stock"=>$stock)
        );
    }
    public static function update($nombre, $marca, $serie, $categorias_idCategoria, $precioUnitario, $stock, $idDispositivo)
    {
        $updsql = "update dispositivos set nombre = :nombre, marca = :marca, serie = :serie, categorias_idCategoria = :categorias_idCategoria, precioUnitario = :precioUnitario, stock = :stock where idDispositivo =:idDispositivo;";
        return self::executeNonQuery(
            $updsql,
            array("nombre"=>$nombre, "marca"=>$marca, "serie"=>$serie, "categorias_idCategoria"=>$categorias_idCategoria, "precioUnitario"=>$precioUnitario, "stock"=>$stock, "idDispositivo"=>$idDispositivo)
        );
    }
    public static function delete( $idDispositivo)
    {
        $delsql = "delete from dispositivos where idDispositivo=:idDispositivo;";
        return self::executeNonQuery(
            $delsql,
            array( "idDispositivo" => $idDispositivo)
        );
    }

}

?>
