<?php

class Main_model extends CI_Model{
   public function get_data_buku(){
       $this->db->select('*');  
       $this->db->from('jenis_tema');
       $this->db->join('data_buku','jenis_tema.id=data_buku.id_tema');
       return $this->db->get()->result_array();
   }

   public function get_tema(){
       return $this->db->get('jenis_tema')->result_array();
   }

   public function add_buku($data){
       $this->db->insert('data_buku',$data);
   }

   public function hapus($where){
       $this->db->delete('data_buku',$where);
   }
}

?>