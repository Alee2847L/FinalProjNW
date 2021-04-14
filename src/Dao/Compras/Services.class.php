<?php

namespace Dao\Compras;

class Services extends \Dao\Table
{
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * from tipo_serv;", array());
    }

    public static function getOne($idServ)
    {
        $sqlstr = "Select * from tipo_serv where idServ=:idServ;";
        return self::obtenerUnRegistro($sqlstr, array("idServ"=>$idServ));
    }

    public static function insert($nombreServ, $desc_serv)
    {
        $insstr = "insert into tipo_serv (nombreServ, desc_serv);";
        return self::executeNonQuery(
            $insstr,
            array("nombreServ"=>$nombreServ, "desc_serv"=>$desc_serv)
        );
    }
    public static function update($nombreServ, $desc_serv, $idServ)
    {
        $updsql = "update tipo_serv set nombreServ = :nombreServ, desc_serv = :desc_serv where idServ=:idServ;";
        return self::executeNonQuery(
            $updsql,
            array("nombreServ"=>$nombreServ, "desc_serv"=>$desc_serv)
        );
    }
    public static function delete( $idServ)
    {
        $delsql = "delete from tipo_serv where idServ=:idServ;";
        return self::executeNonQuery(
            $delsql,
            array( "idServ" => $idServ)
        );
    }

}

?>
