<?php

namespace Core;

use Database\Database;

class Helper
{
    static function fetch($fields, $table)
    {
        $result = Database::query([
            'fields'    => $fields,
            'table'     => $table            
        ])->records()->resultToArray();

        if(isset($result[0]['empty']) && $result[0]['empty'] == true)
            return [];

        return $result;
    }

    static function simpleQuery($fields, $table, $arguments)
    {
        $result = Database::query([
            'fields'    => $fields,
            'table'     => $table,
            'arguments' => $arguments            
        ])->records()->resultToArray();

        if(isset($result[0]['empty']) && $result[0]['empty'] == true)
            return [];

        return $result;
    }

    static function encodeData($data)
    {
        return base64_encode($data);
    }

    static function decodeData($data)
    {
        return base64_decode($data);
    }
}