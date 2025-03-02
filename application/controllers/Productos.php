<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productos extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper("url");
        $this->load->library("session");
        $this->load->library('form_validation');
        
    }

    public function index()
    {
        $this->load->model('Cart_model');


        if ($this->session->userdata('id_cliente') !== null) {
            $id_cliente = $this->session->userdata('id_cliente'); // Get the client ID from the session
            $data['cart'] = $this->Cart_model->get_cart($id_cliente); // Fetch cart data
        }



        $data['session_data'] = $this->session->userdata();
        $data['title'] = 'Welcome To EzPizza'; // Título dinámico
        $this->load->helper("url");
        $this->load->helper('img'); // Explicitly load the img_helper
        $data['content'] = $this->load->view('home', $data, true); // Carga la vista del contenido
        $this->load->view('layout/main', $data); // Renderiza el layout con datos
    }

    public function product_list()
    {
        // Load models
        $this->load->model('products');
        $this->load->model('Cart_model');
        $session_data = $this->session->userdata();

        // Use alternative null checking for compatibility
        $min_price = $this->input->get('min_price') ? $this->input->get('min_price') : null;
        $max_price = $this->input->get('max_price') ? $this->input->get('max_price') : null;
        $category_id = $this->input->get('category_id') ? $this->input->get('category_id') : null;
        $state = $this->input->get('state') ? $this->input->get('state') : 1;
        $rating_min = $this->input->get('rating_min') ? $this->input->get('rating_min') : null;
        $limit = $this->input->get('limit') ? $this->input->get('limit') : 20;
        $offset = $this->input->get('offset') ? $this->input->get('offset') : 0;
        $query = $this->input->get('query');

        // Fetch products
        $products = $this->products->get_filtered_products(
            $min_price,
            $max_price,
            $category_id,
            $state,
            $rating_min,
            $limit,
            $offset,
            $query
        );

        // Prepare data for view
        $data = [
            'products' => $products,

            'title' => 'Product List',
            'session_data' => $this->session->userdata(),
            'categories' => $this->products->get_category_tree()
        ];
        if ($this->session->userdata('id_cliente') !== null) {
            $id_cliente = $this->session->userdata('id_cliente'); // Get the client ID from the session
            $data['cart'] = $this->Cart_model->get_cart($id_cliente); // Fetch cart data
        }
        // Load helpers
        $this->load->helper('img');

        // Load views
        $data['content'] = $this->load->view('product_list', $data, true);
        $this->load->view('layout/main', $data);
    }

    public function details($id)
    {
        $this->load->model('Cart_model');

        $session_data = $this->session->userdata();
        if ($this->session->userdata('id_cliente') !== null) {
            $id_cliente = $this->session->userdata('id_cliente'); // Get the client ID from the session
            $data['cart'] = $this->Cart_model->get_cart($id_cliente); // Fetch cart data
        }
        $this->load->helper('img'); // Explicitly load the img_helper
        $this->load->model('products');

        $data['session_data'] = $this->session->userdata();
        $data['title'] = 'Product Details'; // Título dinámico
        $data['products'] = $this->products->getproductsbyid($id);
        $data['images'] = $this->products->getimagesbyid($id);
        $data['percentages'] = $this->products->reviewPercentages($id);
        $data['reviews'] = $this->products->getReviewsById($id);

        $data['content'] = $this->load->view('product_details', $data, true); // Carga la vista del contenido
        $this->load->view('layout/main', $data); // Renderiza el layout con datos

    }

    public function añadir() {
        if (!$this->check_if_admin()) {
            // Redirect to a login page or an error page if the user is not an admin
            redirect('login');
        }

        $this->load->model('products');
        $data['categories'] = $this->products->get_category_tree();
        $data['products'] = $this->products->getproducts();
        $this->load->view('add_product', $data);
    }
    
    public function adminUsers() {
        if (!$this->check_if_admin()) {
            // Redirect to a login page or an error page if the user is not an admin
            redirect('login');
        }

        $this->load->model('Cliente_model'); // Load the model
        $data['clientes'] = $this->Cliente_model->get_all_cliente_revenue_data();
        $this->load->view('admin_users', $data);
    }
    public function check_if_admin() {
        // Assuming you store the user's ID in the session after login
        $id_cliente = $this->session->userdata('id_cliente');
        
        if ($id_cliente) {
            // Load the model
            $this->load->model('Cliente_model');
            
            // Check if the user is an admin
            $is_admin = $this->Cliente_model->is_admin($id_cliente);
            
            if ($is_admin) {
                // The user is an admin
                return true;
            } else {
                // The user is not an admin
                return false;
            }
        } else {
            // User is not logged in
            return false;
        }
    }

    public function addProduct() {
        $this->load->model('products');
        // Validate form inputs
        $this->form_validation->set_rules('nombre', 'Product Name', 'required|trim');
        $this->form_validation->set_rules('descripcion', 'Description', 'trim');
        $this->form_validation->set_rules('precio', 'Price', 'required|numeric');
        $this->form_validation->set_rules('stock', 'Stock', 'required|integer');
        $this->form_validation->set_rules('id_categoria', 'Category', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/add_product');
            return;
        }

        // Prepare product data
        $product_data = [
            'nombre' => $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'precio' => $this->input->post('precio'),
            'stock' => $this->input->post('stock'),
            'id_categoria' => $this->input->post('id_categoria'),
            'estado' => 1 // Active by default
        ];

        // Insert product and get the ID
        $product_id = $this->products->insertProduct($product_data);

        // Handle image uploads
        $this->uploadProductImages($product_id);

        // Set success message
        $this->session->set_flashdata('success', 'Product added successfully');
        redirect('admin/add_product');
    }

    private function uploadProductImages($product_id) {
        $this->load->model('ImageModel');
        // Get the base upload path using base_url
        $upload_base_path = FCPATH . 'assets/img/products/';
    
        // Ensure the directory exists
        if (!is_dir($upload_base_path)) {
            mkdir($upload_base_path, 0755, TRUE);
        }
    
        // Upload configuration
        $config = [
            'upload_path' => $upload_base_path,
            'allowed_types' => 'gif|jpg|png|jpeg|webp',
            'max_size' => 5120, // 5MB
            'overwrite' => FALSE, // Prevent overwriting
            'remove_spaces' => TRUE, // Remove spaces from filename
            'file_name' => null // We'll set this dynamically
        ];
        log_message('debug', 'POST data: ' . print_r($this->input->post(), true));
        $this->load->library('upload');
    
        // Process image uploads
        for ($i = 1; $i <= 5; $i++) {
            $file_input_name = "product_image_$i";
       

            // Debug: Check specific file input
            log_message('debug', "Checking file input: $file_input_name");
            log_message('debug', "File exists: " . (!empty($_FILES[$file_input_name]['name']) ? 'Yes' : 'No'));
            // Check if file was uploaded
            if (!empty($_FILES[$file_input_name]['name'])) {
                // Generate a unique filename while preserving the original extension
                $original_filename = $_FILES[$file_input_name]['name'];
                $file_ext = pathinfo($original_filename, PATHINFO_EXTENSION);
                $unique_filename = $this->generateUniqueFilename($original_filename, $file_ext);
                
                // Set the dynamic filename
                $config['file_name'] = $unique_filename;
    
                // Initialize upload library with config
                $this->upload->initialize($config);
    
                // Attempt to upload the file
                if ($this->upload->do_upload($file_input_name)) {
                    $upload_data = $this->upload->data();
    
                    // Prepare image data for database
                    $image_data = [
                        'id_producto' => $product_id,
                        'url_imagen' => $upload_data['file_name'], // Relative path
                        'descripcion' => $this->input->post('image_description')[$i-1] ?? null,
                        'fecha_creacion' => date('Y-m-d'),
                        'is_cover' => ($i == 1) ? 1 : 0 // First image is set as cover
                    ];
    
                    // Insert image record
                    $this->ImageModel->insertImage($image_data);
                } else {
                    // Handle upload error
                    $error = $this->upload->display_errors();
                    log_message('error', 'Image upload error: ' . $error);
                }
            }
        }
    }
    

    private function generateUniqueFilename($original_filename, $file_ext) {
        // Remove extension from original filename
        $base_name = pathinfo($original_filename, PATHINFO_FILENAME);
        
        // Sanitize filename (remove special characters, spaces)
        $base_name = preg_replace('/[^a-zA-Z0-9_-]/', '', $base_name);
        
        // Add timestamp and random string to ensure uniqueness
        $unique_name = $base_name . '_' . time() . '_' . bin2hex(random_bytes(4));
        
        // Append extension
        return $unique_name . '.' . $file_ext;
    }


    public function search_products()
    {
        $this->load->model('Products');
        $query = $this->input->get('query'); // Get the search input
        $results = $this->Products->search_products($query);

        echo json_encode($results); // Send results as JSON
    }
    public function track_orders()
    {
        $this->load->model('Cart_model');


        if ($this->session->userdata('id_cliente') !== null) {
            $id_cliente = $this->session->userdata('id_cliente'); // Get the client ID from the session
            $data['cart'] = $this->Cart_model->get_cart($id_cliente); // Fetch cart data
            $data['session_data'] = $this->session->userdata();
            $data['title'] = 'Track order'; // Título dinámico
            $this->load->helper("url");
            $this->load->helper('img'); // Explicitly load the img_helper
            $data['content'] = $this->load->view('track_order', $data, true); // Carga la vista del contenido
            $this->load->view('layout/main', $data); // Renderiza el layout con datos
        }
    }
    public function update_product() {
        $data = json_decode($this->input->raw_input_stream, true);
        
        // Validate and sanitize the data
        $id = $data['id'];
        $name = $data['name'];
        $description = $data['description'];
        $price = $data['price'];
        $stock = $data['stock'];
        $status = $data['status'];
        $category = $data['category'];
    
        // Update product logic here
        $this->db->where('id_producto', $id);
        $update = $this->db->update('productos', [
            'nombre' => $name,
            'descripcion' => $description,
            'precio' => $price,
            'stock' => $stock,
            'estado' => $status,
            'id_categoria' => $category
        ]);
    
        if ($update) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }
    
    public function delete_product() {
        $data = json_decode($this->input->raw_input_stream, true);
        $id = $data['id'];
    
        // Delete product logic
        $this->db->where('id_producto', $id);
        $delete = $this->db->delete('productos');
    
        if ($delete) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }
    
}
