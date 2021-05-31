<?php
class User_controller extends CI_Controller{
    public function index(){
        $this->load->model("main_model");
        $usrid=$this->session->userdata("id");
        $data["terlambat"]=[];
        $data["user"]=$this->main_model->get_detail_anggota($usrid);
        $data["peminjaman"]=$this->main_model->get_user_peminjaman($usrid);
        foreach($data["peminjaman"] as $x){
            if(time()>strtotime($x["batas_pinjam"])){
                $data["terlambat"][]=$x;
            }
        }
        if($this->session->userdata("nomer_induk")!=null){
        $this->load->model('main_model');
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar',$data);
        $this->load->view('dashboard_user',$data);
        $this->load->view('templates_user/footer');
        }else{
            redirect('main_controller');
        }
    }

    public function tema(){
        return $data =$this->main_model->get_tema();
    } 

    public function data_buku(){

        $usrid=$this->session->userdata("id");
        if($usrid!=null){
        $this->load->model('main_model');
        $data["buku"]=$this->main_model->get_data_buku();
        $data["tema"]=$this->tema();
        $data["user"]=$this->main_model->get_detail_anggota($usrid);
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar',$data);
        $this->load->view('templates_user/data_buku',$data);
        $this->load->view('templates_user/footer');
        }else{
            redirect("main_controller");
        }
       
    }

    public function detail_buku($id){
        $data["buku"]=$this->main_model->get_detail_buku($id);
        $usrid=$this->session->userdata("id");
        if($usrid!=null){
        $data["user"]=$this->main_model->get_detail_anggota($usrid);
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar',$data);
        $this->load->view('templates_user/detail_buku',$data);
        $this->load->view('templates_user/footer');
    }else{
        redirect("main_controller");
    }
}

    
    public function hal_peminjaman(){
        $usrid=$this->session->userdata("id");
        if($usrid!=null){
        $this->load->model('main_model');
        $usrid=$this->session->userdata("id");
        $data["peminjaman"]=$this->main_model->get_user_peminjaman($usrid);
        $data["user"]=$this->main_model->get_detail_anggota($usrid);
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar',$data);
        $this->load->view('templates_user/peminjaman',$data);
        $this->load->view('templates_user/footer');
        }else{
            redirect("main_controller");
        }
    }

    public function hal_riwayat_transaksi(){
        $usrid=$this->session->userdata("id");
        if($usrid!=null){
        $this->load->model('main_model');
        $data["peminjaman"]=$this->main_model->get_pengembalian();
        $usrid=$this->session->userdata("id");
        $data["user"]=$this->main_model->get_detail_anggota($usrid);
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar',$data);
        $this->load->view('templates_user/riwayat_transaksi',$data);
        $this->load->view('templates_user/footer');
        }else{
            redirect("main_controller");
        }
    }
    public function profil_user(){
        $usrid=$this->session->userdata("id");
        if($usrid!=null){
        $this->load->model('main_model');
        $usrid=$this->session->userdata("id");
        $data["user"]=$this->main_model->get_detail_anggota($usrid);
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/sidebar',$data);
        $this->load->view('templates_user/profil',$data);
        $this->load->view('templates_user/footer');
        }else{
            redirect("main_controller");
        }
    }

    public function hal_update_user(){
        $usrid=$this->session->userdata("id");
        if($usrid!=null){
        $data["user"]=$this->main_model->get_detail_anggota($usrid);
        $data["fakultas"]=$this->main_model->get_fakultas();
        $data["jurusan"]=$this->main_model->get_jurusan();

        $this->form_validation->set_rules("nama","Nama","required");
        $this->form_validation->set_rules("nim","Nomer Induk","exact_length[8]");
        $this->form_validation->set_rules("ttl","Tanggal Lahir","required");
        $this->form_validation->set_rules("nama","Nama","required");
        $this->form_validation->set_rules("kelamin","Kelamin","required");
        $this->form_validation->set_rules("fakultas","Fakultas","required");
        $this->form_validation->set_rules("jurusan","Jurusan","required");

        if($this->form_validation->run()==false){
            $this->load->view('templates_admin/header');
            $this->load->view('templates_user/sidebar',$data);
            $this->load->view('templates_admin/update_anggota',$data);
            $this->load->view('templates_admin/footer');
        }else{
            $this->_update_user();
        }
    }else{
        redirect("main_controller");
    }
        
    }

    private function _update_user(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $nim  = $this->input->post('nim');
        $ttl  = $this->input->post('ttl');
        $fakultas = $this->input->post('fakultas');
        $jurusan  = $this->input->post('jurusan');
        $kelamin  = $this->input->post('kelamin');
        $foto = $_FILES["foto"];
        $nm_foto = $this->input->post('nm_foto');

        if($foto!=""){
            $config["allowed_types"]="jpg|jpeg|png";
            $config["max_size"]=500;
            $config["upload_path"]="./img/user";
            $config["encrypt_name"]=true;
            $this->load->library('upload',$config);

            if($this->upload->do_upload("foto")){
                $nm_foto=$this->upload->data('file_name');
            }
        }
        $where=[
            "id"=>$id
        ];
        $data=[
            "nama"=>$nama,
            "nim"=>$nim,
            "jenis_kelamin"=>$kelamin,
            "ttl"=>$ttl,
            "id_fakultas"=>$fakultas,
            "id_jurusan"=>$jurusan,
            "foto"=>$nm_foto
        ];
        $this->main_model->update_anggota($data,$where);
        redirect('user_controller/profil_user');
         
    }
}

?>