<?php

class User extends Model {
    protected static $tableName = 'users';
    protected static $columns = [
        'id',
        'name',
        'password',
        'email',
        'start_date',
        'is_admin'
    ];

    public static function getActiveUserCount() {
        return static::getCount(['raw' => 'end_date IS NULL']);

    }

    public function insert() {
        $this->validate();
        $this->is_admin = $this->is_admin ? 1 : 0;
        if(!$this->end_date) $this->end_date = null; 
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        return parent::insert();
    }
}



