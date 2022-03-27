<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'supports/model.php';

class User extends Model
{


    public function getTableName(): string
    {
        return 'users';
    }
}