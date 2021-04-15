<?php
class User_controller extends CI_Controller{
    public function index(){
        $this->load->model('main_model');
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar');
        $this->load->view('dashboard_user');
        $this->load->view('templates_user/footer');
    }

    public function tema(){
        return $data =$this->main_model->get_tema();
    } 

    public function tambah_buku(){
        $kode = $this->input->post('kd_buku');
        $judul = $this->input->post('judul_buku');
        $tema = $this->input->post('tema');
        $penulis = $this->input->post('penulis');
        $thumbnail =$_FILES["thumb"];
        $penerbit  = $this->input->post('penerbit');
        $jmlh_halaman =$_FILES["jmlh_halaman"];
        $jmlh_buku =$_FILES["jmlh_buku"];
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
       redirect("user_controller/data_buku");
   }

    public function data_buku(){
        $this->load->model('main_model');
        $data["buku"]=$this->main_model->get_data_buku();
        $data["tema"]=$this->tema();

        $this->form_validation->set_rules('judul_buku','Judul','required');
        $this->form_validation->set_rules('kd_buku','Kode','exact_length[6]');
        $this->form_validation->set_rules('tema','Tema','required');
        $this->form_validation->set_rules('penulis','Penulis','required');
        $this->form_validation->set_rules('penerbit','Penerbit','required');
        $this->form_validation->set_rules('jmlh_halaman','Jumlah Halaman','required');
        $this->form_validation->set_rules('jmlh_buku','Jumlah Buku','required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('templates_user/data_buku',$data);
            $this->load->view('templates_user/footer');
        }else{
           $this->tambah_buku();
        }
    }

    public function detail_buku($id){
        $data["buku"]=$this->main_model->get_detail_buku($id);
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar');
        $this->load->view('templates_user/detail_buku',$data);
        $this->load->view('templates_user/footer');
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
        $this->form_validation->set_rules("lokasi","Lokasi","required");


        if($this->form_validation->run()==FALSE){
            $this->load->view('templates_user/header');
            $this->load->view('templates_user/sidebar');
            $this->load->view('templates_user/update_buku',$data);
            $this->load->view('templates_user/footer');
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
        redirect('user_controller/data_buku');
    }

    public function hapus_buku($id){
        $where = [
            "id"=>$id
        ];
        $this->main_model->hapus($where);
        redirect('user_controller/data_buku');
        
    }
    public function hal_peminjaman(){
        $this->load->model('main_model');
        $data["peminjaman"]=$this->main_model->get_peminjaman();
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar');
        $this->load->view('templates_user/peminjaman',$data);
        $this->load->view('templates_user/footer');
    }

    public function hal_riwayat_transaksi(){
        $this->load->model('main_model');

        $data["peminjaman"]=$this->main_model->get_pengembalian();

        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar');
        $this->load->view('templates_user/riwayat_transaksi',$data);
        $this->load->view('templates_user/footer');
    }
    public function profil_user(){
        $this->load->model('main_model');
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar');
        $this->load->view('templates_user/profil');
        $this->load->view('templates_user/footer');
    }
}

?>