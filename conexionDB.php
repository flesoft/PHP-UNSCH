<?php

abstract class ConexionDB {

    private static $db_host = 'localhost';
    private static $db_user = 'root';
    private static $db_pass = '';
    protected $db_name = 'mydb';
    protected $query;
    protected $rows = array();
    private $conn;

# métodos abstractos para ABM de clases que hereden

    abstract protected function datos();

    abstract protected function guardar();

    abstract protected function editar();

    abstract protected function eliminar();
# los siguientes métodos pueden definirse con exactitud
# y no son abstractos
# Conectar a la base de datos

    private function abrir_conexion() {
        $this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass, $this->db_name);
    }

# Desconectar la base de datos

    private function cerrar_conexion() {
        $this->conn->close();
    }

# Ejecutar un query simple del tipo INSERT, DELETE, UPDATE

    protected function sinple_query() {
        $this->abrir_conexion();
        $this->conn->query($this->query);
        $this->cerrar_conexion();
    }

# Traer resultados de una consulta en un Array

    protected function resultados_query() {
        $this->abrir_conexion();
        $result = $this->conn->query($this->query);
        while ($this->rows[] = $result->fetch_assoc()); 
        $result->close();
        $this->cerrar_conexion();
        array_pop($this->rows);
    }

}

?>