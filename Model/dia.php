<?php
    class Dia extends Orm{
        public function __construct(PDO $connecion){
            parent::__construct('id', 'dias', $connecion);
        }
    }
?>