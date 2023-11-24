<?php
    class DiaDisponible extends Orm{
        public function __construct(PDO $connecion){
            parent::__construct('id', 'dias_disponibles', $connecion);
        }
        
        public function getByProfe($id){
            $stm = $this->db->prepare("SELECT * FROM {$this->table} WHERE legajo_prof = {$id}");
            $stm->execute();
            return $stm->fetch();
        }
        public function deleteXProfe($id){
            $stm = $this->db->prepare("DELETE FROM {$this->table} WHERE legajo_prof = {$id};");
            $stm->execute();
            return $stm->fetch();
        }
    }
?>