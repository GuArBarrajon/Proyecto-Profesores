<?php
    class Profesor extends Orm{
        public function __construct(PDO $connecion){
            parent::__construct('numero_legajo', 'profesores', $connecion);
        }
    }
?>