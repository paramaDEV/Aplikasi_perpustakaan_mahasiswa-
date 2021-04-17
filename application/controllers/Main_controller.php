<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main_controller extends CI_Controller{
    
    public function index(){
        $this->load->model('main_model');
        $this->form_validation->set_rules("no_induk","Nomer induk","trim|required|exact_length[8]");
        $this->form_validation->set_rules("password","Password","trim|required|min_length[8]");
        if($this->form_validation->run()==false){
        $this->load->view('auth/auth_header');
        $this->load->view('auth/login');
        $this->load->view('auth/auth_footer');
        }else{
            $this->_login();
        }
    }

    private function _login(){
        $no_induk = $this->input->post('no_induk');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user',["nim"=>$no_induk])->row_array();
        $admin = $this->db->get_where('admin',["nomer_induk"=>$no_induk])->row_array();

        if($user!=null){
            if(password_verify($password,$user["password"])){
                $data=[
                    "nomer_induk"=>$user["nim"],
                    "id"=>$user["id"]
                ];
                $this->session->set_userdata($data);
                redirect("user_controller/index");
            }else{
                $this->session->set_flashdata('message',"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Silahkan periksa kembali nomer induk dan password anda !!!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='tru'>&times;</span>
                </button>
                </div>");
            redirect("main_controller/index");
            }
        }else if($admin!=null){
            if(password_verify($password,$admin["password"])){
                $data=[
                    "nomer_induk"=>$admin["nomer_induk"],
                    "id"=>$admin["id"]
                ];
                $this->session->set_userdata($data);
                redirect("admin_controller/index");
            }else{
                $this->session->set_flashdata('message',"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                Silahkan periksa kembali nomer induk dan password anda !!!
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='tru'>&times;</span>
                </button>
                </div>");
            redirect("main_controller/index");
            }
        }else{
            $this->session->set_flashdata('message',"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Silahkan periksa kembali nomer induk dan password anda !!!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='tru'>&times;</span>
            </button>
            </div>");
            redirect("main_controller/index");
        }
    }

    public function register(){
        $this->form_validation->set_rules("nama","Nama",'required');
        $this->form_validation->set_rules("no_induk","No Induk",'required|exact_length[8]');
        $this->form_validation->set_rules("kelamin","Jenis Kelamin",'required');
        $this->form_validation->set_rules("email","Email",'required|valid_email');
        $this->form_validation->set_rules("ttl","Tanggal Lahir",'required');
        $this->form_validation->set_rules("password","Password",'required|trim|min_length[8]|matches[repassword]');
        $this->form_validation->set_rules("repassword","Confirm Password",'required|trim|matches[password]');
        if($this->form_validation->run()==false){
        $this->load->model('main_model');
        $this->load->view('auth/auth_header');
        $this->load->view('auth/register');
        $this->load->view('auth/auth_footer');
        }else{
            $this->register_admin();
        }
    }

    public function register_admin(){
        $this->load->model("main_model");
        $data=[
            "nomer_induk"=>$this->input->post("no_induk"),
            "nama"=>$this->input->post("nama"),
            "email"=>$this->input->post("email"),
            "jenis_kelamin"=>$this->input->post("kelamin"),
            "ttl"=>$this->input->post("ttl"),
            "password"=>password_hash($this->input->post("password"),PASSWORD_DEFAULT)
        ];
        $this->main_model->register_admin($data);
        $this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissible fade show' role='alert'>
        Akun berhasil dibuat !!!
       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
         <span aria-hidden='tru'>&times;</span>
       </button>
     </div>");
        redirect("main_controller/index");
    }


    public function logout(){
        $this->session->unset_userdata("nomer_induk");
        $this->session->unset_userdata("id");
        $this->session->set_flashdata('message',"<div class='alert alert-success alert-dismissible fade show' role='alert'>
        Anda telah logout !!!
       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
         <span aria-hidden='tru'>&times;</span>
       </button>
     </div>");
        redirect("main_controller/index");
    }

}

?>