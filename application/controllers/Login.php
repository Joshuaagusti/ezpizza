<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper("url");
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function index()
    {
        
        $this->load->view('login');
    }

    public function register()
    {
        
        $this->load->view('register');
    }

    public function authenticate()
    {$username = $this->input->post('username'); // Email or username
        $password = $this->input->post('password');
        
        // Check if the $username is an email (simple regex check)
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            // If it's an email, fetch the client by email
            $cliente = $this->User_model->get_cliente_by_email($username);
        } else {
            // Otherwise, fetch the client by username
            $cliente = $this->User_model->get_cliente_by_username($username);
        }
        
    // Manually hash the entered password
$hashed_input_password = password_hash($password, PASSWORD_DEFAULT);

// Print both hashes to compare them

    
        // Check if cliente was found and verify the password
        if ($cliente && password_verify($password, $cliente->Contraseña)) {
            // Set session data
            $this->session->set_userdata([
                'id_cliente' => $cliente->id_cliente,
                'nombre_usuario' => $cliente->usuario,
                'email' => $cliente->email,
                'logged_in' => TRUE,
                'profile_pic' => $cliente->foto_perfil,
                'nombre' => $cliente->nombre,
                'direccion' => $cliente->direccion,
                'admin' => $cliente->is_admin,
            ]);
    
            // Redirect to a protected page
            redirect('productos/product_list');
        } else {
            // Show an error message
            $data['error'] = 'Invalid username or password.';
            $this->load->view('login', $data);
        }
    }
    
    

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
