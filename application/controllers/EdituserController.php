<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EdituserController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
       
        $this->load->model('Cliente_model');
        // Load the form validation library
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->database(); // Load the database
    }
    public function index() {
        $this->load->model('Cart_model');

        $session_data = $this->session->userdata();
        $id_cliente = $session_data['id_cliente']; // Get the client ID from the session
        
        $data['cart'] = $this->Cart_model->get_cart($id_cliente);
        $this->load->helper("url");
        $this->load->helper('img'); // Explicitly load the img_helper
        $data['content'] = $this->load->view('infousuarios',[], true); // Carga la vista del contenido
        $this->load->view('layout/main', $data); // Renderiza el layout con datos
    }



























}