<?php
namespace Dao\Mnt;
class Roles extends \Dao\Table
{
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * from roles;", array());
    }
    public static function getOne($rolescod)
    {
        $sqlstr = "Select * from roles where rolescod=:rolescod;";
        return self::obtenerUnRegistro($sqlstr, array("rolescod"=>$rolescod));
    }
    public static function insert($rolesdsc, $rolesest)
    {
        $insstr = "insert into roles (rolesdsc, rolesest) values (:rolesdsc, :rolesest);";
        return self::executeNonQuery(
            $insstr,
            array("rolesdsc"=>$rolesdsc, "rolesest"=>$rolesest)
        );
    }
    public static function update($rolesdsc, $rolesest, $rolescod)
    {
        $updsql = "update roles set rolesdsc = :rolesdsc , rolesest=:rolesest where rolescod=:rolescod;";
        return self::executeNonQuery(
            $updsql,
            array("rolesdsc" => $rolesdsc, "rolesest" => $rolesest, "rolescod" => $rolescod)
        );
    }
    public static function delete( $rolescod)
    {
        $delsql = "delete from roles where rolescod=:rolescod;";
        return self::executeNonQuery(
            $delsql,
            array( "rolescod" => $rolescod)
        );
    }

}

?>