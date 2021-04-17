<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_controller extends CI_Controller{

    public function index(){
        $this->load->model('main_model');
        $admnid=$this->session->userdata("id");
        if($admnid!=null){
        $data["admin"]=$this->main_model->get_detail_admin($admnid);
        $data["buku"]=$this->main_model->get_data_buku();
        $data["peminjaman"]=$this->main_model->get_peminjaman();
        $data["pengembalian"]=$this->main_model->get_pengembalian();
        $data["hilang"]=$this->main_model->buku_hilang();
        $data["terlambat"]=$this->main_model->get_peminjaman();
        $data["jmlPeminjaman"]=$this->total_peminjaman_by_date();
        $data["today"]=[
            "peminjaman"=>$this->main_model->get_peminjaman_hari_ini(),
            "pengembalian"=>$this->main_model->get_pengembalian_hari_ini(),
            "terlambat"=>$this->main_model->get_terlambat_hari_ini(),
            "hilang"=>$this->main_model->get_hilang_hari_ini()];
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('dashboard_admin',$data);
        $this->load->view('templates_admin/footer');
        }else{
            redirect("main_controller");
        }
    }

    public function profil_admin(){
        $admnid=$this->session->userdata("id");
        if($admnid!=null){
        $this->load->model('main_model');
        $data["admin"]=$this->main_model->get_detail_admin($admnid);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('templates_admin/profil',$data);
        $this->load->view('templates_admin/footer');
        }else{
            redirect("main_controller");
        }
    }
    
    public function tema(){
        return $data =$this->main_model->get_tema();
    } 

    public function data_buku_by_tema($idtema){
        $this->load->model('main_model');
        echo json_encode($this->main_model->get_data_buku_by_tema($idtema));
    }

    public function data_buku(){
        $this->load->model('main_model');
        $admnid=$this->session->userdata("id");
        if($admnid!=null){
        $data["admin"]=$this->main_model->get_detail_admin($admnid);
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
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar',$data);
            $this->load->view('templates_admin/data_buku',$data);
            $this->load->view('templates_admin/footer');
        }else{
           $this->tambah_buku();
        }}else{
            redirect("main_controller");
        }
    }

 


    public function data_jurusan($id=null){
        $this->load->model('main_model');
        echo json_encode($data=$this->main_model->get_jurusan_by_idfak($id));
        
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
        redirect("admin_controller/data_buku");
    }

    public function hal_update_buku($id){
        $this->load->model('main_model');
        $admnid=$this->session->userdata("id");
        if($admnid!=null){
        $data["admin"]=$this->main_model->get_detail_admin($admnid);
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
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar',$data);
            $this->load->view('templates_admin/update_buku',$data);
            $this->load->view('templates_admin/footer');
        }else{
            $this->_update_buku();
        }}else{
            redirect("main_controller");
        }
    }

    private function _update_buku(){
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
        redirect('admin_controller/data_buku');
    }
    public function hapus_buku($id){
        $where = [
            "id"=>$id
        ];
        $this->main_model->hapus($where);
        redirect('admin_controller/data_buku');
        
    }

    public function detail_buku($id){
        $this->load->model('main_model');
        $admnid=$this->session->userdata("id");
        if($admnid!=null){
        $data["admin"]=$this->main_model->get_detail_admin($admnid);
        $data["buku"]=$this->main_model->get_detail_buku($id);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('templates_admin/detail_buku',$data);
        $this->load->view('templates_admin/footer');
        }else{
            redirect("main_controller");
        }
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
        $admnid=$this->session->userdata("id");
        if($admnid!=null){
        $data["admin"]=$this->main_model->get_detail_admin($admnid);
        $data["peminjaman"]=$this->main_model->get_peminjaman();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('templates_admin/peminjaman',$data);
        $this->load->view('templates_admin/footer');
        }else{
            redirect("main_controller");
        }
    }

    public function form_tambah_peminjaman(){
        $this->load->model('main_model');
        $admnid=$this->session->userdata("id");
        if($admnid!=null){
        $data["admin"]=$this->main_model->get_detail_admin($admnid);
        $kode_buku=$this->input->post('kode_buku');
        $nim = $this->input->post('nim');
        $data["buku"]=$this->main_model->get_data_buku_by_kode($kode_buku);
        $data["mahasiswa"]=$this->main_model->get_data_user_by_nim($nim);

        if($data["buku"]==null || $data["mahasiswa"]==null){
            echo "<script>alert('Data tidak ditemukan !!');window.location.href='hal_peminjaman';</script>";
            // redirect("main_controller/hal_peminjaman");
        }else{
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar',$data);
            $this->load->view('templates_admin/form_peminjaman',$data);
            $this->load->view('templates_admin/footer');
        }
    } else{
            redirect("main_controller");
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
        redirect("admin_controller/hal_peminjaman");
    }

    public function total_peminjaman_by_date(){
        $this->load->model('main_model');
        $tanggal=[];
        $a=[];
        $jmlPeminjaman=[];
        for($i=6;$i>=0;$i--){
            $tanggal[]=date("Y-m-d",time()-(60*60*24*$i));
        }
        for($j=0;$j<count($tanggal);$j++){
            $jmlPeminjaman[]=count($this->main_model->get_peminjaman_by_date($tanggal[$j]));
        }
       return $jmlPeminjaman;

    }

    public function hal_detail_peminjaman($id){
        $this->load->model('main_model');
        $admnid=$this->session->userdata("id");
        if($admnid!=null){
        $data["admin"]=$this->main_model->get_detail_admin($admnid);
        $data["peminjaman"]=$this->main_model->get_detail_peminjaman($id);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('templates_admin/detail_peminjaman',$data);
        $this->load->view('templates_admin/footer');
        }else{
            redirect("main_controller");
        }
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
        redirect("admin_controller/hal_peminjaman");   
    }

    public function hal_riwayat_transaksi(){
        $this->load->model('main_model');
        $admnid=$this->session->userdata("id");
        if($admnid!=null){
        $data["admin"]=$this->main_model->get_detail_admin($admnid);
        $data["peminjaman"]=$this->main_model->get_pengembalian();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar',$data);
        $this->load->view('templates_admin/riwayat_transaksi',$data);
        $this->load->view('templates_admin/footer');
        }else{
            redirect("main_controller");
        }
    }

    public function hal_detail_pengembalian($id){
        $this->load->model('main_model');

        $data["pengembalian"]=$this->main_model->get_detail_pengembalian($id);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/detail_pengembalian',$data);
        $this->load->view('templates_admin/footer');
    }

    public function data_anggota($id=null){
        $this->load->model('main_model');
        echo json_encode($this->main_model->get_data_anggota($id));
    }

    public function hal_data_anggota(){
        $this->load->model('main_model');
        $admnid=$this->session->userdata("id");
        if($admnid!=null){
        $data["user"]=$this->main_model->get_data_anggota(1);
        $data["fakultas"]=$this->main_model->get_fakultas();
        $data["admin"]=$this->main_model->get_detail_admin($admnid);
        $this->form_validation->set_rules("nim","Nomer Induk Mahasiswa","required|exact_length[8]");
        $this->form_validation->set_rules("nama","Nama","required");
        $this->form_validation->set_rules("kelamin","Jenis Kelamin","required");
        $this->form_validation->set_rules("ttl","Tanggal Lahir","required");
        $this->form_validation->set_rules("fakultas","Fakultas","required");
        $this->form_validation->set_rules("jurusan","Jurusan","required");
        $this->form_validation->set_rules("password","Password","required|trim|min_length[8]");

        if($this->form_validation->run()==FALSE){
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar',$data);
            $this->load->view('templates_admin/data_anggota',$data);
            $this->load->view('templates_admin/footer');
        }else{
            $this->tambah_anggota();
        } 
    }else{
        redirect("main_controller");
    }
    }

    public function tambah_anggota(){
        $nim=$this->input->post("nim");
        $nama=$this->input->post("nama");
        $kelamin=$this->input->post("kelamin");
        $ttl=$this->input->post("ttl");
        $fakultas=$this->input->post("fakultas");
        $jurusan=$this->input->post("jurusan");
        $password=password_hash($this->input->post("password"),PASSWORD_DEFAULT);
        $foto=$_FILES["foto"];

        if($foto!=""){
            $config["allowed_types"] = "jpg|jpeg|png";
            $config["max_size"]=200;
            $config["upload_path"]="./img/user";
            $config["encrypt_name"]=true;

            if($this->load->library('upload',$config)){
                if($this->upload->do_upload("foto")){
                    $nama_foto=$this->upload->data("file_name");
                }
            }
        }

        $data = [
            "nama"=>$nama,
            "nim"=>$nim,
            "jenis_kelamin"=>$kelamin,
            "ttl"=>$ttl,
            "id_fakultas"=>$fakultas,
            "id_jurusan"=>$jurusan,
            "kuota_pinjam"=>5,
            "password"=>$password,
            "foto"=>$nama_foto
        ];

        $this->main_model->tambah_anggota($data);
        redirect("admin_controller/hal_data_anggota");
    }

    public function detail_anggota($id){
        $admnid=$this->session->userdata("id");
        if($admnid!=null){
        $this->load->model('main_model');
        $data["admin"]=$this->main_model->get_detail_admin($admnid);
            $data["user"]=$this->main_model->get_detail_anggota($id);
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar',$data);
            $this->load->view('templates_admin/detail_anggota',$data);
            $this->load->view('templates_admin/footer');
        }else{
            redirect("main_controller");
        }
    }

    public function hal_update_anggota($id){
        $this->load->model('main_model');
        $admnid=$this->session->userdata("id");
        if($admnid!=null){
        $data["admin"]=$this->main_model->get_detail_admin($admnid);
        $data["user"]=$this->main_model->get_detail_anggota($id);
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
            $this->load->view('templates_admin/sidebar',$data);
            $this->load->view('templates_admin/update_anggota',$data);
            $this->load->view('templates_admin/footer');
        }else{
            $this->_update_anggota();
        }
    }else{
        redirect("main_controller");
    }
        
    }

    public function hal_update_profil(){
        
        $admnid=$this->session->userdata("id");
        if($admnid!=null){
        $this->load->model('main_model');
        $data["admin"]=$this->main_model->get_detail_admin($admnid);
        $this->form_validation->set_rules("nama","Nama","required");
        $this->form_validation->set_rules("nim","Nomer Induk","exact_length[8]");
        $this->form_validation->set_rules("ttl","Tanggal Lahir","required");
        $this->form_validation->set_rules("nama","Nama","required");
        $this->form_validation->set_rules("kelamin","Kelamin","required");

        if($this->form_validation->run()==false){
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar',$data);
            $this->load->view('templates_admin/update_profil',$data);
            $this->load->view('templates_admin/footer');
        }else{
            $this->_update_profil();
        }
    }else{
            redirect("main_controller");
        }
    }
    private function _update_profil(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $no_induk  = $this->input->post('nim');
        $ttl  = $this->input->post('ttl');
        $kelamin  = $this->input->post('kelamin');
        $foto = $_FILES["foto"];
        $nm_foto = $this->input->post('nm_foto');

        if($foto!=""){
            $config["allowed_types"]="jpg|jpeg|png";
            $config["max_size"]=200;
            $config["upload_path"]="./img/admin";
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
            "nomer_induk"=>$no_induk,
            "jenis_kelamin"=>$kelamin,
            "ttl"=>$ttl,
            "foto"=>$nm_foto
        ];
        $this->main_model->update_admin($data,$where);
        redirect('admin_controller/profil_admin');
         
    }

    private function _update_anggota(){
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
            $config["max_size"]=200;
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
        redirect('admin_controller/hal_data_anggota');
         
    }
    public function hapus_anggota($id){
        $this->main_model->hapus_anggota($id);
        redirect('admin_controller/hal_data_anggota');
        
    }

    public function hal_buku_hilang(){
        $this->load->model('main_model');
        $admnid=$this->session->userdata("id");
        if($admnid!=null){
        $data["admin"]=$this->main_model->get_detail_admin($admnid);
            $data['buku']=$this->main_model->buku_hilang();
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar',$data);
            $this->load->view('templates_admin/buku_hilang',$data);
            $this->load->view('templates_admin/footer');
        }else{
            redirect("main_controller");
        }
    }
    public function tambah_buku_hilang($id){
        $result=$this->main_model->get_detail_peminjaman($id);
        $data=[
            "id_buku"=>$result["id_buku"],
            "tanggal_hilang"=>date("Y-m-d"),
            "denda"=>50000
        ];
        $this->main_model->tambah_buku_hilang($data);
        $this->main_model->hapus_peminjaman($result["id"]);
        redirect("admin_controller/hal_buku_hilang");
    }

}
?>