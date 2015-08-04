<?php

require_once('conexionDB.php');

class Usuario extends ConexionDB {

    public $nombres;
    public $apellidos;
    public $nombre_usuario;
    private $clave;

    function __construct() {
        $this->db_name = 'db_clase';
    }

    public function datos($nombre_usuario = '') {
        if ($nombre_usuario != '') {
            $this->query = "
            SELECT id, nombres, apellidos, nombre_usuario
            FROM usuario
            WHERE nombre_usuario = '$nombre_usuario'
            ";
            $this->resultados_query();
        }
        if (count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function guardar($user_data = array()) {
        if (array_key_exists('nombre_usuario', $user_data)) {
            $this->datos($user_data['nombre_usuario']);
            if ($user_data['nombre_usuario'] != $this->nombre_usuario) {
                try {
                    //print_r($user_data);
                    foreach ($user_data as $campo => $valor) {
                        $$campo = $valor;
                    }
                    $this->query = "
                INSERT INTO usuario
                (nombre_usuario, clave,nombres,apellidos)
                VALUES
                ('$nombre_usuario', '$clave', '$nombres', '$apellidos')
                ";
                    $this->sinple_query();
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                return true;
            } else {
                echo '<br/>nombre de usuario ya existe';
                return false;
            }
        } else {
            echo '<br/>el campo nombre de usuario no esta definido';
            return false;
        }
    }

    public function editar($user_data = array()) {
        foreach ($user_data as $campo => $valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
        UPDATE usuarios
        SET nombre='$nombre',
        apellido='$apellido',
        clave='$clave'
        WHERE email = '$email'
        ";
        $this->execute_single_query();
    }

    public function eliminar($user_email = '') {
        $this->query = "
        DELETE FROM usuarios
        WHERE email = '$user_email'
        ";
        $this->execute_single_query();
    }

    function __destruct() {
        unset($this);
    }

}
?>

