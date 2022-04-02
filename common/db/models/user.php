<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'supports/model.php';



class User extends Model
{


    public function getTableName(): string
    {
        return 'users';
    }

//    public function findByJoin(): array
//    {
//        $query = "SELECT * from departments RIGHT JOIN users on departments.id = users.dept_id";
//        $stmt = $this->conn->prepare($query);
//        $stmt->execute();
//        $stmt->setFetchMode(PDO::FETCH_ASSOC);
//        return $stmt->fetchAll();
//    }



}