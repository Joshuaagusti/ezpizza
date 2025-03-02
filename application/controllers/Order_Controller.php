<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_Controller extends CI_Controller
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
    public function index()
    {
        $this->load->model('Cart_model');


        if ($this->session->userdata('id_cliente') !== null) {
            $id_cliente = $this->session->userdata('id_cliente'); // Get the client ID from the session
            $data['cart'] = $this->Cart_model->get_cart($id_cliente); // Fetch cart data
        }


        $data['orders'] = $this->Cart_model->getOrdersByClient($this->session->userdata('id_cliente')); // Carga la vista del contenido
        $data['session_data'] = $this->session->userdata();
        $data['title'] = 'Order'; // Título dinámico
        $this->load->helper("url");
        $this->load->helper('img'); // Explicitly load the img_helper
        $data['content'] = $this->load->view('order_history', $data, true); // Carga la vista del contenido
        $this->load->view('layout/main', $data); // Renderiza el layout con datos
    }
    public function create_order()
    {
        // Ensure user is logged in
        if (!$this->session->userdata('logged_in')) {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => false,
                    'message' => 'Please log in to create an order.'
                ]));
        }


        // Payment successful, create the order
        $this->load->model('Cart_model');
        $id_cliente = $this->session->userdata('id_cliente');
        $order_id = $this->Cart_model->createOrder($id_cliente);

        if ($order_id) {
            
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'success' => true,
                    'orderId' => $order_id,
                    'message' => 'Payment successful and order created successfully'
                ]));
        } else {
            throw new Exception('Order creation failed');
        }
       
    }
}
