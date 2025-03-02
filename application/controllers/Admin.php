<?php
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');  // Load the URL helper
        $this->load->model('Cliente_model');
    }
    // Delete a user
    public function delete_user() {
        $id_cliente = $this->input->post('id_cliente');
        
        if ($id_cliente) {
            if ($this->Cliente_model->delete_cliente($id_cliente)) {
                $this->session->set_flashdata('success', 'User deleted successfully');
            } else {
                $this->session->set_flashdata('error', 'Failed to delete user');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid client ID');
        }
        
        redirect('admin/users');
    }

    // Make a user admin
    public function make_admin() {
        $id_cliente = $this->input->post('id_cliente');
        
        if ($id_cliente) {
            if ($this->Cliente_model->make_admin($id_cliente)) {
                $this->session->set_flashdata('success', 'User promoted to admin');
            } else {
                $this->session->set_flashdata('error', 'Failed to promote user to admin');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid client ID');
        }

        redirect('admin/users');
    }

    // Revoke admin privileges
    public function revoke_admin() {
        $id_cliente = $this->input->post('id_cliente');
        
        if ($id_cliente) {
            if ($this->Cliente_model->revoke_admin($id_cliente)) {
                $this->session->set_flashdata('success', 'Admin privileges revoked');
            } else {
                $this->session->set_flashdata('error', 'Failed to revoke admin privileges');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid client ID');
        }

        redirect('admin/users');
    }
   
    
}
