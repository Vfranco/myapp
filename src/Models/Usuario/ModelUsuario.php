<?php

namespace Models\Usuario;

use Core\Helper;
use Database\Database;

class ModelUsuario extends Helper
{
    static function ObtenerIDBySession($session)
    {
        $getId = self::ObtenerPerfilUsuario($session);

        $iduser = self::simpleQuery(
            "id_sg_usuario",
            "sg_usuarios",
            "correo = '". $getId['id_sg_usuario'] ."' LIMIT 1"
        );

        return $iduser[0];
    }

    static function ObtenerPerfilUsuario($user)
    {
        $perfil = self::simpleQuery(
            "su.id_sg_usuario, sr.nombres as nombres, sr.apellidos as apellidos, su.correo as email, su.entrypoint",
            "sg_registros sr JOIN sg_usuarios su ON sr.id_sg_registro = su.id_sg_registro",
            "su.correo = '". self::decodeData($user) ."' LIMIT 1"
        );

        return $perfil[0];
    }

    static function ObtenerPerfilUsuarioByCedula($cedula)
    {
        $perfil = self::simpleQuery(
            "id_acl_user, credential_acl_user as cedula, fname_acl_user as nombres, lname_acl_user as apellidos, email_acl_user as email",
            "cms_acl_user",
            "id_acl_user = '". $cedula ."' LIMIT 1"
        );

        return $perfil[0];
    }

    static function ObtenerRutas($usuario)
    {
        $getId = self::ObtenerPerfilUsuario($usuario);

        $routes = self::simpleQuery(
            "replace(href_menu, '#!', '') as route, id_sg_estado as estado",
            "sg_menu_usuarios",
            "id_sg_usuario = '". $getId['id_sg_usuario'] ."' ORDER BY posicion_menu ASC"
        );

        return $routes;
    }

    static function ObtenerPerfilUsuarioById($id)
    {
        $dataProfile = self::simpleQuery(
            "*", 
            "sg_usuarios su JOIN sg_registros sr ON su.id_sg_registro = sr.id_sg_registro",
            "id_sg_usuario = '". $id ."'"
        );

        return $dataProfile;        
    }

    static function ObtenerPlanByEmpresa($user)
    {
        $getEmail = self::ObtenerPerfilUsuarioById($user);

        $getPlanUser = self::simpleQuery(
            "*",
            "sg_mis_planes",
            "id_sg_plan = '". $getEmail[0]['id_sg_plan'] ."'"
        );

        return $getPlanUser;
    }
}