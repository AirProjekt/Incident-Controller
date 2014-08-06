<?php

class Pages extends CI_Controller{
    public function view() {
        $data['title'] = 'Home';
        $this->load->view('templates/header',$data);
        $this->load->view('pages/start');
        $this->load->view('templates/footer');
    }
    
    public function login() {
        $this->load->view('pages/login');
    }
    
}
