<?php

namespace Dao\Mnt;

class Lugares extends \Dao\Table
{
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * from ciudades;", array());
    }

    public static function getOne($idCiudad)
    {
        $sqlstr = "Select * from ciudades where idCiudad=:idCiudad;";
        return self::obtenerUnRegistro($sqlstr, array("idCiudad"=>$idCiudad));
    }

    public static function insert($idCiudad, $nombreCiudad)
    {
        $insstr = "insert into ciudades (idCiudad, nombreCiudad) values (:idCiudad, :nombreCiudad);";
        return self::executeNonQuery(
            $insstr,
            array("idCiudad"=>$idCiudad, "nombreCiudad"=>$nombreCiudad)
        );
    }
    public static function update($nombreCiudad, $idCiudad)
    {
        $updsql = "update ciudades set nombreCiudad = :nombreCiudad where idCiudad=:idCiudad;";
        return self::executeNonQuery(
            $updsql,
            array("nombreCiudad" => $nombreCiudad, "idCiudad" => $idCiudad)
        );
    }
    public static function delete( $idCiudad)
    {
        $delsql = "delete from ciudades where idCiudad=:idCiudad;";
        return self::executeNonQuery(
            $delsql,
            array( "idCiudad" => $idCiudad)
        );
    }

}

?>
