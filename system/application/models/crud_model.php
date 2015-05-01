<?php
class Crud_model extends CI_Model {

    public function agregar($tabla, $data){
        $this->db->insert($tabla, $data);
        return true;
    }
        
    public function editar($data, $tabla, $id, $field){
        $this->db->where($field, $id);
        $this->db->update($tabla, $data);
        return true;
    }
        
    public function delete($id, $campo, $tabla){
        $this->db->where($campo, $id);
        $this->db->delete($tabla); 
        return true;
    }

    public function check($check){
        $q= $this
            ->db
            ->select('*')
            ->from('usuarios')
            ->where('login_usuarios', $check)
            ->get();
        if($q->num_rows() > 0) {
            return $q->result_array();
        }
        return array();
    }

    public function preguntas(){
        $q= $this
            ->db
            ->select('*')
            ->from('preguntas')
            ->order_by('id_pregunta', 'random')
            ->get();
        if($q->num_rows() > 0) {
            return $q->result_array();
        }
        return array();
    }

    public function ranking(){
        $q= $this
            ->db
            ->select('*')
            ->from('quiz')
            ->select_sum('punteo')
            ->group_by('usuario')
            ->order_by('punteo', 'desc')
            ->get();
        if($q->num_rows() > 0) {
            return $q->result_array();
        }
        return array();
    }
}