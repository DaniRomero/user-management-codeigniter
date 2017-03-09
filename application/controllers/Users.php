<?php
class Users extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('roles_model');
        $this->load->model('users_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['users'] = $this->users_model->get_users();
        $data['roles'] = $this->roles_model->get_roles();
        $data['title1'] = 'Users';
        $data['title2'] = 'Roles';
 
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
 
        $data['roles'] = $this->roles_model->get_roles();
        $data['title'] = 'Create a new user';
 
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|regex_match[/^[0-9]{12}$/]');
        $this->form_validation->set_rules('age', 'Age', 'trim|required');
        $this->form_validation->set_rules('role', 'Role', 'trim|required');
 
        if ($this->form_validation->run() === FALSE)
        {
            echo validation_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('user/create');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->users_model->set_user();
            $this->load->view('templates/header', $data);
            $this->load->view('user/success');
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
        
        $data['title'] = 'Edit a user';        
        $data['user'] = $this->users_model->get_users_by_id($id);
        $data['roles'] = $this->roles_model->get_roles();
        
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|regex_match[/^[0-9]{12}$/]');
        $this->form_validation->set_rules('age', 'Age', 'trim|required');
        $this->form_validation->set_rules('role', 'Role', 'trim|required');
 
        if ($this->form_validation->run() === FALSE)
        {
            echo validation_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
 
        }
        else
        {
            $this->users_model->set_user($id);
            $this->load->view('user/success');
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
                
        $user = $this->users_model->get_users_by_id($id);
        
        $this->users_model->delete_user($id);        
        redirect( base_url() . 'index.php/users');        
    }
}