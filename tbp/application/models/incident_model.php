<?php

class Incident_model extends CI_Model{
    public function __construct() {
        $this->load->database();
    }
    
    
    public function get_incident($slug = FALSE) {
        if ($slug === FALSE) {
            $query = $this->db->get('incident');
            return $query->result_array();
        }
        $query = $this->db->get_where('incident', array('slug' => $slug));
	return $query->row_array();
    }
    
    public function set_incident() {
	$data = $this->input->post();
        $data['korisnik_id'] = $this->session->userdata('korisnik_id');
        $this->db->insert('incident', $data);
    }
}
?>
