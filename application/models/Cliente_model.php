<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Application/models/Cliente_model.php
class Cliente_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        // Ensure the database library is loaded
        $this->load->database();
    }
    // Method to insert the user data into the 'clientes' table
    public function create_cliente($data) {
        // Hash the password before inserting
        $data['Contraseña'] = password_hash($data['Contraseña'], PASSWORD_DEFAULT);

        // Insert the user data into the 'clientes' table
        $this->db->insert('clientes', $data);

        // Return the ID of the inserted record
        return $this->db->insert_id();
    }
    public function get_all_cliente_revenue_data() {
        $query = $this->db->get('cliente_revenue_data'); // 'cliente_revenue_data' is the view name
        return $query->result_array(); // Return data as an array of rows
    }

    // Fetch data for a specific client by ID
    public function get_cliente_revenue_data_by_id($id_cliente) {
        $this->db->where('id_cliente', $id_cliente);
        $query = $this->db->get('cliente_revenue_data');
        return $query->row_array(); // Return a single row as an associative array
    }
    public function delete_cliente($id_cliente) {
        $this->db->where('id_cliente', $id_cliente);
        return $this->db->delete('clientes');
    }

    // Make a client an admin
    public function make_admin($id_cliente) {
        $this->db->set('is_admin', 1);
        $this->db->where('id_cliente', $id_cliente);
        return $this->db->update('clientes');
    }

    // Revert a client from admin to regular user
    public function revoke_admin($id_cliente) {
        $this->db->set('is_admin', 0);
        $this->db->where('id_cliente', $id_cliente);
        return $this->db->update('clientes');
    }
    public function is_admin($id_cliente) {
        // Query to check the 'is_admin' field for the given 'id_cliente'
        $this->db->select('is_admin');
        $this->db->from('clientes');
        $this->db->where('id_cliente', $id_cliente);
        $query = $this->db->get();
        
        // Check if the user exists and if they are an admin
        if ($query->num_rows() == 1) {
            $result = $query->row();
            return $result->is_admin == 1; // Returns true if is_admin is 1, otherwise false
        } else {
            return false; // User not found
        }
    }
}

