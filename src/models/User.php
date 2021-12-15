<?php
class User extends Model {
    // o código abaixo ajuda a pegar o banco de dados e manipular crud
    protected static $tableName = 'users';
    protected static $columns = [
        'id',
        'name',
        'password',
        'email',
        'start_date',
        'end_date',
        'is_admin'
    ];

    public static function getActiveUsersAccount(){
        return static::getCount(['raw' => 'end_date IS NULL']);
    }
}