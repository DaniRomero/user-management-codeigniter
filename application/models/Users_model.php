<?php
class Users_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }

    public function verificar_email($email){
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1){
            $row = $query->row();
            return $row->email;
        }

    }
    
    public function get_users($role = FALSE)
    {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function set_user($id = 0)
    {
        $this->load->helper('url');
 
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'age' => $this->input->post('age'),
            'role' => $this->input->post('role')
        );
        
        if ($id == 0) {
            return $this->db->insert('users', $data);
        } else {
            $this->db->where('iduser', $id);
            return $this->db->update('users', $data);
        }
    }
    
    public function get_users_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('users');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('users', array('iduser' => $id));
        return $query->row_array();
    }
    
    public function delete_user($id)
    {
        $this->db->where('iduser', $id);
        return $this->db->delete('users');
    }
}