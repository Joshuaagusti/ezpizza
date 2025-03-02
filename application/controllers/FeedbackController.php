<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FeedbackController extends CI_Controller
{
    public function submit() {
        $this->load->database();
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('comentario', 'Comment', 'required|trim');
        $this->form_validation->set_rules('calificacion', 'Rating', 'required|integer|greater_than[0]|less_than[6]');
    
        if ($this->form_validation->run() == FALSE) {
            // Return validation errors as JSON
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        } else {
            // Save to database
            $data = [
                'id_cliente' => $this->input->post('id_cliente'),
                'comentario' => $this->input->post('comentario'),
                'calificacion' => $this->input->post('calificacion'),
                'fecha_testimonio' => date('Y-m-d'),
                'id_producto' => $this->input->post('id_producto')
            ];
    
            if ($this->db->insert('testimonios', $data)) {
                // Return success response
                echo json_encode(['status' => 'success', 'message' => 'Testimonial submitted successfully']);
            } else {
                // Return database error response
                echo json_encode(['status' => 'error', 'message' => 'Database insertion failed']);
            }
        }
    }
    
}
