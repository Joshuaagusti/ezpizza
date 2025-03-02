<?php
class ImageModel extends CI_Model {
    public function insertImage($data) {
        // Debugging log
        log_message('debug', 'Inserting image data: ' . print_r($data, true));

        // Attempt to insert
        $result = $this->db->insert('imagenes', $data);
    
        // Check for insertion success
        if (!$result) {
            // Log database error
            log_message('error', 'Database insert error: ' . $this->db->error()['message']);
        }
    
    }
}