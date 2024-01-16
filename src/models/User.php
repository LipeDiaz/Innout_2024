<?php

class User extends Model {
    protected static $tableName = 'users';
    protected static $columns = [
        'id',
        'name',
        'passwod',
        'email',
        'start_date',
        'is_admin'
    ];
}


