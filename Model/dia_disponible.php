<?php
    class DiaDisponible extends Orm{
        public function __construct(PDO $connecion){
            parent::__construct('id', 'dias_disponibles', $connecion);
        }
        
        public function getByProfe($id){
            $stm = $this->db->prepare("SELECT * FROM {$this->table} WHERE legajo_prof = :id");
            $stm->bindValue(":id", $id);
            $stm->execute();
            return $stm->fetchAll();
        }
        public function deleteXProfe($id){
            $stm = $this->db->prepare("DELETE FROM {$this->table} WHERE legajo_prof = :id");
            $stm->bindValue(":id", $id);
            $stm->execute();
            return $stm->fetch();
        }
        public function deleteDia($id,$id_dia){
            $stm = $this->db->prepare("DELETE FROM {$this->table} WHERE legajo_prof = :id AND id_dia = :id_dia");
            $stm->bindValue(":id", $id);
            $stm->bindValue(":id_dia", $id_dia);
            $stm->execute();
            return $stm->fetch();
        }
    }
?>