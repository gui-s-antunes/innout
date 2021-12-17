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

    public function insert(){
        $this->validate();
        $this->is_admin = $this->admin ? 1 : 0;
        if(!$this->end_date) $this->end_date = null;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::insert();
    }

    private function validate(){
        $errors = [];

        if(!$this->name) {
            $errors['name'] = 'Nome é um campo obrigatório.';
        }

        if(!$this->email){
            $errors['email'] = 'Email é um campo obrigatório.';
        } elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email inválido.';
        }

        if(!$this->start_date){
            $errors['start_date'] = 'Data de admissão é um campo obrigatório.';
        }elseif(!DateTime::createFromFormat('Y-m-d', $this->start_date)){
            $errors['start_date'] = 'Data de Admissão deve seguir o padrão dd/mm/aaaa.';
        }

        if($this->end_date && !DateTime::createFromFormat('Y-m-d', $this->end_date)){
            $errors['end_date'] = 'Data de desligamento deve seguir o padrão dd/mm/aaaa.';
        }

        if(!$this->password){
            $errors['password'] = 'O campo de senha é obrigatório';
        }

        if(!$this->confim_password){
            $errors['confirm_password'] = 'O campo de confirmar senha é obrigatório';
        }

        if($this->password && $this->confirm_password && $this->password !== $this->confirm_password){
            $errors['password'] = 'As senhas não são iguais';
            $errors['confirm_password'] = 'As senhas não são iguais';
        }

        if(count($errors) > 0){
            throw new ValidationException($errors);
        }
    }
}