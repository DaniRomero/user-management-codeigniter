<?php
class Roles extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('roles_model');
        $this->load->helper('url_helper');
    }
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
 
        $data['title'] = 'Create a role';
 
        $this->form_validation->set_rules('name', 'Name', 'trim|required');

 
        if ($this->form_validation->run() === FALSE)
        {
            echo validation_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('role/create');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->roles_model->set_role();
            $this->load->view('templates/header', $data);
            $this->load->view('role/success');
            $this->load->view('templates/footer');
        }
    }
    
    public function edit()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Edit a role';        
        $data['role'] = $this->roles_model->get_role_by_id($id);
        
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
 
        if ($this->form_validation->run() === FALSE)
        {
            echo validation_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('role/edit', $data);
            $this->load->view('templates/footer');
 
        }
        else
        {
            $this->roles_model->set_role($id);
            $this->load->view('role/success');
            redirect( base_url() . 'index.php/users');
        }
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
                
        $news_item = $this->roles_model->get_role_by_id($id);
        
        $this->roles_model->delete_role($id);        
        redirect( base_url() . 'index.php/users');        
    }
}