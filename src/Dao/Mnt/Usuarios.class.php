<?php
namespace Dao\Mnt;
class Usuarios extends \Dao\Table
{
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * from usuario;", array());
    }
    public static function getOne($usercod)
    {
        $sqlstr = "Select * from usuario where usercod=:usercod;";
        return self::obtenerUnRegistro($sqlstr, array("usercod"=>$usercod));
    }
    public static function insert($username, $userest, $useremail,
    $userfching, $userpswdest, $userpswdexp,$useractcod, $userpswdchg, $usertipo)
    {
        $insstr = "insert into usuario (username, userest, useremail,userfching, 
        userpswdest, userpswdexp, useractcod, userpswdchg, usertipo) 
        values 
        (:username, :userest, :useremail, :userfching, :userpswdest, :userpswdexp,
        :useractcod, :userpswdchg, :usertipo);";
        return self::executeNonQuery(
            $insstr,
            array("username"=>$username, "userest"=>$userest, "useremail"=>$useremail,
            "userfching"=>$userfching, "userpswdest"=>$userpswdest, "userpswdexp"=>$userpswdexp,
            "useractcod"=>$useractcod, "userpswdchg"=>$userpswdchg, "usertipo"=>$usertipo)
        );
    }
    public static function update($username, $userest, $useremail, 
    $userfching, $userpswdest, $userpswdexp,$useractcod,$userpswdchg,$usertipo, $usercod)
    {
        $updsql = "update usuario set username = :username, userest=:userest, useremail=:useremail
        userfching = :userfching, userpswdest=:userpswdest, userpswdexp=:userpswdexp
        useractcod = :useractcod, userpswdchg=:userpswdchg, usertipo=:usertipo
         where usercod=:usercod;";
        return self::executeNonQuery(
            $updsql,
        array("username" => $username, "userest" => $userest, "useremail" => $useremail,
        "userfching" => $userfching, "userpswdest" => $userpswdest, "userpswdexp" => $userpswdexp,
        "useractcod" => $useractcod, "userpswdchg" => $userpswdchg, "usertipo" => $usertipo,
        "usercod" => $usercod)
        );
    }
    public static function delete( $usercod)
    {
        $delsql = "delete from usuario where usercod=:usercod;";
        return self::executeNonQuery(
            $delsql,
            array( "usercod" => $usercod)
        );
    }

}

?>