<?php

class Model {
    protected static $tableName = 'users';
    protected static $columns = [];
    protected $values = [];

    function __construct($arr){
        $this->loadFromArray($arr);
    }

    public function loadFromArray($arr){
        if($arr) {
            foreach($arr as $key => $value){
                // $this->set($key, $value);
                $this->$key = $value;
            }
        }
    }

    public function __get($key){
        return $this->values[$key];
    }

    public function __set($key, $value){
        $this->values[$key] = $value;
    }

    public static function getSelect($filters = [], $columns = '*'){
        $sql = "SELECT ${columns} FROM " . static::$tableName . static::getFilters($filters);
        echo 'Valor de coluna: ' . $columns . '<br>';
        return $sql;
    }

    private static function getFilters($filters){
        $sql = '';
        if(count($filters) > 0){
            $sql .= ' WHERE 1 = 1';
            foreach($filters as $colunm => $value){
                $sql .= " AND ${colunm} = " . static::getFormatedValue($value);
            }
        }
        return $sql;
    }

    private static function getFormatedValue($value){
        if(is_null($value)){
            return 'null';
        }
        elseif(gettype($value) === 'string'){
            return "'${value}'"; // sendo string precisa de aspas quando passar o código sql. Ex: WHERE name = 'raphael';
        }
        else{
            return $value;
        }
    }
}