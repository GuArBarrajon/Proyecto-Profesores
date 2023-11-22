<?php
    class DiaDisponible extends Orm{
        public function __construct(PDO $connecion){
            parent::__construct('id', 'dias_disponibles', $connecion);
        }
    }
?>