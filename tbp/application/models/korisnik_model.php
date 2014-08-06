<?php

class Korisnik_model extends CI_Model{
    public function __construct() {
        $this->load->database();
    }
    
    public function get_korisnik($slug = FALSE) {
        if ($slug === FALSE) {
            $query = $this->db->get('korisnik');
            return $query->result_array();
        }
        $query = $this->db->get_where('korisnik', array('slug' => $slug));
	return $query->row_array();
    }
    
    public function set_korisnik() {
	$data = array(
		'ime' => $this->input->post('name'),
		'korisnicko_ime' => $this->input->post('userName'),
		'prezime' => $this->input->post('lastName'),
                'lozinka' => $this->input->post('password')
	);

	return $this->db->insert('korisnik', $data);
    }
    
    public function validate_user($username, $password) {
        $rs = $this->db->get_where('korisnik', array('korisnicko_ime' => $username,'lozinka' => $password));
        if ($rs->num_rows() == 1) {
            $this->session->set_userdata('korisnik_id', $rs->first_row()->id);
            return true;
        }
        return false;
    }
}
?>
