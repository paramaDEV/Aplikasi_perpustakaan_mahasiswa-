<?php

class Main_model extends CI_Model{
   public function get_data_buku(){
       $this->db->select('*');  
       $this->db->from('jenis_tema');
       $this->db->join('data_buku','jenis_tema.id=data_buku.id_tema');
       return $this->db->get()->result_array();
   }

   public function register_admin($data){
       $this->db->insert('admin',$data);
   }

   public function get_tema(){
       return $this->db->get('jenis_tema')->result_array();
   }

   public function get_fakultas(){
       return $this->db->get('fakultas')->result_array();
   } 

   public function get_jurusan(){
    return $this->db->get('jurusan')->result_array();
}

   public function get_jurusan_by_idfak($id){
       return $this->db->get_where('jurusan',["id_fakultas"=>$id])->result_array();
   }

   public function add_buku($data){
       $this->db->insert('data_buku',$data);
   }

   public function get_data_buku_by_tema($idtema){
       return $this->db->get_where('data_buku',["id_tema"=>$idtema])->result_array();
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

   public function get_peminjaman_by_date($date){
        return $this->db->get_where('peminjaman',["tanggal_pinjam"=>$date])->result_array();
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

   public function hapus_peminjaman($id){
    $this->db->delete("peminjaman",["id"=>$id]);
   }

   public function get_pengembalian(){
    $this->db->select("*");
    $this->db->from("data_buku,user");
    $this->db->join("pengembalian","data_buku.id=pengembalian.id_buku AND user.id=pengembalian.id_user");
    return $this->db->get()->result_array();
    }

    public function get_detail_pengembalian($id){
        $this->db->select("*");
        $this->db->from("user,data_buku");
        $this->db->join("pengembalian","user.id=pengembalian.id_user AND data_buku.id=pengembalian.id_buku AND pengembalian.id='$id'");
        return $this->db->get()->row_array();
    }

    public function get_data_anggota($id){
        if($id==null){
            $this->db->select("*");
            $this->db->from("fakultas,jurusan");
            $this->db->join("user","user.id_fakultas=fakultas.id AND user.id_jurusan=jurusan.id ");
        }else{
            $this->db->select("*");
            $this->db->from("fakultas,jurusan");
            $this->db->join("user","user.id_fakultas=fakultas.id AND user.id_jurusan=jurusan.id AND jurusan.id='$id'");
        }
        return $this->db->get()->result_array(); 
    }

    public function tambah_anggota($data){
        $this->db->insert('user',$data);
    }
    public function get_detail_anggota($id){
        $this->db->select("*");
        $this->db->from("fakultas,jurusan");
        $this->db->join("user","user.id_fakultas=fakultas.id AND user.id_jurusan=jurusan.id AND user.id='$id'");
        return $this->db->get()->row_array(); 
    }
    public function hapus_anggota($id){
        $this->db->delete("user",["id"=>$id]);
    }
    public function update_anggota($data,$where){
        $this->db->where($where);
        $this->db->update('user',$data);
    }
    public function buku_hilang(){
        $this->db->select("*");
        $this->db->from("buku_hilang");
        $this->db->join("data_buku","buku_hilang.id_buku=data_buku.id");

        return $this->db->get()->result_array();
    }
    public function tambah_buku_hilang($data){
        $this->db->insert('buku_hilang',$data);
    }

    public function get_peminjaman_hari_ini(){
        return $this->db->get_where('peminjaman',["tanggal_pinjam"=>date("Y-m-d")])->result_array();
    }
    public function get_peminjaman_dan_terlambat(){
        $arr = [];
       $data= $this->db->get('peminjaman')->result_array();
       foreach($data as $x){
           if(strtotime($x["batas_pinjam"])<time()){
               $arr[]=$x; 
            }
       }
       return $arr;
    }
    public function get_terlambat_hari_ini(){
        $arr = [];
        $data = $this->db->get('pengembalian')->result_array();
        foreach($data as $x){
            if(strtotime($x["batas_pinjam"])<strtotime($x["tanggal_kembali"]) && strtotime($x["tanggal_kembali"])==strtotime(date("Y-m-d"))){
                $arr[]=$x; 
             }
        }
        return $arr;
    }

    public function get_hilang_hari_ini(){
        return $this->db->get_where('buku_hilang',["tanggal_hilang"=>date("Y-m-d")])->result_array();
    }
 
    public function get_pengembalian_hari_ini(){
        return $this->db->get_where('pengembalian',["tanggal_kembali"=>date("Y-m-d")])->result_array();
    }
}

?>