<?php

namespace Dao\Compras;

class Compra extends \Dao\Table
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
    

    public static function insert($usercodp, $idDisp, $idServicio, $precio, $isv, $total, $fechaFact)
    {
        //hora por defecto del sistema 
        date_default_timezone_set('America/Tegucigalpa');    
        $fecha_actual = date("Y-m-d H:i:s");
        //asignacion a la variable para poder guardarla automaticamente
        $fechaFact = $fecha_actual;
        
        $insstr = "insert into ventas (usercodp, idDisp, idServicio, precio, isv, total, fechaFact) values (:usercodp, :idDisp, :idServicio, :precio, :isv, :total, :fechaFact);";
        return self::executeNonQuery(
            $insstr,
            array("usercodp"=>$usercodp, "idDisp"=>$idDisp, "idServicio"=>$idServicio, "precio"=>$precio, "isv"=>$isv, "total"=>$total, "fechaFact"=>$fechaFact)
        );
    }
    public static function update($usercodp, $idDispositivo, $idServicio, $precioUnitario, $isv, $total, $fechaFact, $idventas)
    {
        $updsql = "update ventas set usercodp = :usercodp, idDispositivo = :idDispositivo, idServicio = :idServicio, precioUnitario = :precioUnitario, isv = :isv, total = :total, fechaFact = :fechaFact where idventas =:idventas;";
        return self::executeNonQuery(
            $updsql,
            array("usercodp"=>$usercodp, "idDispositivo"=>$idDispositivo, "idServicio"=>$idServicio, "precioUnitario"=>$precioUnitario, "isv"=>$isv, "total"=>$total, "fechaFact"=>$fechaFact, "idventas"=>$idventas)
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
