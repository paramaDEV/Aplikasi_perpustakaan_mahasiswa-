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
        $this->form_validation->set_rules('kd_buku','Kode','required');
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
         if($thumbnail!=""){
             $config["upload_path"]="./img/buku";
             $config["allowed_types"]="jpg|jpeg|png";
             $config["encrypt_name"]=TRUE;
             $config["max_size"]=500;

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
            "thumbnail"=>"$thumb_name"
        ];
        $this->main_model->add_buku($data);
        redirect("main_controller/data_buku");
    }

    public function hapus($id){
        $where = [
            "id"=>$id
        ];
        $this->main_model->hapus($where);
        redirect('main_controller/data_buku');
        
    }



}

?>