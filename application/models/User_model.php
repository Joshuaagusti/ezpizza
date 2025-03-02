<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_cliente_by_username($username)
    {
        $query = $this->db->get_where('clientes', ['usuario' => $username]);
        return $query->row(); // Return a single row
    }
    public function get_cliente_by_email($email)
    {
        $query = $this->db->get_where('clientes', ['email' => $email]);
        return $query->row(); // Return a single row
    }
    
    public function create_cliente($data)
    {
        $data['Contraseña'] = password_hash($data['Contraseña'], PASSWORD_BCRYPT); // Hash the password
        return $this->db->insert('clientes', $data);
    }
    public function update_profile($user_id, $data)
{
    $this->db->where('id_cliente', $user_id);
    return $this->db->update('clientes', $data);
}
}
