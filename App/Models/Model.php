<?php
namespace App\Models;

use mysqli;

class Model {

    protected $db_host = DB_HOST;
    protected $db_user = DB_USER;
    protected $password = DB_PASS;
    protected $db = DB_NAME;

    protected $connection;
    protected $query;

    protected $table;

    public function __construct()
    {
        $this->connection();
    }

    public function connection(){
        $this->connection = new mysqli($this->db_host, $this->db_user, $this->password, $this->db);
        if($this->connection->connect_error) {
            die('Error de conexion: '.$this->connection->connect_error);
        }
    }

    public function query($sql){
        $this->query = $this->connection->query($sql);
        return $this;
    }

    public function first(){
        return $this->query->fetch_assoc();
    }

    public function get(){
        return $this->query->fetch_all(MYSQLI_ASSOC);
    }

    public function all(){
        $sql = "SELECT * FROM {$this->table}";
        return $this->query($sql)->get();
    }

    public function find($id){
        $sql = "SELECT * FROM {$this->table} WHERE id = {$id}";
        return $this->query($sql)->first();
    }

    public function where($column, $operator, $value = null){

        if(empty($value)){
            $value = $operator;
            $operator = '=';
        }
        $value = $this->connection->real_escape_string($value);

        $sql = "SELECT * FROM {$this->table} WHERE {$column} {$operator} {$value}";
        $this->query($sql);
        return $this;
    }

    public function create($datos){
        $columns = array_keys($datos);
        $columns = implode(", ", $columns);

        $values = array_values($datos);
        $values = "'" . implode("', '", $datos) . "'";

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$values})";

        $this->query($sql);

        $id = $this->connection->insert_id;

        return $this->find($id);
    }

    public function update($id, $datos){
        $fields = [];
        foreach ($datos as $key => $value) {
            $fields[] = "{$key} = '{$value}'";
        }
        $fields = implode(", ", $fields);

        $sql = "UPDATE {$this->table} SET {$fields} WHERE id = {$id}";

        $this->query($sql);
        
        return $this->find($id);
    }

    public function delete($id){
       
        $sql = "DELETE FROM {$this->table} WHERE id = {$id}";

        $this->query($sql);
        
        return true;
    }
}