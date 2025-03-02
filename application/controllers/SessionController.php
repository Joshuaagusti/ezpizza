<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SessionController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper("url");
        $this->load->library('session'); // Load the session library
    }

    // Set session data dynamically
    public function set_session()
    {
        $session_data = array(
            'username'  => $this->input->post('username', TRUE), // Use dynamic input
            'email'     => $this->input->post('email', TRUE),
            'logged_in' => TRUE
        );

        $this->session->set_userdata($session_data);
        echo json_encode(['message' => "Session data has been set.", 'data' => $session_data]);
    }

    // Retrieve session data
    public function get_session()
    {
        $session_data = $this->session->userdata();
    echo '<pre>';
    print_r($session_data);
    echo '</pre>';
    }

    // Check if specific session data exists
    public function check_session($key)
    {
        if ($this->session->has_userdata($key)) {
            echo json_encode(['message' => "Session data for '$key' exists."]);
        } else {
            echo json_encode(['message' => "Session data for '$key' does not exist."]);
        }
    }

    // Unset specific session data
    public function unset_session($key)
    {
        if ($this->session->has_userdata($key)) {
            $this->session->unset_userdata($key);
            echo json_encode(['message' => "'$key' session data has been removed."]);
        } else {
            echo json_encode(['error' => "'$key' session data does not exist."]);
        }
    }

    // Destroy all session data
    public function destroy_session()
    {
        $this->session->sess_destroy();
        echo json_encode(['message' => "All session data has been destroyed."]);
    }
}
