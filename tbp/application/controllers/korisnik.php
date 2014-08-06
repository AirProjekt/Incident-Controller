<?php

class Korisnik extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in')) show_error ('Morate biti logirani da biste pristupili ovoj stranici'
                , 403);
        $this->load->model('korisnik_model');
    }
    
    public function index()
    {
        $data['korisnik'] = $this->korisnik_model->get_korisnik();
        $data['title'] = 'Popis korisnika';

	$this->load->view('templates/header', $data);
	$this->load->view('korisnik/index', $data);
	$this->load->view('templates/footer');
    }
    
    public function create() 
    {
        $this->load->helper('form');
	$this->load->library('form_validation');
        $data['title'] = 'New User entry';
        
        $this->form_validation->set_rules('userName', 'User name', 'required|min_length[5]|max_length[12]|is_unique[korisnik.korisnicko_ime]');
	$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('name','Name','required|max_length[20]');
        $this->form_validation->set_rules('lastName','Last name','required|max_length[20]');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('korisnik/create');
            $this->load->view('templates/footer');
        }
        else
	{
            
            $this->korisnik_model->set_korisnik();
            $this->load->view('templates/header',$data);
            $this->load->view('korisnik/success');
            $this->load->view('templates/footer');
	}
    }
    
    public function delete($param = FALSE) {
        $this->db->delete('korisnik', array('id' => $param));
        $this->index();
    }
}
?>
