<?php

class Model {
    protected static $tableName = '';
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

    public static function get($filters = [], $columns = '*'){
        $objects = [];
        $result = static::getResultSetFromSelect($filters, $columns);
        if($result){
            $class = get_called_class(); // nome da classe que chamou esta função. No caso User
            while($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));
                // acima, o $class($row) passa o registro para o User, que passa para o Model e seu construtor (primeira coisa que fizemos nesta classe)
            }
        }
        return $objects;
    }

    public static function getOne($filters = [], $columns = '*'){
        $class = get_called_class();
        $result = static::getResultSetFromSelect($filters, $columns);
        return $result ? new $class($result->fetch_assoc()) : null;
    }

    public static function getResultSetFromSelect($filters = [], $columns = '*'){
        $sql = "SELECT ${columns} FROM " . static::$tableName . static::getFilters($filters);
        // echo 'Valor de coluna: ' . $columns . '<br>';
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows === 0){
            return null;
        }
        else{
            return $result;
        }
    }

    public function save(){
        $sql = "INSERT INTO " . static::$tableName . " (" . implode(',', static::$columns) . ") VALUES (";
        foreach(static::$columns as $col){
            $sql .= static::getFormatedValue($this->$col) . ',';
        }
        $sql[strlen($sql) - 1] = ')';
        $id = Database::executeSQL($sql);
        $this->id = $id;
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