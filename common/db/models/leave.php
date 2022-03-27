<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'supports/model.php';

class Leave extends Model{

    public function getTableName(): string
    {
        return 'leaves';
    }
}