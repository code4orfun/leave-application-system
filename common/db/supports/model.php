<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'db-connection.php';
require_once 'table-name-interface.php';

abstract class Model implements HasTableName
{
    private $conn = false;
    private string $table;
    protected string $primaryKey = "id";

    public function __construct()
    {
        $this->conn = DbDriver::getConnection();
        $this->table = $this->getTableName();
    }

    public function select(array $columns, string $where = null): array
    {
        $tableName = $this->table;

        $columns = join(',', $columns);
        $query = "SELECT $columns FROM $tableName";

        if ($where) {
            $query .= " where $where";
        }
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function insert(array $data): bool
    {
        $tableName = $this->table;
        $columns = array_keys($data);
        $columns = join(',', $columns);
        $val = array_values($data);
        $value = "'" . implode("', '", $val) . "'";
        $query = "INSERT INTO $tableName ($columns) VALUES ($value)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return true;
    }

    public function update($data, $where)
    {
        $tableName = $this->table;
        $emptyData = [];
        foreach ($data as $key => $val) {
            $sqlQuery = "$key = '$val'";
            array_push($emptyData, $sqlQuery);
        }

        $emptyData = join(', ', $emptyData);
        $query = "UPDATE $tableName SET $emptyData where $where";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute();

    }


    public function delete($where)
    {
        $tableName = $this->table;
        $query = "DELETE from $tableName where $where";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute();
    }

    public function findById(int $id)
    {
        $data = $this->select(['*'], "{$this->primaryKey}={$id}");
        if (!empty($data)) {
            return $data[0];
        }
        return [];
    }

    public function findByColumnName(string $columnName,string $value): array
    {

        $data = $this->select(['*'], "{$columnName}='{$value}'");
        if (!empty($data)) {
            return $data[0];
        }
        return [];
    }

    public function findByJoin(): array
    {
        $query = "SELECT departments.title, users.id, users.name, users.email, users.password, 
       users.is_admin, users.created_at from departments RIGHT JOIN users on departments.id = users.dept_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    function getDropDown(): array
    {
        $query = "SELECT id,title from departments";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
}