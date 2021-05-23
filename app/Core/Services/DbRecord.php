<?php

namespace App\Core\Services;

use Illuminate\Support\Facades\DB;

class DbRecord {
    public static function check($tableName, $fields) {
        $response = "";
        $fieldKeys = array_keys($fields);
        foreach ($fieldKeys as $key) {
            $record = DB::table($tableName)->where($key, $fields[$key]);
            if ($record->count() > 0) {
                $response .= "The table $tableName already has a record with $key set as $fields[$key]<br />";
            }
        }
        return $response;
    }

    public static function checkExcept($tableName, $fields, $exceptFieldName, $exceptFieldValue) {
        $response = "";
        $fieldKeys = array_keys($fields);
        foreach ($fieldKeys as $key) {
            $record = DB::table($tableName)->where($key, $fields[$key])->where($exceptFieldName, '!=', $exceptFieldValue);
            if ($record->count() > 0) {
                $response .= "The table $tableName already has a record with $key set as $fields[$key]<br />";
            }
        }
        return $response;
    }
}
