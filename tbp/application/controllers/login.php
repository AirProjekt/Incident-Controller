<?php

class Login extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('korisnik_model');
    }
    
    public function index() {
        $this->load->helper('form');
        $this->load->view('login/login');
    }
    
    public function logiraj() {
        $data['title'] = 'Home';
        $this->load->helper('form');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($this->korisnik_model->validate_user($username, $password)) {
            $this->session->set_userdata('username',$username);
            $this->session->set_userdata('logged_in',true);
            $this->load->view('templates/header',$data);
            $this->load->view('pages/start');
            $this->load->view('templates/footer');
        }
    }
    
    public function logout() {
        $data['title'] = 'Home';
        $this->session->sess_destroy();
        $this->load->view('templates/header',$data);
            $this->load->view('pages/start');
            $this->load->view('templates/footer');
        
    }
   
}
?>
