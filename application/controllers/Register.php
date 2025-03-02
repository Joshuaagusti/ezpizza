<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Application/controllers/Register.php

class Register extends CI_Controller
{

    // Constructor to load model and libraries
    public function __construct()
    {
        parent::__construct();
        // Load the Cliente model
        $this->load->model('Cliente_model');
        // Load the form validation library
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->database(); // Load the database
    }
    public function index()
    {
        $this->load->view('register');
    }
    // Registration form processing
    public function create_cliente()
    {
        // Check if the form was submitted via POST
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Debug: Dump the POST data
            echo '<pre>';
            var_dump($this->input->post());
            echo '</pre>';

            // Set validation rules
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
            $this->form_validation->set_rules('repeat_password', 'Repeat Password', 'required|matches[password]');
            $this->form_validation->set_rules('direction', 'Address', 'required'); // Ensure 'direction' is included

            // Run the validation
            if ($this->form_validation->run() === FALSE) {
                log_message('error', 'Form validation failed: ' . validation_errors());
                // Pass validation errors to the view
                $data['validation_errors'] = validation_errors();
                $this->load->view('register', $data); // Load the view with errors

            } else {
                // Collect form data
                $data = array(
                    'nombre' => $this->input->post('first_name'),
                    'usuario' => $this->input->post('username'),
                    'Contraseña' => $this->input->post('password'),
                    'email' => $this->input->post('email'),
                    'direccion' => $this->input->post('direction'),
                    'telefono' => $this->input->post('phone'),
                    'estado' => 1,  // Default state (1 for active)
                    'fecha_registro' => date('Y-m-d'),

                );

                // Call the model method to insert data into the database
                if ($this->Cliente_model->create_cliente($data)) {
                    // Registration success, redirect to the login page or success page
                    redirect('login');
                } else {
                    // Registration failed, show error message
                    echo "Error registering user.";
                }
            }
        } else {
            // Display the registration form if it's not a POST request
            $this->load->view('register');
        }
    }
    public function Update_profile()
    {
        // Add comprehensive error logging
        log_message('error', 'Update profile method called');
        log_message('error', 'POST data: ' . print_r($this->input->post(), true));
        log_message('error', 'FILES data: ' . print_r($_FILES, true));
    
        // Check if the user is logged in
      
        // Check if the form was submitted via POST
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            try {
                // Set validation rules
                $this->form_validation->set_rules('name', 'Name', 'required|trim');
                $this->form_validation->set_rules('user', 'Username', 'required|trim');
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
                $this->form_validation->set_rules('address', 'Address', 'trim');
    
                // Run the validation
                if ($this->form_validation->run() === FALSE) {
                    log_message('error', 'Validation failed: ' . validation_errors());
                    $response = [
                        'status' => 'error',
                        'message' => validation_errors()
                    ];
                    echo json_encode($response);
                    return;
                }
    
                // Prepare the data to update
                $update_data = [
                    'nombre' => $this->input->post('name'),
                    'usuario' => $this->input->post('user'),
                    'email' => $this->input->post('email'),
                    'direccion' => $this->input->post('address')
                ];
    
                // Get the current user ID from the session
                $user_id = $this->session->userdata('id_cliente');
                log_message('error', 'User ID: ' . $user_id);
    
                // Handle profile picture upload
                $profile_pic_updated = false;
                if (!empty($_FILES['profile_pic']['name'])) {
                    // Ensure upload directory exists and is writable
                    $upload_path = FCPATH . 'assets/img/products/pfp/';
                    if (!is_dir($upload_path)) {
                        log_message('error', 'Upload directory does not exist: ' . $upload_path);
                        mkdir($upload_path, 0755, true);
                    }
    
                    // Configure the file upload
                    $config['upload_path'] = $upload_path;
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['file_name'] = 'profile_' . $user_id;
                    $config['overwrite'] = true; // Overwrite existing file
    
                    $this->load->library('upload');
                    $this->upload->initialize($config);
    
                    if ($this->upload->do_upload('profile_pic')) {
                        $imageData = $this->upload->data();
                        log_message('error', 'Image upload successful: ' . print_r($imageData, true));
                        
                        // Resize the image
                        $this->load->library('image_lib');
                        $resizeConfig = [
                            'image_library' => 'gd2',
                            'source_image' => $imageData['full_path'],
                            'maintain_ratio' => TRUE,
                            'width' => 500,
                            'height' => 500
                        ];
                        $this->image_lib->initialize($resizeConfig);
                        if (!$this->image_lib->resize()) {
                            log_message('error', 'Image resize failed: ' . $this->image_lib->display_errors());
                        }
    
                        // Update profile picture in database
                        $update_data['foto_perfil'] = $imageData['file_name'];
                        $profile_pic_updated = true;
                    } else {
                        // Log detailed upload errors
                        log_message('error', 'Profile picture upload failed: ' . $this->upload->display_errors());
                        log_message('error', 'Upload error details: ' . print_r($this->upload->error_msg, true));
                        $response = [
                            'status' => 'error',
                            'message' => $this->upload->display_errors()
                        ];
                        echo json_encode($response);
                        return;
                    }
                }
    
                // Update the user profile in the database
                $this->load->model('User_model');
                $result = $this->User_model->update_profile($user_id, $update_data);
    
                if ($result) {
                    log_message('error', 'Profile update successful');
                    
                    // Update session data
                    $session_update = [
                        'nombre' => $update_data['nombre'],
                        'nombre_usuario' => $update_data['usuario'],
                        'email' => $update_data['email'],
                        'direccion' => $update_data['direccion']
                    ];
                    
                    // Only update profile pic in session if it was uploaded
                    if ($profile_pic_updated) {
                        $session_update['profile_pic'] = $update_data['foto_perfil'];
                    }
                    
                    $this->session->set_userdata($session_update);
    
                    $response = [
                        'status' => 'success',
                        'message' => 'Profile updated successfully',
                        'foto_perfil' => $profile_pic_updated ? $update_data['foto_perfil'] : null
                    ];
                    echo json_encode($response);
                } else {
                    log_message('error', 'Profile update failed');
                    $response = [
                        'status' => 'error',
                        'message' => 'Failed to update profile'
                    ];
                    echo json_encode($response);
                }
            } catch (Exception $e) {
                // Catch any unexpected errors
                log_message('error', 'Unexpected error in Update_profile: ' . $e->getMessage());
                log_message('error', 'Stack trace: ' . $e->getTraceAsString());
                
                $response = [
                    'status' => 'error',
                    'message' => 'An unexpected error occurred: ' . $e->getMessage()
                ];
                echo json_encode($response);
            }
        } else {
            log_message('error', 'Not a POST request');
            // If not a POST request, show an error
            $response = [
                'status' => 'error',
                'message' => 'Invalid request method'
            ];
            echo json_encode($response);
        }
    }
}
