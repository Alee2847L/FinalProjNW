<?php

namespace Dao\Mnt;

class Servicios extends \Dao\Table
{
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * from servicios;", array());
    }

    public static function getOne($idServicio)
    {
        $sqlstr = "Select * from servicios where idServicio=:idServicio;";
        return self::obtenerUnRegistro($sqlstr, array("idServicio"=>$idServicio));
    }

    public static function insert($idServicio, $usuarios_idUsuario, $dispositivos_idDispositivo, $nombreServicio, $tipoServicio, $descripcionServicio, $precioServicio, $ciudades_idCiudad)
    {
        $insstr = "insert into servicios (idServicio, usuarios_idUsuario, dispositivos_idDispositivo, nombreServicio, tipoServicio, descripcionServicio, precioServicio, ciudades_idCiudad) values (:idServicio, :usuarios_idUsuario, :dispositivos_idDispositivo, :nombreServicio, :tipoServicio, :descripcionServicio, :precioServicio, :ciudades_idCiudad);";
        return self::executeNonQuery(
            $insstr,
            array("idServicio"=>$idServicio, "usuarios_idUsuario"=>$usuarios_idUsuario, "dispositivos_idDispositivo"=>$dispositivos_idDispositivo, "nombreServicio"=>$nombreServicio, "tipoServicio"=>$tipoServicio, "descripcionServicio"=>$descripcionServicio, "precioServicio"=>$precioServicio, "ciudades_idCiudad"=>$ciudades_idCiudad)
        );
    }
    public static function update($usuarios_idUsuario, $dispositivos_idDispositivo, $nombreServicio, $tipoServicio, $descripcionServicio, $precioServicio, $ciudades_idCiudad, $idServicio)
    {
        $updsql = "update servicios set usuarios_idUsuario = :usuarios_idUsuario, dispositivos_idDispositivo = :dispositivos_idDispositivo, nombreServicio = :nombreServicio, tipoServicio = :tipoServicio, descripcionServicio = :descripcionServicio, precioServicio = :precioServicio, ciudades_idCiudad = :ciudades_idCiudad where idServicio=:idServicio;";
        return self::executeNonQuery(
            $updsql,
            array("usuarios_idUsuario"=>$usuarios_idUsuario, "dispositivos_idDispositivo"=>$dispositivos_idDispositivo, "nombreServicio"=>$nombreServicio, "tipoServicio"=>$tipoServicio, "descripcionServicio"=>$descripcionServicio, "precioServicio"=>$precioServicio, "ciudades_idCiudad"=>$ciudades_idCiudad, "idServicio"=>$idServicio)
        );
    }
    public static function delete( $idServicio)
    {
        $delsql = "delete from servicios where idServicio=:idServicio;";
        return self::executeNonQuery(
            $delsql,
            array( "idServicio" => $idServicio)
        );
    }

}

?>
