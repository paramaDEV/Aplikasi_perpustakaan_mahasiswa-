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

   public function get_data_buku_by_kode($kode){
    $this->db->select("*");
    $this->db->from("jenis_tema");
    $this->db->join("data_buku","jenis_tema.id=data_buku.id_tema WHERE kode_buku='$kode'");
    return $this->db->get()->row_array();
   }

   public function get_data_user_by_nim($nim){
       return $this->db->get_where('user',["nim"=>$nim])->row_array();
   }

   public function get_detail_buku($id){
       $this->db->select("*");
       $this->db->from("jenis_tema");
       $this->db->join("data_buku","jenis_tema.id=data_buku.id_tema AND data_buku.id=$id");
       return $this->db->get()->row_array();
   }
   public function update_buku($where,$data){
       $this->db->where($where);
       $this->db->update('data_buku',$data);
   }
   public function get_peminjaman(){
       $this->db->select("*");
       $this->db->from("data_buku,user");
       $this->db->join("peminjaman","data_buku.id=peminjaman.id_buku AND user.id=peminjaman.id_user");
       return $this->db->get()->result_array();
   }

   public function tambah_peminjaman($data){
       $this->db->insert("peminjaman",$data);
   }

   public function get_detail_peminjaman($id){
       $this->db->select("*");
       $this->db->from("user,data_buku");
       $this->db->join("peminjaman","user.id=peminjaman.id_user AND data_buku.id=peminjaman.id_buku AND peminjaman.id='$id'");
       return $this->db->get()->row_array();
   }

   public function selesai_peminjaman($id_peminjaman,$data){
       $this->db->insert("pengembalian",$data);
       $this->db->delete("peminjaman",["id"=>$id_peminjaman]);
   }
}

?>