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

    public static function insert($idDispositivo, $nombre, $marca, $serie, $categorias_idCategoria, $precioUnitario, $stock, $urldip)
    {
        $insstr = "insert into dispositivos (idDispositivo, nombre, marca, serie, categorias_idCategoria, precioUnitario, stock, urldip) values (:idDispositivo, :nombre, :marca, :serie, :categorias_idCategoria, :precioUnitario, :stock, :urldip);";
        return self::executeNonQuery(
            $insstr,
            array("idDispositivo"=>$idDispositivo, "nombre"=>$nombre, "marca"=>$marca, "serie"=>$serie, "categorias_idCategoria"=>$categorias_idCategoria, "precioUnitario"=>$precioUnitario, "stock"=>$stock, "urldip"=>$urldip)
        );
    }
    public static function update($nombre, $marca, $serie, $categorias_idCategoria, $precioUnitario, $stock, $urldip, $idDispositivo)
    {
        $updsql = "update dispositivos set nombre = :nombre, marca = :marca, serie = :serie, categorias_idCategoria = :categorias_idCategoria, precioUnitario = :precioUnitario, stock = :stock, urldip = :urldip where idDispositivo =:idDispositivo;";
        return self::executeNonQuery(
            $updsql,
            array("nombre"=>$nombre, "marca"=>$marca, "serie"=>$serie, "categorias_idCategoria"=>$categorias_idCategoria, "precioUnitario"=>$precioUnitario, "stock"=>$stock, "urldip"=>$urldip, "idDispositivo"=>$idDispositivo)
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
