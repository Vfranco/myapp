<?php

namespace Models\Actividades;

use Core\Helper;
use Models\Empresa\ModelEmpresa;
use Database\Database;

class ModelActividades extends Helper
{    
    static function totalEmpleados($user, $alias)
    {
        $result = Helper::simpleQuery(
            "COUNT(id_sg_personal) as " . $alias,
            "sg_mi_personal",
            "id_sg_empresa = '". ModelEmpresa::ObtenerListadoEmpresas($user)[0]['id_sg_empresa'] ."'"
        );

        return $result[0][$alias];
    }

    static function totalActividades($user, $alias)
    {
        $result = Helper::simpleQuery(
            'COUNT(id_sg_registro) as ' . $alias,
            'sg_registros_mi_personal',
            "id_sg_empresa = '". ModelEmpresa::ObtenerListadoEmpresas($user)[0]['id_sg_empresa'] ."'"
        );

        return $result[0][$alias];
    }

    static function visitasHoy($user, $alias, $tipo)
    {
        $result = Helper::simpleQuery(
            'count(id_sg_registro) as ' . $alias,
            'sg_registros_mi_personal',            
            "str_to_date(substring($tipo, 1,10), '%Y-%m-%d') BETWEEN '". Database::date() ." 00:00:00' AND '". Database::date() ." 23:59:59' AND id_sg_empresa = '". ModelEmpresa::ObtenerListadoEmpresas($user)[0]['id_sg_empresa'] ."'"
        );

        return $result[0][$alias];
    }

    static function visitasAyer($user, $alias, $tipo)
    {
        $result = Helper::simpleQuery(
            'count(id_sg_registro) as ' . $alias,
            'sg_registros_mi_personal',            
            "STR_TO_DATE(SUBSTRING(fecha_ingreso, 1,10), '%Y-%m-%d') BETWEEN CONCAT(DATE_ADD(CURDATE(), INTERVAL -1 DAY), ' 00:00:00') AND CONCAT(DATE_ADD(CURDATE(), INTERVAL -1 DAY), ' 23:59:59') AND id_sg_empresa = '". ModelEmpresa::ObtenerListadoEmpresas($user)[0]['id_sg_empresa'] ."'"
        );

        return $result[0][$alias];
    }

    static function visitasMes($user, $alias, $tipo)
    {
        $result = Helper::simpleQuery(
            'count(id_sg_registro) as ' . $alias,
            'sg_registros_mi_personal',            
            "str_to_date(substring($tipo, 1,10), '%Y-%m-%d') BETWEEN DATE_SUB(CURDATE(),INTERVAL (DAY(CURDATE())-1) DAY) and LAST_DAY(NOW()) AND id_sg_empresa = '". ModelEmpresa::ObtenerListadoEmpresas($user)[0]['id_sg_empresa'] ."'"
        );

        return $result[0][$alias];
    }
}