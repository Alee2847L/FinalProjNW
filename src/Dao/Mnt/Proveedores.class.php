<?php

namespace Dao\Mnt;

class Proveedores extends \Dao\Table
{
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * from proveedores;", array());
    }

    public static function getOne($idProveedor)
    {
        $sqlstr = "Select * from proveedores where idProveedor=:idProveedor;";
        return self::obtenerUnRegistro($sqlstr, array("idProveedor"=>$idProveedor));
    }

    public static function insert($idProveedor, $nombreProveedor, $correoProveedor, $numeroProveedor, $direccionProveedor)
    {
        $insstr = "insert into proveedores (idProveedor, nombreProveedor, correoProveedor, numeroProveedor, direccionProveedor) values (:idProveedor, :nombreProveedor, :correoProveedor, :numeroProveedor, :direccionProveedor);";
        return self::executeNonQuery(
            $insstr,
            array("idProveedor"=>$idProveedor, "nombreProveedor"=>$nombreProveedor, "correoProveedor"=>$correoProveedor, "numeroProveedor"=>$numeroProveedor, "direccionProveedor"=>$direccionProveedor)
        );
    }
    public static function update($idProveedor, $nombreProveedor, $correoProveedor, $numeroProveedor, $direccionProveedor)
    {
        $updsql = "update proveedores set nombreProveedor = :nombreProveedor, correoProveedor = :correoProveedor, numeroProveedor = :numeroProveedor, direccionProveedor = :direccionProveedor where idProveedor=:idProveedor;";
        return self::executeNonQuery(
            $updsql,
            array("nombreProveedor"=>$nombreProveedor, "correoProveedor"=>$correoProveedor, "numeroProveedor"=>$numeroProveedor, "direccionProveedor"=>$direccionProveedor, "idProveedor"=>$idProveedor)
        );
    }
    public static function delete( $idProveedor)
    {
        $delsql = "delete from proveedores where idProveedor=:idProveedor;";
        return self::executeNonQuery(
            $delsql,
            array( "idProveedor" => $idProveedor)
        );
    }

}

?>
