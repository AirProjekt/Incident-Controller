<?php

class Incident extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged_in')) show_error ('Morate biti logirani da biste pristupili ovoj stranici'
                , 403);
        $this->load->model('incident_model');
        $this->load->model('centar_model');
        $this->load->model('korisnik_model');
    }
    
    public function index()
    {
        $incident = $this->db->query('SELECT i.id, naziv, i.grad, i.adresa, i.kucni_broj, dat_i_vr_pocetka, trajanje, i.vrsta, otvoren, korisnicko_ime, c. adresa adr, c.kucni_broj kcb 
                                    FROM incident i LEFT JOIN korisnik k ON i.korisnik_id = k.id LEFT JOIN centar c ON c.id = i.centar_id;');
        $data['incident'] = $incident;
        $data['title'] = 'Popis incidenata';

	$this->load->view('templates/header', $data);
	$this->load->view('incident/index', $data);
	$this->load->view('templates/footer');
    }
    
    public function create() 
    {
        $this->load->helper('form');
	$this->load->library('form_validation');
        $data['title'] = 'New Incident entry';
        $data['centar'] = $this->centar_model->get_centar();
        
        $this->form_validation->set_rules('naziv', 'Naziv', 'required');
        $this->form_validation->set_rules('grad', 'Grad', 'required');
        $this->form_validation->set_rules('adresa', 'Adresa', 'required');
	$this->form_validation->set_rules('kucni_broj', 'Kućni broj', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('incident/create',$data);
            $this->load->view('templates/footer');
        }
        else
	{
            //$data['polje'] = $this->input->post();
            
            $this->incident_model->set_incident();
            $this->load->view('templates/header',$data);
            $this->load->view('incident/success',$data);
            $this->load->view('templates/footer');
	}
    }
    
    public function delete($param = FALSE) {
        $this->db->delete('incident', array('id' => $param));
        $this->index();
    }
    
    public function close($id = '') {
        $this->db->query("UPDATE incident SET otvoren='FALSE' WHERE id = ".$id);
        $this->index();
    }
    
    public function showMap() {
        $data['title'] = 'Prikaz mape';
        $this->load->view('templates/header', $data);
        $this->load->view('incident/mapa');
        $this->load->view('templates/footer');
    }
    
    public function loadData() {
        $data = $this->centar_model->get_centar();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
    
    public function loadIncidentData() {
        $data = $this->incident_model->get_incident();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}
?>

