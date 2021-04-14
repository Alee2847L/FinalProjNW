<?php

namespace Dao\Mnt;

class Ventas extends \Dao\Table
{
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * from ventas;", array());
    }

    public static function getOne($idventas)
    {
        $sqlstr = "Select * from ventas where idventas=:idventas;";
        return self::obtenerUnRegistro($sqlstr, array("idventas"=>$idventas));
    }

    public static function insert($idventas, $usercodp, $idDispositivo, $idServicio, $precio, $isv, $total, $fechaFact)
    {
        //hora por defecto del sistema 
        date_default_timezone_set('America_Mexico_City');    
        $fecha_actual = date("Y-m-d H:i:s");
        //asignacion a la variable para poder guardarla automaticamente
        $fechaFact = $fecha_actual;
        $insstr = "insert into ventas (idventas, usercodp, idDispositivo, idServicio, precio, isv, total, fechaFact) values (:idventas, :usercodp, :idDispositivo, :idServicio, :precio, :isv, :total, :fechaFact);";
        return self::executeNonQuery(
            $insstr,
            array("idventas" => $idventas, "usercodp" => $usercodp, "idDispositivo" => $idDispositivo, "idServicio" => $idServicio, "precio" => $precio, "isv" => $isv, "total" => $total, "fechaFact" => $fechaFact)
        );
    }
    public static function update($usercodp, $idDispositivo, $idServicio, $precio, $isv, $total, $fechaFact, $idventas)
    {
        $updsql = "update ventas set usercodp = :usercodp, idDispositivo = :idDispositivo, idServicio = :idServicio, precio = :precio, isv = :isv, total = :total, fechaFact = :fechaFact where idventas=:idventas;";
        return self::executeNonQuery(
            $updsql,
            array("usercodp" => $usercodp, "idDispositivo" => $idDispositivo, "idServicio" => $idServicio, "precio" => $precio, "isv" => $isv, "total" => $total, "fechaFact" => $fechaFact, "idventas" => $idventas)
        );
    }
    public static function delete( $idventas)
    {
        $delsql = "delete from ventas where idventas=:idventas;";
        return self::executeNonQuery(
            $delsql,
            array( "idventas" => $idventas)
        );
    }

}

?>
