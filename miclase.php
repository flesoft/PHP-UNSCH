<?php

class MiClase {

    protected static $var = 2;

    const NUESTRO = 3;

    public function MiClase($parametro) {
        $this->var = $parametro;
    }

//    abstract protected function miAbstracto();

    public function mimetodo() {
        return $this->var = 3;
    }

    public function miNumero() {
        return $this->var;
    }

    public function miMetodo2($var) {
        if (is_numeric($var)) {
            return 'es numero';
        } else if(is_bool($var)) {
            return false;
        }else{
            return 'no es el tipo';
        }
    }

}
