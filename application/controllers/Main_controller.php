<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main_controller extends CI_Controller{
    
    public function index(){
        $this->load->model('main_model');
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar');
        $this->load->view('dashboard_user');
        $this->load->view('templates_user/footer');
    }

    public function user_page(){
        $this->load->model('main_model');
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar');
        $this->load->view('dashboard_user');
        $this->load->view('templates_user/footer');
    }
    public function admin_page(){
        $this->load->model('main_model');
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('dashboard_admin');
        $this->load->view('templates_admin/footer');
    }
    public function data_buku(){
        $this->load->model('main_model');
        $data["buku"]=$this->main_model->get_data_buku();
        $data["tema"]=$this->main_model->get_tema();

        $this->form_validation->set_rules('judul_buku','Judul','required');
        $this->form_validation->set_rules('kd_buku','Kode','exact_length[6]');
        $this->form_validation->set_rules('tema','Tema','required');
        $this->form_validation->set_rules('penulis','Penulis','required');
        $this->form_validation->set_rules('penerbit','Penerbit','required');
        $this->form_validation->set_rules('jmlh_halaman','Jumlah Halaman','required');
        $this->form_validation->set_rules('jmlh_buku','Jumlah Buku','required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('templates_admin/data_buku',$data);
            $this->load->view('templates_admin/footer');
        }else{
           $this->tambah_buku();
        }
    }

    public function tambah_buku(){
         $kode = $this->input->post('kd_buku');
         $judul = $this->input->post('judul_buku');
         $tema = $this->input->post('tema');
         $penulis = $this->input->post('penulis');
         $penerbit = $this->input->post('penerbit');
         $jmlh_halaman = $this->input->post('jmlh_halaman');
         $jmlh_buku = $this->input->post('jmlh_buku');
         $thumbnail =$_FILES["thumb"];
         $lokasi = $this->input->post('lokasi');
         if($thumbnail!=""){
             $config["upload_path"]="./img/buku";
             $config["allowed_types"]="jpg|jpeg|png";
             $config["encrypt_name"]=TRUE;
             $config["max_size"]=200;

             $this->load->library('upload',$config);
             if($this->upload->do_upload('thumb')){
                 $thumb_name=$this->upload->data('file_name');
             }
         }
         $data = [
            "kode_buku"=>"$kode",
            "judul"=>"$judul",
            "id_tema"=>"$tema",
            "penulis"=>"$penulis",
            "jumlah_halaman"=>"$jmlh_halaman",
            "penerbit"=>"$penerbit",
            "jumlah"=>"$jmlh_buku",
            "thumbnail"=>"$thumb_name",
            "lokasi"=>"$lokasi"
        ];
        $this->main_model->add_buku($data);
        redirect("main_controller/data_buku");
    }

    public function hal_update_buku($id){
        $this->load->model('main_model');
        $data["buku"]=$this->main_model->get_detail_buku($id);
        $data["tema"]=$this->main_model->get_tema();

        $this->form_validation->set_rules("kode_buku","Kode Buku","required");
        $this->form_validation->set_rules("judul","Judul Buku","required");
        $this->form_validation->set_rules("penulis","Penulis","required");
        $this->form_validation->set_rules("tema","Tema","required");
        $this->form_validation->set_rules("penerbit","Penerbit","required");
        $this->form_validation->set_rules("jmlh_halaman","Jumlah Halaman","required");
        $this->form_validation->set_rules("jmlh_buku","Jumlah Buku","required");

        if($this->form_validation->run()==FALSE){
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/update_buku',$data);
        $this->load->view('templates_admin/footer');
        }else{
            $this->update_buku();
        }
    }

    public function update_buku(){
        $id = $this->input->post('id_buku');
        $judul = $this->input->post('judul');
        $kode  = $this->input->post('kode_buku');
        $penulis = $this->input->post('penulis');
        $tema = $this->input->post('tema');
        $penerbit = $this->input->post('penerbit');
        $jmlh_halaman = $this->input->post('jmlh_halaman');
        $jmlh_buku = $this->input->post('jmlh_buku');
        $thumbnail = $_FILES["thumb"];
        $thumb_name = $this->input->post('thumb_name');
        $lokasi = $this->input->post('lokasi');

        if($thumbnail!=""){
            $config["upload_path"]="./img/buku";
            $config["allowed_types"]="jpg|jpeg|png";
            $config["encrypt_name"]=TRUE;
            $config["max_size"]=200;

            $this->load->library('upload',$config);
            if($this->upload->do_upload('thumb')){
                $thumb_name=$this->upload->data('file_name');
            }
        }
        $where = [
            "id"=>$id
        ];
        $data = [
            "kode_buku"=>$kode,
            "judul"=>$judul,
            "id_tema"=>$tema,
            "penulis"=>$penulis,
            "jumlah_halaman"=>$jmlh_halaman,
            "penerbit"=>$penerbit,
            "jumlah"=>$jmlh_buku,
            "thumbnail"=>$thumb_name,
            "lokasi"=>$lokasi
        ];
        $this->main_model->update_buku($where,$data);
        redirect('main_controller/data_buku');
    }
    public function hapus_buku($id){
        $where = [
            "id"=>$id
        ];
        $this->main_model->hapus($where);
        redirect('main_controller/data_buku');
        
    }

    public function detail_buku($id){
        $data["buku"]=$this->main_model->get_detail_buku($id);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/detail_buku',$data);
        $this->load->view('templates_admin/footer');
    }

    public function detail_thumbnail($id){
        $data=$this->main_model->get_detail_buku($id);
        if($data[0]["thumbnail"]!=""){
            echo "img/buku/book.png";
        }else{
            echo "img/buku/".$data[0]["thumbnail"];
        }
    }

    public function hal_peminjaman(){
        $this->load->model('main_model');
        $data["peminjaman"]=$this->main_model->get_peminjaman();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/peminjaman',$data);
        $this->load->view('templates_admin/footer');
    }

    public function form_tambah_peminjaman(){
        $kode_buku=$this->input->post('kode_buku');
        $nim = $this->input->post('nim');

        $data["buku"]=$this->main_model->get_data_buku_by_kode($kode_buku);
        $data["mahasiswa"]=$this->main_model->get_data_user_by_nim($nim);

        if($data["buku"]==null || $data["mahasiswa"]==null){
            echo "<script>alert('Data tidak ditemukan !!');window.location.href='hal_peminjaman';</script>";
            // redirect("main_controller/hal_peminjaman");
        }else{
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('templates_admin/form_peminjaman',$data);
            $this->load->view('templates_admin/footer');
        }  
    }

    public function tambah_peminjaman(){
        $idbuku=$this->input->post('id_buku');
        $idmhs=$this->input->post('id_user');
        $tgl_pinjam = $this->input->post('tgl_pinjam');
        $tgl_kembali = $this->input->post('tgl_kembali');

        $data=[
            "id_buku"=>$idbuku,
            "id_user"=>$idmhs,
            "tanggal_pinjam"=>$tgl_pinjam,
            "batas_pinjam"=>$tgl_kembali
        ];

        $this->main_model->tambah_peminjaman($data);
        redirect("main_controller/hal_peminjaman");
    }

    public function hal_detail_peminjaman($id){

        $data["peminjaman"]=$this->main_model->get_detail_peminjaman($id);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/detail_peminjaman',$data);
        $this->load->view('templates_admin/footer');
    }

    public function selesai_peminjaman($id){
        $this->load->model('main_model');
        $result=$this->main_model->get_detail_peminjaman($id);
        // $denda = time()-strtotime($result["batas_pinjam"]) ;

        if(time()<=strtotime($result["batas_pinjam"])){
            $denda = 0;
        }else{
            $denda = 500*round((((time()-strtotime($result["batas_pinjam"]))/60)/60)/24);
        }
        
        $data = [
            "id_buku"=>$result["id_buku"],
            "id_user"=>$result["id_user"],
            "tanggal_pinjam"=>$result["tanggal_pinjam"],
            "batas_pinjam"=>$result["batas_pinjam"],
            "tanggal_kembali"=>date("Y-m-d"),
            "denda"=>$denda
        ];

        $this->main_model->selesai_peminjaman($id,$data);
        redirect("main_controller/hal_peminjaman");   
    }

}

?>