<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?><?php

class Centar_model extends CI_Model{
    public function __construct() {
        $this->load->database();
    }
    
    public function get_centar($slug = FALSE) {
        if ($slug === FALSE) {
            $query = $this->db->get('centar');
            return $query->result_array();
        }
        $query = $this->db->get_where('centar', array('slug' => $slug));
	return $query->row_array();
    }
    
    public function set_incident() {
	$data = array(
		'ime' => $this->input->post('name'),
		'korisnicko_ime' => $this->input->post('userName'),
		'prezime' => $this->input->post('lastName'),
                'lozinka' => $this->input->post('password')
	);

	return $this->db->insert('centar', $data);
    }
}
?>

