<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart_controller extends CI_Controller
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
    }else{
        redirect('login');
    } 
  
        $data['cart'] = $this->Cart_model->get_cart($id_cliente);
        $data['title'] = 'Cart'; // Título dinámico;  
        $this->load->helper("url");
        $this->load->helper('img'); // Explicitly load the img_helper
        $data['content'] = $this->load->view('cart', $data, true); // Carga la vista del contenido
        
        $this->load->view('layout/main', $data); // Renderiza el layout con datos


    }
    public function add_to_cart()
    {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('login'); // If not logged in, redirect to login page
        }

        // Get the logged-in user's ID and the product ID
        $id_cliente = $this->session->userdata('id_cliente'); // Assuming user ID is stored in the session
        $id_producto = $this->input->post('id_producto');  // Get product ID from POST data
        $cantidad = $this->input->post('cantidad');         // Get quantity from POST data (defaults to 1 if not provided)

        // Load the model
        $this->load->model('Cart_model');

        // Call model to insert product into cart
        $result = $this->Cart_model->insert_cart($id_cliente, $id_producto, $cantidad);

        // Return a response (could be JSON or a simple success message)
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Product added to cart']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add product to cart']);
        }
    }
    public function get_cart() {
        $this->load->model('Cart_model');
        $user_id = 19; // Replace with dynamic user ID if applicable
        $cart = $this->Cart_model->get_cart($user_id);
    
        echo json_encode($cart); // Return cart data as JSON
    }
    public function update_quantity() {
        $this->load->model('Cart_model');            // Ensure this is an AJAX request
        if (!$this->input->is_ajax_request()) {
            show_error('No direct script access allowed');
        }

        // Get POST data
        $id_carrito = $this->input->post('id_carrito');
        $id_producto = $this->input->post('id_producto');
        $cantidad = $this->input->post('cantidad');
        $id_cliente = $this->session->userdata('id_cliente'); // Assuming user ID is stored in the session
        // Call model to update quantity
        $result = $this->Cart_model->update_cart_item_quantity($id_carrito, $id_producto, $cantidad,$id_cliente);

        // Return JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result));
    }

    public function get_cart_summary() {
        $this->load->model('Cart_model');  
        $id_cliente = $this->session->userdata('id_cliente'); // Assuming user ID is stored in the session  
        // Ensure this is an AJAX request
        if (!$this->input->is_ajax_request()) {
            show_error('No direct script access allowed');
        }

        // Get cart summary from model
        $summary = $this->Cart_model->calculate_cart_summary($id_cliente);

        // Return JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($summary));
    }
    public function delete_item() {
        $this->load->model('Cart_model');  
        if (!$this->input->is_ajax_request()) {
            show_error('No direct script access allowed');
        }
    
        $cliente_id = $this->session->userdata('id_cliente');
        if (!$cliente_id) {
            $response = [
                'status' => false,
                'message' => 'User session is invalid. Please log in again.'
            ];
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    
        $id_producto = $this->input->post('id_producto');
        if (empty($id_producto)) {
            $response = [
                'status' => false,
                'message' => 'Invalid cart item ID.'
            ];
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    
        $result = $this->Cart_model->delete_cart_item($id_producto, $cliente_id);
        $response = $result
            ? ['status' => true, 'message' => 'Cart item deleted successfully.']
            : ['status' => false, 'message' => 'Failed to delete cart item. Please try again.'];
    
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    public function checkout() {
        // Load the necessary models
        $this->load->model('Cart_model');
        
        // Get the current logged-in client's ID 
        // (this depends on how you manage user sessions in your application)
        $id_cliente = $this->session->userdata('id_cliente');
        
        // Attempt to create the order
        $order_id = $this->Cart_model->createOrder($id_cliente);
        
        if ($order_id) {
            // Order created successfully
            $this->session->set_flashdata('success', 'Order placed successfully!');
            redirect('http://localhost/Website/order_history');
        } else {
            // Order creation failed
            $this->session->set_flashdata('error', 'Unable to place order. Your cart might be empty.');
            redirect('cart');
        }
    }
 
}
